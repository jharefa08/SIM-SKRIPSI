
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SIM Skripsi') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800">

    <nav class="bg-indigo-700 text-white shadow">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3">

            <a href="{{ route('dashboard') }}"
               class="text-lg font-bold tracking-wide">
                SIM Skripsi & Bimbingan
            </a>

            @auth
            <div class="flex flex-wrap items-center gap-4 text-sm">

                <span class="hidden rounded bg-indigo-800 px-3 py-1 md:inline">
                    {{ auth()->user()->name }} · {{ auth()->user()->role }}
                </span>

                {{-- Arsip --}}
                <a href="{{ route('archives.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    🗂️ <span>Arsip</span>
                </a>


                {{-- Judul --}}
                <a href="{{ route('titles.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    📄 <span>Judul</span>
                </a>

                {{-- Bimbingan --}}
                <a href="{{ route('guidances.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    📚 <span>Bimbingan</span>
                </a>

                {{-- Mahasiswa Bimbingan --}}
                @if(auth()->user()->isDosen())
                <a href="{{ route('supervisions.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    👨‍🎓 <span>Supervisi</span>
                </a>
                @endif

                {{-- Sidang --}}
                <a href="{{ route('exams.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    🗓️ <span>Sidang</span>
                </a>

                {{-- Monitoring --}}
                <a href="{{ route('progress.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    📈 <span>Monitoring</span>
                </a>

                {{-- Notifikasi --}}
                <a href="{{ route('notifications.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    🔔 <span>Notifikasi</span>
                </a>

                {{-- Pengguna --}}
                @if(auth()->user()->isJurusan())
                <a href="{{ route('users.index') }}"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    👥 <span>Pengguna</span>
                </a>
                @endif

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="rounded bg-white/10 px-3 py-1 transition hover:bg-white/20">
                        🚪 Log out
                    </button>
                </form>

            </div>
            @endauth

        </div>
    </nav>

    <main class="mx-auto max-w-7xl p-4">

        @if(session('success'))
            <div class="mb-4 rounded border border-green-200 bg-green-50 p-3 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>

