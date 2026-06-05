@extends('layouts.app')
@section('content')
<div class="mb-4">
    <h1 class="text-2xl font-bold">Tracking Riwayat Bimbingan & Skripsi</h1>
    <p class="text-slate-500">Mahasiswa: {{ $student->name }} · {{ $student->identifier ?: '-' }}</p>
</div>
<div class="space-y-4">
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">1. Pengajuan Judul</h2>
        @forelse($titles as $t)
            <div class="border-t py-3 first:border-t-0"><div class="font-semibold">{{ $t->title }}</div><div class="text-sm text-slate-500">Status: {{ $t->status }} · Dosen: {{ $t->supervisor->name ?? '-' }} · {{ $t->created_at->format('d/m/Y H:i') }}</div></div>
        @empty <p class="text-slate-500">Belum ada pengajuan judul.</p> @endforelse
    </section>
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">2. Riwayat Bimbingan</h2>
        @forelse($guidances as $g)
            <div class="border-t py-3 first:border-t-0"><div class="font-semibold">{{ strtoupper($g->type) }} - {{ $g->session_date->format('d/m/Y') }}</div><div class="text-sm text-slate-500">Dosen: {{ $g->supervisor->name }} · Status: {{ $g->status }}</div><p class="mt-1 text-sm">Mahasiswa: {{ $g->student_note }}</p><p class="mt-1 text-sm">Dosen: {{ $g->supervisor_note ?: '-' }}</p></div>
        @empty <p class="text-slate-500">Belum ada bimbingan.</p> @endforelse
    </section>
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">3. Pendaftaran & Jadwal Sidang</h2>
        @forelse($exams as $e)
            <div class="border-t py-3 first:border-t-0"><div class="font-semibold">{{ str_replace('_',' ',strtoupper($e->type)) }}</div><div class="text-sm text-slate-500">Status: {{ $e->status }} · Jadwal: {{ optional($e->scheduled_at)->format('d/m/Y H:i') ?? '-' }} · Ruang: {{ $e->room ?? '-' }}</div></div>
        @empty <p class="text-slate-500">Belum ada pendaftaran sidang.</p> @endforelse
    </section>
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">4. Arsip Skripsi</h2>
        @forelse($archives as $a)
            <div class="border-t py-3 first:border-t-0"><a class="font-semibold text-indigo-700" href="{{ route('archives.show',$a) }}">{{ $a->title }}</a><div class="text-sm text-slate-500">Tahun: {{ $a->year }} · Keyword: {{ $a->keywords ?: '-' }}</div></div>
        @empty <p class="text-slate-500">Belum ada arsip.</p> @endforelse
    </section>
</div>
@endsection
