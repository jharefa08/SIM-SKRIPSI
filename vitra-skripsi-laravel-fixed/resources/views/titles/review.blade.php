@extends('layouts.app')
@section('content')
<h1 class="mb-4 text-2xl font-bold">Review Pengajuan Judul</h1>
<div class="mb-4 rounded bg-white p-4 shadow"><h2 class="font-bold">{{ $title->title }}</h2><p class="text-sm text-slate-500">Mahasiswa: {{ $title->student->name }}</p><p class="mt-3 whitespace-pre-line">{{ $title->background }}</p></div>
<form method="POST" action="{{ route('titles.review',$title) }}" class="rounded bg-white p-4 shadow">
@csrf
<label class="mb-2 block font-semibold">Status</label><select name="status" class="mb-4 w-full rounded border p-2" required>@foreach(['diajukan','disetujui','ditolak','revisi'] as $s)<option value="{{ $s }}" @selected(old('status',$title->status)==$s)>{{ strtoupper($s) }}</option>@endforeach</select>
<label class="mb-2 block font-semibold">Dosen Pembimbing 1</label><select name="supervisor_id" class="mb-4 w-full rounded border p-2"><option value="">- Pilih dosen -</option>@foreach($dosens as $d)<option value="{{ $d->id }}" @selected(old('supervisor_id',$title->supervisor_id)==$d->id)>{{ $d->name }}</option>@endforeach</select>
<label class="mb-2 block font-semibold">Dosen Pembimbing 2</label><select name="supervisor_id" class="mb-4 w-full rounded border p-2"><option value="">- Pilih dosen -</option>@foreach($dosens as $d)<option value="{{ $d->id }}" @selected(old('supervisor_id',$title->supervisor_id)==$d->id)>{{ $d->name }}</option>@endforeach</select>
<label class="mb-2 block font-semibold">Catatan Jurusan</label><textarea name="notes" rows="5" class="mb-4 w-full rounded border p-2">{{ old('notes',$title->notes) }}</textarea>
<button class="rounded bg-indigo-600 px-4 py-2 text-white">Simpan Review</button>
</form>
@endsection
