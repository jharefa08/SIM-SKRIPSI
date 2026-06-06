
<?php $__env->startSection('content'); ?>
<div class="rounded bg-white p-5 shadow"><div class="flex justify-between"><h1 class="text-2xl font-bold">Detail Bimbingan</h1><?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51ed764111e345fc11534f121cfeb451 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status','data' => ['value' => $guidance->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($guidance->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $attributes = $__attributesOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__attributesOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $component = $__componentOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__componentOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?></div><dl class="mt-4 grid gap-3 md:grid-cols-2"><div><dt class="text-sm text-slate-500">Mahasiswa</dt><dd><?php echo e($guidance->student->name); ?></dd></div><div><dt class="text-sm text-slate-500">Dosen</dt><dd><?php echo e($guidance->supervisor->name); ?></dd></div><div><dt class="text-sm text-slate-500">Tanggal</dt><dd><?php echo e($guidance->session_date?->format('d/m/Y')); ?></dd></div><div><dt class="text-sm text-slate-500">Jenis/Bab</dt><dd><?php echo e(ucfirst($guidance->type)); ?> - <?php echo e($guidance->chapter); ?></dd></div></dl><h2 class="mt-5 font-bold">Catatan Mahasiswa</h2><p class="whitespace-pre-line"><?php echo e($guidance->student_note); ?></p><h2 class="mt-5 font-bold">Catatan Dosen</h2><p class="whitespace-pre-line"><?php echo e($guidance->supervisor_note ?: '-'); ?></p><?php if($guidance->file_path): ?><a class="mt-4 inline-block text-indigo-700" target="_blank" href="<?php echo e(asset('storage/'.$guidance->file_path)); ?>">Unduh/Lihat File</a><?php endif; ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/guidances/show.blade.php ENDPATH**/ ?>