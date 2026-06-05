<?php
namespace App\Http\Controllers;

use App\Models\{ExamRegistration, Notification, User};
use Illuminate\Http\Request;

class ExamRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $u = auth()->user();
        $items = ExamRegistration::with('student')
            ->when($u->isMahasiswa(), fn($q)=>$q->where('student_id',$u->id))
            ->when($request->status, fn($q,$v)=>$q->where('status',$v))
            ->when($request->type, fn($q,$v)=>$q->where('type',$v))
            ->latest()->paginate(10)->withQueryString();
        return view('exams.index', compact('items'));
    }

    public function create() { abort_unless(auth()->user()->isMahasiswa(), 403); return view('exams.create'); }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->isMahasiswa(), 403);
        $data = $request->validate([
            'type'=>'required|in:seminar_proposal,sidang_skripsi', 'document'=>'nullable|file|mimes:pdf,doc,docx|max:8192', 'notes'=>'nullable|string'
        ]);
        if ($request->hasFile('document')) $data['document_path'] = $request->file('document')->store('exams','public');
        $exam = ExamRegistration::create($data + ['student_id'=>auth()->id(), 'status'=>'diajukan']);
        foreach (User::where('role','jurusan')->get() as $jurusan) {
            Notification::create(['user_id'=>$jurusan->id,'title'=>'Pendaftaran sidang baru','message'=>auth()->user()->name.' mendaftar '.$exam->type.'.','url'=>route('exams.edit',$exam)]);
        }
        return redirect()->route('exams.index')->with('success','Pendaftaran berhasil dikirim.');
    }

    public function show(ExamRegistration $exam)
    {
        abort_unless(auth()->user()->isJurusan() || $exam->student_id === auth()->id(), 403);
        return view('exams.show', compact('exam'));
    }

    public function edit(ExamRegistration $exam)
    {
        abort_unless(auth()->user()->isJurusan(), 403);
        return view('exams.schedule', compact('exam'));
    }

    public function update(Request $request, ExamRegistration $exam) { return $this->verify($request, $exam); }

    public function verify(Request $request, ExamRegistration $exam)
    {
        abort_unless(auth()->user()->isJurusan(), 403);
        $data = $request->validate([
            'status'=>'required|in:diajukan,diverifikasi,dijadwalkan,ditolak,selesai',
            'scheduled_at'=>'nullable|date', 'room'=>'nullable|string|max:100', 'notes'=>'nullable|string'
        ]);
        $exam->update($data);
        Notification::create(['user_id'=>$exam->student_id,'title'=>'Status pendaftaran sidang','message'=>'Status pendaftaran: '.strtoupper($exam->status),'url'=>route('exams.show',$exam)]);
        return redirect()->route('exams.index')->with('success','Pendaftaran sidang diperbarui.');
    }

    public function finish(ExamRegistration $exam)
    {
        abort_unless(auth()->user()->isJurusan(), 403);
        $exam->update(['status'=>'selesai']);
        Notification::create(['user_id'=>$exam->student_id,'title'=>'Sidang selesai','message'=>'Status sidang Anda telah ditandai selesai.','url'=>route('exams.show',$exam)]);
        return back()->with('success','Sidang ditandai selesai.');
    }

    public function destroy(ExamRegistration $exam)
    {
        abort_unless(auth()->user()->isJurusan() || ($exam->student_id === auth()->id() && $exam->status === 'diajukan'), 403);
        $exam->delete();
        return redirect()->route('exams.index')->with('success','Pendaftaran sidang dihapus.');
    }
}
