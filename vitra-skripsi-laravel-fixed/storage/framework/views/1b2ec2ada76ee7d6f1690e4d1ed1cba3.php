
<?php $__env->startSection('content'); ?>
<div class="mb-4 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold">Monitoring Progress Mahasiswa</h1>
        <p class="text-sm text-slate-500">Alur sesuai flowchart: judul → bimbingan proposal → seminar proposal → bimbingan skripsi → sidang skripsi → arsip.</p>
    </div>
</div>
<form class="mb-4 flex gap-2">
    <input name="q" value="<?php echo e(request('q')); ?>" class="w-full rounded border p-2" placeholder="Cari mahasiswa/NIM">
    <button class="rounded bg-slate-800 px-4 py-2 text-white">Cari</button>
</form>
<div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
<?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="rounded bg-white p-4 shadow">
        <div class="flex items-start justify-between gap-3">
            <div><h2 class="font-bold"><?php echo e($s->name); ?></h2><p class="text-sm text-slate-500"><?php echo e($s->identifier ?: '-'); ?></p></div>
            <span class="rounded bg-indigo-100 px-2 py-1 text-sm font-semibold text-indigo-700"><?php echo e($s->progress_percent); ?>%</span>
        </div>
        <div class="mt-3 h-2 rounded bg-slate-200"><div class="h-2 rounded bg-indigo-600" style="width: <?php echo e($s->progress_percent); ?>%"></div></div>
        <ul class="mt-3 space-y-1 text-sm">
            <li>Judul disetujui: <?php echo e($s->approved_title ? 'Ya' : 'Belum'); ?></li>
            <li>Bimbingan proposal: <?php echo e($s->proposal_guidance_count); ?> kali</li>
            <li>Seminar proposal: <?php echo e($s->proposal_exam->status ?? '-'); ?></li>
            <li>Bimbingan skripsi: <?php echo e($s->skripsi_guidance_count); ?> kali</li>
            <li>Sidang skripsi: <?php echo e($s->skripsi_exam->status ?? '-'); ?></li>
            <li>Arsip: <?php echo e($s->archive ? 'Ada' : 'Belum'); ?></li>
        </ul>
        <a href="<?php echo e(route('progress.show',$s)); ?>" class="mt-4 inline-block rounded bg-indigo-600 px-3 py-2 text-sm text-white">Lihat Timeline</a>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="rounded bg-white p-4 text-slate-500 shadow">Belum ada data mahasiswa.</div>
<?php endif; ?>
</div>
<div class="mt-4"><?php echo e($students->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/progress/index.blade.php ENDPATH**/ ?>