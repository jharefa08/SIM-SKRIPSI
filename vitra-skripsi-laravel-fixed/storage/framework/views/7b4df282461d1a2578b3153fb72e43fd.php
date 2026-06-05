<!doctype html><html lang="id"><head><meta charset="utf-8"><title>Surat Penunjukan Pembimbing</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-white p-8 text-slate-900">
<div class="mx-auto max-w-3xl">
    <div class="text-center"><h1 class="text-xl font-bold uppercase">Surat Penunjukan Dosen Pembimbing</h1><p>Program Studi Teknik Informatika Universitas Musamus Merauke</p></div>
    <hr class="my-6 border-slate-900">
    <p class="mb-4">Berdasarkan hasil persetujuan pengajuan judul skripsi, dengan ini ditetapkan:</p>
    <table class="mb-6 w-full"><tr><td class="w-48 py-1">Mahasiswa</td><td>: <?php echo e($title->student->name); ?></td></tr><tr><td class="py-1">NIM</td><td>: <?php echo e($title->student->identifier ?: '-'); ?></td></tr><tr><td class="py-1 align-top">Judul</td><td>: <?php echo e($title->title); ?></td></tr><tr><td class="py-1">Dosen Pembimbing</td><td>: <?php echo e($title->supervisor->name ?? '-'); ?></td></tr><tr><td class="py-1">Tanggal Persetujuan</td><td>: <?php echo e(optional($title->approved_at)->format('d/m/Y')); ?></td></tr></table>
    <p>Surat ini dapat digunakan sebagai bukti digital persetujuan judul dan penunjukan dosen pembimbing.</p>
    <div class="mt-16 flex justify-end"><div class="text-center"><p>Merauke, <?php echo e(now()->format('d/m/Y')); ?></p><p>Ketua Jurusan</p><br><br><br><p class="font-bold">______________________</p></div></div>
    <button onclick="window.print()" class="mt-8 rounded bg-indigo-600 px-4 py-2 text-white print:hidden">Download/Cetak PDF</button>
</div>
</body></html>
<?php /**PATH D:\PROJECT\SKRIPSI ORANG\vitra-skripsi-laravel-fixed\resources\views/titles/approval-letter.blade.php ENDPATH**/ ?>