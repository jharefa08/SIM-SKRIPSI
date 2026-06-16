@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl rounded bg-white shadow">

    <div class="border-b p-4">
        <h1 class="text-xl font-bold">
            Chat dengan {{ $receiver->name }}
        </h1>
        <p class="text-sm text-slate-500">
            {{ ucfirst($receiver->role) }}
        </p>
    </div>

    <div class="h-[500px] space-y-3 overflow-y-auto bg-slate-50 p-4">
        @forelse($messages as $msg)

            @if($msg->sender_id == auth()->id())
                <div class="flex justify-end">
                    <div class="max-w-xs rounded-lg bg-indigo-600 px-4 py-2 text-white">
                        <p>{{ $msg->message }}</p>
                        <small class="block text-right text-xs text-indigo-100">
                            {{ $msg->created_at->format('H:i') }}
                        </small>
                    </div>
                </div>
            @else
                <div class="flex justify-start">
                    <div class="max-w-xs rounded-lg bg-white px-4 py-2 shadow">
                        <p>{{ $msg->message }}</p>
                        <small class="block text-right text-xs text-slate-400">
                            {{ $msg->created_at->format('H:i') }}
                        </small>
                    </div>
                </div>
            @endif

        @empty
            <p class="text-center text-slate-500">
                Belum ada pesan.
            </p>
        @endforelse
    </div>

    <form method="POST"
          action="{{ route('chats.store', $receiver) }}"
          class="flex gap-2 border-t p-4">
        @csrf

        <input type="text"
               name="message"
               class="w-full rounded border p-2"
               placeholder="Tulis pesan..."
               required>

        <button class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            Kirim
        </button>
    </form>

</div>
@endsection