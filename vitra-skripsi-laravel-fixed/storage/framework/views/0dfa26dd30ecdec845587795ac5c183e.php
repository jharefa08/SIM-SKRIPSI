
<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <h1 class="text-2xl font-bold">Tracking Riwayat Bimbingan & Skripsi</h1>
    <p class="text-slate-500">Mahasiswa: <?php echo e($student->name); ?> · <?php echo e($student->identifier ?: '-'); ?></p>
</div>
<div class="space-y-4">
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">1. Pengajuan Judul</h2>
        <?php $__empty_1 = true; $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border-t py-3 first:border-t-0"><div class="font-semibold"><?php echo e($t->title); ?></div><div class="text-sm text-slate-500">Status: <?php echo e($t->status); ?> · Dosen: <?php echo e($t->supervisor->name ?? '-'); ?> · <?php echo e($t->created_at->format('d/m/Y H:i')); ?></div></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <p class="text-slate-500">Belum ada pengajuan judul.</p> <?php endif; ?>
    </section>
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">2. Riwayat Bimbingan</h2>
        <?php $__empty_1 = true; $__currentLoopData = $guidances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border-t py-3 first:border-t-0"><div class="font-semibold"><?php echo e(strtoupper($g->type)); ?> - <?php echo e($g->session_date->format('d/m/Y')); ?></div><div class="text-sm text-slate-500">Dosen: <?php echo e($g->supervisor->name); ?> · Status: <?php echo e($g->status); ?></div><p class="mt-1 text-sm">Mahasiswa: <?php echo e($g->student_note); ?></p><p class="mt-1 text-sm">Dosen: <?php echo e($g->supervisor_note ?: '-'); ?></p></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <p class="text-slate-500">Belum ada bimbingan.</p> <?php endif; ?>
    </section>
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">3. Pendaftaran & Jadwal Sidang</h2>
        <?php $__empty_1 = true; $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border-t py-3 first:border-t-0"><div class="font-semibold"><?php echo e(str_replace('_',' ',strtoupper($e->type))); ?></div><div class="text-sm text-slate-500">Status: <?php echo e($e->status); ?> · Jadwal: <?php echo e(optional($e->scheduled_at)->format('d/m/Y H:i') ?? '-'); ?> · Ruang: <?php echo e($e->room ?? '-'); ?></div></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <p class="text-slate-500">Belum ada pendaftaran sidang.</p> <?php endif; ?>
    </section>
    <section class="rounded bg-white p-4 shadow">
        <h2 class="mb-3 font-bold">4. Arsip Skripsi</h2>
        <?php $__empty_1 = true; $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border-t py-3 first:border-t-0"><a class="font-semibold text-indigo-700" href="<?php echo e(route('archives.show',$a)); ?>"><?php echo e($a->title); ?></a><div class="text-sm text-slate-500">Tahun: <?php echo e($a->year); ?> · Keyword: <?php echo e($a->keywords ?: '-'); ?></div></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <p class="text-slate-500">Belum ada arsip.</p> <?php endif; ?>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/progress/show.blade.php ENDPATH**/ ?>