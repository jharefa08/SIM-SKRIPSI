@extends('layouts.app')
@section('content')
<h1 class="mb-4 text-2xl font-bold">Daftar Seminar/Sidang</h1>
<form method="POST" action="{{ route('exams.store') }}" enctype="multipart/form-data" class="rounded bg-white p-4 shadow">@csrf
<label class="mb-2 block font-semibold">Jenis Pendaftaran</label><select name="type" class="mb-4 w-full rounded border p-2" required><option value="seminar_proposal">Seminar Proposal</option><option value="sidang_skripsi">Sidang Skripsi</option></select>
<label class="mb-2 block font-semibold">Dokumen Persyaratan</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Catatan</label><textarea name="notes" rows="5" class="mb-4 w-full rounded border p-2">{{ old('notes') }}</textarea>
<button class="rounded bg-indigo-600 px-4 py-2 text-white">Kirim Pendaftaran</button>
</form>
@endsection
