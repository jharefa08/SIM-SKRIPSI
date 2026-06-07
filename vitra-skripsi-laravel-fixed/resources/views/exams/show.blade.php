@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="rounded-xl bg-white p-6 shadow">

        {{-- Header --}}
        <div class="flex flex-col gap-3 border-b pb-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Detail Pendaftaran Sidang
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Informasi lengkap pendaftaran sidang mahasiswa
                </p>
            </div>

            <x-status :value="$exam->status" />
        </div>

        {{-- Informasi --}}
        <div class="mt-6 grid gap-5 md:grid-cols-2">

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Mahasiswa
                </dt>
                <dd class="mt-1 text-slate-800">
                    {{ $exam->student->name }}
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Jenis Sidang
                </dt>
                <dd class="mt-1 text-slate-800 capitalize">
                    {{ str_replace('_', ' ', $exam->type) }}
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Jadwal Sidang
                </dt>
                <dd class="mt-1 text-slate-800">
                    {{ $exam->scheduled_at?->format('d/m/Y H:i') ?? '-' }}
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Ruangan
                </dt>
                <dd class="mt-1 text-slate-800">
                    {{ $exam->room ?: '-' }}
                </dd>
            </div>
        </div>

        {{-- Catatan --}}
        <div class="mt-8 border-t pt-6">
            <h2 class="mb-3 text-lg font-semibold text-slate-800">
                Catatan
            </h2>

            <div class="rounded-lg bg-slate-50 p-4 text-slate-700">
                {{ $exam->notes ?: 'Tidak ada catatan.' }}
            </div>
        </div>

        {{-- Dokumen --}}
        @if($exam->document_path)
        <div class="mt-6 border-t pt-6">
            <h2 class="mb-3 text-lg font-semibold text-slate-800">
                Dokumen Pendukung
            </h2>

            <a href="{{ asset('storage/'.$exam->document_path) }}"
               target="_blank"
               class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 16V4m0 12l-4-4m4 4l4-4M4 20h16"/>
                </svg>

                Unduh / Lihat Dokumen
            </a>
        </div>
        @endif

    </div>
</div>
@endsection