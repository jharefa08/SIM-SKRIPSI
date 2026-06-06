<?php $__env->startSection('content'); ?>
<div class="mb-4 flex items-center justify-between"><h1 class="text-2xl font-bold">Pendaftaran Seminar/Sidang</h1><?php if(auth()->user()->isMahasiswa()): ?><a href="<?php echo e(route('exams.create')); ?>" class="rounded bg-indigo-600 px-4 py-2 text-white">Daftar Sidang</a><?php endif; ?></div>
<form class="mb-4 grid gap-2 md:grid-cols-4"><select name="type" class="rounded border p-2"><option value="">Semua jenis</option><?php $__currentLoopData = ['seminar_proposal','sidang_skripsi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php if(request('type')==$s): echo 'selected'; endif; ?>><?php echo e(str_replace('_',' ',$s)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><select name="status" class="rounded border p-2"><option value="">Semua status</option><?php $__currentLoopData = ['diajukan','diverifikasi','dijadwalkan','ditolak','selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php if(request('status')==$s): echo 'selected'; endif; ?>><?php echo e($s); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><button class="rounded bg-slate-800 px-4 py-2 text-white">Filter</button></form>
<div class="overflow-x-auto rounded bg-white shadow"><table class="w-full text-sm"><thead class="bg-slate-100"><tr><th class="p-3 text-left">Jenis</th><th>Mahasiswa</th><th>Jadwal</th><th>Ruangan</th><th>Status</th><th>Aksi</th></tr></thead><tbody><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr class="border-t"><td class="p-3"><?php echo e(str_replace('_',' ', $e->type)); ?></td><td><?php echo e($e->student->name); ?></td><td><?php echo e($e->scheduled_at?->format('d/m/Y H:i') ?? '-'); ?></td><td><?php echo e($e->room ?? '-'); ?></td><td><?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51ed764111e345fc11534f121cfeb451 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status','data' => ['value' => $e->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($e->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $attributes = $__attributesOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__attributesOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $component = $__componentOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__componentOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?></td><td class="space-x-2"><a class="text-indigo-700" href="<?php echo e(route('exams.show',$e)); ?>">Detail</a><?php if(auth()->user()->isJurusan()): ?><a class="text-blue-700" href="<?php echo e(route('exams.edit',$e)); ?>">Verifikasi/Jadwal</a><?php endif; ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="6" class="p-4 text-center text-slate-500">Belum ada data.</td></tr><?php endif; ?></tbody></table></div><div class="mt-4"><?php echo e($items->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT\SKRIPSI ORANG\vitra-skripsi-laravel-fixed\resources\views/exams/index.blade.php ENDPATH**/ ?>