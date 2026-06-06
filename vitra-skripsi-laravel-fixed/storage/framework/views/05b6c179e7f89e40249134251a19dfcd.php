
<?php $__env->startSection('content'); ?>
<h1 class="mb-4 text-2xl font-bold">Daftar Mahasiswa Bimbingan</h1>
<div class="overflow-x-auto rounded bg-white shadow">
<table class="w-full text-sm"><thead class="bg-slate-100"><tr><th class="p-3 text-left">Mahasiswa</th><th>Judul</th><th>Bimbingan</th><th>Terakhir</th><th>Proposal</th><th>Skripsi</th><th>Aksi</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr class="border-t"><td class="p-3 font-medium"><?php echo e($s->name); ?><br><span class="text-slate-500"><?php echo e($s->identifier); ?></span></td><td><?php echo e($s->title_submission->title); ?></td><td><?php echo e($s->guidance_count); ?> kali</td><td><?php echo e(optional($s->last_guidance)->session_date?->format('d/m/Y') ?? '-'); ?></td><td><?php echo e($s->proposal_exam->status ?? '-'); ?></td><td><?php echo e($s->skripsi_exam->status ?? '-'); ?></td><td><a class="text-indigo-700" href="<?php echo e(route('progress.show',$s)); ?>">Tracking</a></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="7" class="p-4 text-center text-slate-500">Belum ada mahasiswa bimbingan.</td></tr><?php endif; ?>
</tbody></table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/supervisions/index.blade.php ENDPATH**/ ?>