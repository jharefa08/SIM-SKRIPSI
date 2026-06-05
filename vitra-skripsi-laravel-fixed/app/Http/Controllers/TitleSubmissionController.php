<?php
namespace App\Http\Controllers;

use App\Models\{TitleSubmission, User, Notification};
use Illuminate\Http\Request;

class TitleSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $u = auth()->user();
        $items = TitleSubmission::with('student','supervisor')
            ->when($u->isMahasiswa(), fn($q) => $q->where('student_id',$u->id))
            ->when($u->isDosen(), fn($q) => $q->where('supervisor_id',$u->id))
            ->when($request->status, fn($q,$v) => $q->where('status',$v))
            ->when($request->q, fn($q,$v) => $q->where(function($qq) use ($v){ $qq->where('title','like',"%$v%")->orWhereHas('student', fn($s)=>$s->where('name','like',"%$v%")); }))
            ->latest()->paginate(10)->withQueryString();
        return view('titles.index', compact('items'));
    }

    public function create() { abort_unless(auth()->user()->isMahasiswa() || auth()->user()->isJurusan(), 403); return view('titles.create'); }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->isMahasiswa() || auth()->user()->isJurusan(), 403);
        $data = $request->validate(['title'=>'required|string|max:255', 'background'=>'nullable|string']);
        $title = TitleSubmission::create($data + ['student_id'=>auth()->id(), 'status'=>'diajukan']);
        foreach (User::where('role','jurusan')->get() as $jurusan) {
            Notification::create(['user_id'=>$jurusan->id,'title'=>'Pengajuan judul baru','message'=>auth()->user()->name.' mengajukan judul skripsi.','url'=>route('titles.edit',$title)]);
        }
        return redirect()->route('titles.index')->with('success','Judul berhasil diajukan.');
    }

    public function show(TitleSubmission $title)
    {
        $this->authorizeView($title);
        return view('titles.show', compact('title'));
    }

    public function edit(TitleSubmission $title)
    {
        $u = auth()->user();
        if ($u->isMahasiswa()) { abort_unless($title->student_id === $u->id && in_array($title->status,['diajukan','revisi']), 403); return view('titles.create', compact('title')); }
        abort_unless($u->isJurusan(), 403);
        return view('titles.review', ['title'=>$title, 'dosens'=>User::where('role','dosen')->orderBy('name')->get()]);
    }

    public function update(Request $request, TitleSubmission $title)
    {
        $u = auth()->user();
        if ($u->isMahasiswa()) {
            abort_unless($title->student_id === $u->id && in_array($title->status,['diajukan','revisi']), 403);
            $data = $request->validate(['title'=>'required|string|max:255', 'background'=>'nullable|string']);
            $title->update($data + ['status'=>'diajukan']);
            return redirect()->route('titles.index')->with('success','Pengajuan judul diperbarui dan dikirim ulang.');
        }
        abort_unless($u->isJurusan(), 403);
        return $this->review($request, $title);
    }

    public function review(Request $request, TitleSubmission $title)
    {
        abort_unless(auth()->user()->isJurusan(), 403);
        $data = $request->validate([
            'status'=>'required|in:diajukan,disetujui,ditolak,revisi',
            'supervisor_id'=>'nullable|exists:users,id',
            'notes'=>'nullable|string'
        ]);
        $data['approved_at'] = $data['status'] === 'disetujui' ? now() : null;
        $title->update($data);
        Notification::create(['user_id'=>$title->student_id,'title'=>'Status pengajuan judul','message'=>'Status judul Anda: '.strtoupper($title->status).'. '.$title->notes,'url'=>route('titles.show',$title)]);
        if ($title->supervisor_id) {
            Notification::create(['user_id'=>$title->supervisor_id,'title'=>'Mahasiswa bimbingan baru','message'=>$title->student->name.' ditetapkan sebagai mahasiswa bimbingan Anda.','url'=>route('titles.show',$title)]);
        }
        return redirect()->route('titles.index')->with('success','Status judul diperbarui.');
    }


    public function approvalLetter(TitleSubmission $title)
    {
        $this->authorizeView($title);
        abort_unless($title->status === 'disetujui', 404);
        return view('titles.approval-letter', compact('title'));
    }

    public function destroy(TitleSubmission $title)
    {
        abort_unless(auth()->user()->isJurusan() || $title->student_id === auth()->id(), 403);
        $title->delete();
        return redirect()->route('titles.index')->with('success','Pengajuan judul dihapus.');
    }

    private function authorizeView(TitleSubmission $title): void
    {
        $u = auth()->user();
        abort_unless($u->isJurusan() || $title->student_id === $u->id || $title->supervisor_id === $u->id, 403);
    }
}
