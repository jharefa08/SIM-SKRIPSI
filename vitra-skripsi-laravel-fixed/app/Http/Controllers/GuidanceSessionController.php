<?php
namespace App\Http\Controllers;

use App\Models\{GuidanceSession, User, TitleSubmission, Notification};
use Illuminate\Http\Request;

class GuidanceSessionController extends Controller
{
    public function index(Request $request)
    {
        $u = auth()->user();
        $items = GuidanceSession::with('student','supervisor')
            ->when($u->isMahasiswa(), fn($q) => $q->where('student_id',$u->id))
            ->when($u->isDosen(), fn($q) => $q->where('supervisor_id',$u->id))
            ->when($request->status, fn($q,$v) => $q->where('status',$v))
            ->when($request->type, fn($q,$v) => $q->where('type',$v))
            ->latest()->paginate(10)->withQueryString();
        return view('guidances.index', compact('items'));
    }

    public function create()
    {
        abort_unless(auth()->user()->isMahasiswa(), 403);
        $approved = TitleSubmission::where('student_id',auth()->id())->where('status','disetujui')->latest()->first();
        $dosens = User::where('role','dosen')->orderBy('name')->get();
        return view('guidances.create', compact('dosens','approved'));
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->isMahasiswa(), 403);
        $data = $request->validate([
            'supervisor_id'=>'required|exists:users,id', 'type'=>'required|in:proposal,skripsi',
            'session_date'=>'required|date', 'chapter'=>'nullable|string|max:100',
            'student_note'=>'required|string', 'file'=>'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:8192'
        ]);
        if ($request->hasFile('file')) $data['file_path'] = $request->file('file')->store('guidance','public');
        $guidance = GuidanceSession::create($data + ['student_id'=>auth()->id(), 'status'=>'menunggu']);
        Notification::create(['user_id'=>$guidance->supervisor_id,'title'=>'Bimbingan baru','message'=>$guidance->student->name.' mengirim catatan bimbingan.','url'=>route('guidances.edit',$guidance)]);
        return redirect()->route('guidances.index')->with('success','Bimbingan berhasil dikirim ke dosen.');
    }

    public function show(GuidanceSession $guidance)
    {
        $this->authorizeView($guidance);
        return view('guidances.show', compact('guidance'));
    }

    public function edit(GuidanceSession $guidance)
    {
        $u = auth()->user();
        if ($u->isMahasiswa()) {
            abort_unless($guidance->student_id === $u->id && in_array($guidance->status, ['menunggu','revisi']), 403);
            $dosens = User::where('role','dosen')->orderBy('name')->get();
            $approved = TitleSubmission::where('student_id',$u->id)->where('status','disetujui')->latest()->first();
            return view('guidances.create', compact('guidance','dosens','approved'));
        }
        abort_unless($u->isDosen() && $guidance->supervisor_id === $u->id, 403);
        return view('guidances.review', compact('guidance'));
    }

    public function update(Request $request, GuidanceSession $guidance)
    {
        $u = auth()->user();
        if ($u->isMahasiswa()) {
            abort_unless($guidance->student_id === $u->id && in_array($guidance->status, ['menunggu','revisi']), 403);
            $data = $request->validate([
                'supervisor_id'=>'required|exists:users,id', 'type'=>'required|in:proposal,skripsi',
                'session_date'=>'required|date', 'chapter'=>'nullable|string|max:100',
                'student_note'=>'required|string', 'file'=>'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:8192'
            ]);
            if ($request->hasFile('file')) $data['file_path'] = $request->file('file')->store('guidance','public');
            $data['status'] = 'menunggu';
            $guidance->update($data);
            Notification::create(['user_id'=>$guidance->supervisor_id,'title'=>'Bimbingan dikirim ulang','message'=>$guidance->student->name.' memperbarui catatan bimbingan.','url'=>route('guidances.edit',$guidance)]);
            return redirect()->route('guidances.index')->with('success','Bimbingan berhasil diperbarui dan dikirim ulang.');
        }
        return $this->review($request, $guidance);
    }

    public function review(Request $request, GuidanceSession $guidance)
    {
        abort_unless(auth()->user()->isDosen() && $guidance->supervisor_id === auth()->id(), 403);
        $data = $request->validate(['supervisor_note'=>'required|string', 'status'=>'required|in:direview,selesai,revisi']);
        $guidance->update($data);
        Notification::create(['user_id'=>$guidance->student_id,'title'=>'Bimbingan diperbarui','message'=>'Dosen memberi catatan: '.strtoupper($guidance->status),'url'=>route('guidances.show',$guidance)]);
        return redirect()->route('guidances.index')->with('success','Review bimbingan tersimpan.');
    }

    public function destroy(GuidanceSession $guidance)
    {
        abort_unless(auth()->user()->isJurusan() || ($guidance->student_id === auth()->id() && $guidance->status === 'menunggu'), 403);
        $guidance->delete();
        return redirect()->route('guidances.index')->with('success','Data bimbingan dihapus.');
    }

    private function authorizeView(GuidanceSession $guidance): void
    {
        $u = auth()->user();
        abort_unless($u->isJurusan() || $guidance->student_id === $u->id || $guidance->supervisor_id === $u->id, 403);
    }
}
