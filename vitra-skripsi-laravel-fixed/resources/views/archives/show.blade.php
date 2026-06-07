@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="rounded-xl bg-white p-6 shadow">

        {{-- Header --}}
        <div class="border-b pb-4">
            <h1 class="text-2xl font-bold text-slate-800">
                {{ $archive->title }}
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Detail arsip skripsi mahasiswa
            </p>
        </div>

        {{-- Informasi Arsip --}}
        <dl class="mt-6 grid gap-5 md:grid-cols-2">

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Mahasiswa
                </dt>
                <dd class="mt-1 text-slate-800">
                    {{ $archive->student->name }}
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Tahun
                </dt>
                <dd class="mt-1 text-slate-800">
                    {{ $archive->year }}
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Keyword
                </dt>
                <dd class="mt-1 text-slate-800">
                    {{ $archive->keywords ?: '-' }}
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Publik
                </dt>
                <dd class="mt-1">
                    @if($archive->is_public)
                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">
                            Ya
                        </span>
                    @else
                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-600">
                            Tidak
                        </span>
                    @endif
                </dd>
            </div>

        </dl>

        {{-- Dokumen --}}
        <div class="mt-8 border-t pt-6">
            <h2 class="mb-3 text-lg font-semibold text-slate-800">
                Dokumen Arsip
            </h2>

            <div class="flex flex-col gap-3 sm:flex-row">

                <a href="{{ asset('storage/'.$archive->file_path) }}"
                   target="_blank"
                   class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700">

                    Buka File Skripsi
                </a>

                @if($archive->abstract_path)
                <a href="{{ asset('storage/'.$archive->abstract_path) }}"
                   target="_blank"
                   class="inline-flex items-center justify-center gap-2 rounded-lg bg-slate-700 px-4 py-2 text-white transition hover:bg-slate-800">

                    Buka Abstrak
                </a>
                @endif

            </div>
        </div>

    </div>
</div>
@endsection