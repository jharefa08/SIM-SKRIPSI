
<?php $__env->startSection('content'); ?>
<div class="mb-4 flex items-center justify-between"><h1 class="text-2xl font-bold">Bimbingan Proposal/Skripsi</h1><?php if(auth()->user()->isMahasiswa()): ?><a href="<?php echo e(route('guidances.create')); ?>" class="rounded bg-indigo-600 px-4 py-2 text-white">Tambah Bimbingan</a><?php endif; ?></div>
<form class="mb-4 grid gap-2 md:grid-cols-4"><select name="type" class="rounded border p-2"><option value="">Semua jenis</option><?php $__currentLoopData = ['proposal','skripsi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php if(request('type')==$s): echo 'selected'; endif; ?>><?php echo e($s); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><select name="status" class="rounded border p-2"><option value="">Semua status</option><?php $__currentLoopData = ['menunggu','direview','selesai','revisi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php if(request('status')==$s): echo 'selected'; endif; ?>><?php echo e($s); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><button class="rounded bg-slate-800 px-4 py-2 text-white">Filter</button></form>
<div class="overflow-x-auto rounded bg-white shadow"><table class="w-full text-sm"><thead class="bg-slate-100"><tr><th class="p-3 text-left">Tanggal</th><th>Jenis</th><th>Mahasiswa</th><th>Dosen</th><th>Bab/Topik</th><th>Status</th><th>Aksi</th></tr></thead><tbody><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr class="border-t"><td class="p-3"><?php echo e($g->session_date?->format('d/m/Y')); ?></td><td><?php echo e(ucfirst($g->type)); ?></td><td><?php echo e($g->student->name); ?></td><td><?php echo e($g->supervisor->name); ?></td><td><?php echo e($g->chapter ?? '-'); ?></td><td><?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51ed764111e345fc11534f121cfeb451 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status','data' => ['value' => $g->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($g->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $attributes = $__attributesOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__attributesOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $component = $__componentOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__componentOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?></td><td class="space-x-2"><a class="text-indigo-700" href="<?php echo e(route('guidances.show',$g)); ?>">Detail</a><?php if(auth()->user()->isDosen() && auth()->id()==$g->supervisor_id): ?><a class="text-blue-700" href="<?php echo e(route('guidances.edit',$g)); ?>">Review</a><?php endif; ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="7" class="p-4 text-center text-slate-500">Belum ada data.</td></tr><?php endif; ?></tbody></table></div><div class="mt-4"><?php echo e($items->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/guidances/index.blade.php ENDPATH**/ ?>