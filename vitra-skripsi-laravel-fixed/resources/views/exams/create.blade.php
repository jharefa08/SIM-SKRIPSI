@extends('layouts.app')
@section('content')
<h1 class="mb-4 text-2xl font-bold">Daftar Seminar/Sidang</h1>
<form method="POST" action="{{ route('exams.store') }}" enctype="multipart/form-data" class="rounded bg-white p-4 shadow">@csrf
<label class="mb-2 block font-semibold">Jenis Pendaftaran</label><select name="type" class="mb-4 w-full rounded border p-2" required><option value="seminar_proposal">Seminar Proposal</option><option value="sidang_skripsi">Sidang Skripsi</option></select>

<!-- Seminar Proposal -->
<label class="mb-2 block font-semibold">KRS dan KHS (Semester Awal s/d Akhir)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Transkip Nilai Sementara (Min. Lulus 120 SKS)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Tanda Tangan Kartu  Asistensi Pembimbingan (Min. 6 kali)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Kartu Kontrol Telah Mengikuti Seminar (Min. 6 kali)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Surat Keterangan Bebas Plagiat (Max.30%)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">

<!-- Seminar Skripsi -->
<!-- <label class="mb-2 block font-semibold">KRS dan KHS (Semester Awal s/d Akhir)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Transkip Nilai Sementara (Min. Lulus 1320 SKS)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Tanda Tangan Kartu  Asistensi Pembimbingan (Min. 6 kali)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Kartu Kontrol Telah Mengikuti Seminar (Min. 6 kali)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Slip Pembayaran SPP (Semester 1 s/d Akhir)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Foto 4x6 Latar Merah (2 Lembar)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">SK Pembimbing dan Tim Pelaksana Ujian</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Berita Acara Ujian Proposal</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Surat Keterangan Bebas Plagiat (Max.30%)</label><input type="file" name="document" class="mb-4 w-full rounded border p-2">
<label class="mb-2 block font-semibold">Naskah Lengkap</label><input type="file" name="document" class="mb-4 w-full rounded border p-2"> -->

<label class="mb-2 block font-semibold">Catatan</label><textarea name="notes" rows="5" class="mb-4 w-full rounded border p-2">{{ old('notes') }}</textarea>
<button class="rounded bg-indigo-600 px-4 py-2 text-white">Kirim Pendaftaran</button>
</form>
@endsection
