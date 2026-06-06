
<?php $__env->startSection('content'); ?>
<div class="rounded bg-white p-5 shadow"><div class="flex justify-between"><h1 class="text-2xl font-bold">Detail Pendaftaran Sidang</h1><?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51ed764111e345fc11534f121cfeb451 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status','data' => ['value' => $exam->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($exam->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $attributes = $__attributesOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__attributesOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $component = $__componentOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__componentOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?></div><dl class="mt-4 grid gap-3 md:grid-cols-2"><div><dt class="text-sm text-slate-500">Mahasiswa</dt><dd><?php echo e($exam->student->name); ?></dd></div><div><dt class="text-sm text-slate-500">Jenis</dt><dd><?php echo e(str_replace('_',' ', $exam->type)); ?></dd></div><div><dt class="text-sm text-slate-500">Jadwal</dt><dd><?php echo e($exam->scheduled_at?->format('d/m/Y H:i') ?? '-'); ?></dd></div><div><dt class="text-sm text-slate-500">Ruangan</dt><dd><?php echo e($exam->room ?? '-'); ?></dd></div></dl><h2 class="mt-5 font-bold">Catatan</h2><p class="whitespace-pre-line"><?php echo e($exam->notes ?: '-'); ?></p><?php if($exam->document_path): ?><a class="mt-4 inline-block text-indigo-700" target="_blank" href="<?php echo e(asset('storage/'.$exam->document_path)); ?>">Unduh/Lihat Dokumen</a><?php endif; ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/exams/show.blade.php ENDPATH**/ ?>