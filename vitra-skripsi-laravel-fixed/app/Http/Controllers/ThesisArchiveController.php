<?php
namespace App\Http\Controllers;

use App\Models\{ThesisArchive, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThesisArchiveController extends Controller
{
    public function index(Request $request)
    {
        $items = ThesisArchive::with('student')
            ->when(!auth()->user()->isJurusan(), fn($q)=>$q->where(function($qq){$qq->where('is_public',true)->orWhere('student_id',auth()->id());}))
            ->when($request->q, fn($q,$v)=>$q->where(function($qq) use ($v){$qq->where('title','like',"%$v%")->orWhere('keywords','like',"%$v%")->orWhere('year','like',"%$v%");}))
            ->latest()->paginate(10)->withQueryString();
        return view('archives.index', compact('items'));
    }

    public function create() { return view('archives.create', ['students'=>User::where('role','mahasiswa')->orderBy('name')->get()]); }

    public function store(Request $request)
    {
        $rules = [
            'student_id'=>'nullable|exists:users,id', 'title'=>'required|string|max:255', 'year'=>'required|digits:4',
            'keywords'=>'nullable|string|max:255', 'file'=>'required|file|mimes:pdf|max:20000', 'abstract'=>'nullable|file|mimes:pdf|max:8192', 'is_public'=>'nullable|boolean'
        ];
        $data = $request->validate($rules);
        $data['student_id'] = auth()->user()->isJurusan() && $request->student_id ? $request->student_id : auth()->id();
        $data['file_path'] = $request->file('file')->store('archives','public');
        if ($request->hasFile('abstract')) $data['abstract_path'] = $request->file('abstract')->store('archives/abstracts','public');
        $data['is_public'] = $request->boolean('is_public', true);
        ThesisArchive::create($data);
        return redirect()->route('archives.index')->with('success','Arsip skripsi berhasil disimpan.');
    }

    public function show(ThesisArchive $archive)
    {
        abort_unless($archive->is_public || auth()->user()->isJurusan() || $archive->student_id === auth()->id(), 403);
        return view('archives.show', compact('archive'));
    }

    public function edit(ThesisArchive $archive)
    {
        abort_unless(auth()->user()->isJurusan() || $archive->student_id === auth()->id(), 403);
        return view('archives.create', ['archive'=>$archive, 'students'=>User::where('role','mahasiswa')->orderBy('name')->get()]);
    }

    public function update(Request $request, ThesisArchive $archive)
    {
        abort_unless(auth()->user()->isJurusan() || $archive->student_id === auth()->id(), 403);
        $data = $request->validate(['title'=>'required|string|max:255','year'=>'required|digits:4','keywords'=>'nullable|string|max:255','file'=>'nullable|file|mimes:pdf|max:20000','abstract'=>'nullable|file|mimes:pdf|max:8192','is_public'=>'nullable|boolean']);
        if ($request->hasFile('file')) { if ($archive->file_path) Storage::disk('public')->delete($archive->file_path); $data['file_path']=$request->file('file')->store('archives','public'); }
        if ($request->hasFile('abstract')) { if ($archive->abstract_path) Storage::disk('public')->delete($archive->abstract_path); $data['abstract_path']=$request->file('abstract')->store('archives/abstracts','public'); }
        $data['is_public'] = $request->boolean('is_public', false);
        $archive->update($data);
        return redirect()->route('archives.index')->with('success','Arsip skripsi diperbarui.');
    }

    public function destroy(ThesisArchive $archive)
    {
        abort_unless(auth()->user()->isJurusan() || $archive->student_id === auth()->id(), 403);
        if ($archive->file_path) Storage::disk('public')->delete($archive->file_path);
        if ($archive->abstract_path) Storage::disk('public')->delete($archive->abstract_path);
        $archive->delete();
        return redirect()->route('archives.index')->with('success','Arsip skripsi dihapus.');
    }
}
