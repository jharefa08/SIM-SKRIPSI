
<?php $__env->startSection('content'); ?>
<div class="rounded bg-white p-5 shadow"><div class="flex justify-between"><h1 class="text-2xl font-bold"><?php echo e($title->title); ?></h1><?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51ed764111e345fc11534f121cfeb451 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status','data' => ['value' => $title->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $attributes = $__attributesOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__attributesOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $component = $__componentOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__componentOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?></div><dl class="mt-4 grid gap-3 md:grid-cols-2"><div><dt class="text-sm text-slate-500">Mahasiswa</dt><dd><?php echo e($title->student->name); ?></dd></div><div><dt class="text-sm text-slate-500">Dosen Pembimbing</dt><dd><?php echo e($title->supervisor->name ?? '-'); ?></dd></div><div><dt class="text-sm text-slate-500">Tanggal Persetujuan</dt><dd><?php echo e(optional($title->approved_at)->format('d/m/Y H:i') ?? '-'); ?></dd></div><div><dt class="text-sm text-slate-500">Catatan</dt><dd><?php echo e($title->notes ?? '-'); ?></dd></div></dl><div class="mt-5"><h2 class="font-bold">Latar Belakang</h2><p class="whitespace-pre-line"><?php echo e($title->background ?: '-'); ?></p><?php if($title->status === 'disetujui'): ?><div class="mt-5"><a target="_blank" href="<?php echo e(route('titles.approvalLetter',$title)); ?>" class="rounded bg-green-600 px-4 py-2 text-white">Download Surat Penunjukan Pembimbing</a></div><?php endif; ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/titles/show.blade.php ENDPATH**/ ?>