<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name', 'SIM Skripsi') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800">
<nav class="bg-indigo-700 text-white shadow">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3">
        <a href="{{ route('dashboard') }}" class="font-bold">SIM Skripsi & Bimbingan</a>
        @auth
        <div class="flex flex-wrap items-center gap-3 text-sm">
            <span class="hidden rounded bg-indigo-800 px-2 py-1 md:inline">{{ auth()->user()->name }} · {{ auth()->user()->role }}</span>
            <a class="hover:underline" href="{{ route('titles.index') }}">Judul</a>
            <a class="hover:underline" href="{{ route('guidances.index') }}">Bimbingan</a>
            @if(auth()->user()->isDosen())<a class="hover:underline" href="{{ route('supervisions.index') }}">Mahasiswa Bimbingan</a>@endif
            <a class="hover:underline" href="{{ route('exams.index') }}">Sidang</a>
            <a class="hover:underline" href="{{ route('progress.index') }}">Monitoring</a>
            <a class="hover:underline" href="{{ route('archives.index') }}">Arsip</a>
            <a class="hover:underline" href="{{ route('notifications.index') }}">Notifikasi</a>
            @if(auth()->user()->isJurusan())<a class="hover:underline" href="{{ route('users.index') }}">Pengguna</a>@endif
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="rounded bg-white/10 px-3 py-1 hover:bg-white/20">Keluar</button></form>
        </div>
        @endauth
    </div>
</nav>
<main class="mx-auto max-w-7xl p-4">
    @if(session('success'))<div class="mb-4 rounded border border-green-200 bg-green-50 p-3 text-green-700">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700"><ul class="list-disc pl-5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    @yield('content')
</main>
</body>
</html>
