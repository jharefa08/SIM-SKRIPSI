@extends('layouts.app')
@section('content')
<div class="mb-4 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold">Monitoring Progress Mahasiswa</h1>
        <p class="text-sm text-slate-500">Alur sesuai flowchart: judul → bimbingan proposal → seminar proposal → bimbingan skripsi → sidang skripsi → arsip.</p>
    </div>
</div>
<form class="mb-4 flex gap-2">
    <input name="q" value="{{ request('q') }}" class="w-full rounded border p-2" placeholder="Cari mahasiswa/NIM">
    <button class="rounded bg-slate-800 px-4 py-2 text-white">Cari</button>
</form>
<div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
@forelse($students as $s)
    <div class="rounded bg-white p-4 shadow">
        <div class="flex items-start justify-between gap-3">
            <div><h2 class="font-bold">{{ $s->name }}</h2><p class="text-sm text-slate-500">{{ $s->identifier ?: '-' }}</p></div>
            <span class="rounded bg-indigo-100 px-2 py-1 text-sm font-semibold text-indigo-700">{{ $s->progress_percent }}%</span>
        </div>
        <div class="mt-3 h-2 rounded bg-slate-200"><div class="h-2 rounded bg-indigo-600" style="width: {{ $s->progress_percent }}%"></div></div>
        <ul class="mt-3 space-y-1 text-sm">
            <li>Judul disetujui: {{ $s->approved_title ? 'Ya' : 'Belum' }}</li>
            <li>Bimbingan proposal: {{ $s->proposal_guidance_count }} kali</li>
            <li>Seminar proposal: {{ $s->proposal_exam->status ?? '-' }}</li>
            <li>Bimbingan skripsi: {{ $s->skripsi_guidance_count }} kali</li>
            <li>Sidang skripsi: {{ $s->skripsi_exam->status ?? '-' }}</li>
            <li>Arsip: {{ $s->archive ? 'Ada' : 'Belum' }}</li>
        </ul>
        <a href="{{ route('progress.show',$s) }}" class="mt-4 inline-block rounded bg-indigo-600 px-3 py-2 text-sm text-white">Lihat Timeline</a>
    </div>
@empty
    <div class="rounded bg-white p-4 text-slate-500 shadow">Belum ada data mahasiswa.</div>
@endforelse
</div>
<div class="mt-4">{{ $students->links() }}</div>
@endsection
