<?php $__env->startSection('content'); ?>
<div class="mb-4 flex items-center justify-between"><h1 class="text-2xl font-bold">Pengajuan Judul</h1><?php if(auth()->user()->isMahasiswa()): ?><a href="<?php echo e(route('titles.create')); ?>" class="rounded bg-indigo-600 px-4 py-2 text-white">Ajukan Judul</a><?php endif; ?></div>
<form class="mb-4 grid gap-2 md:grid-cols-4"><input name="q" value="<?php echo e(request('q')); ?>" class="rounded border p-2 md:col-span-2" placeholder="Cari judul/mahasiswa"><select name="status" class="rounded border p-2"><option value="">Semua status</option><?php $__currentLoopData = ['diajukan','disetujui','ditolak','revisi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s); ?>" <?php if(request('status')==$s): echo 'selected'; endif; ?>><?php echo e($s); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><button class="rounded bg-slate-800 px-4 py-2 text-white">Filter</button></form>
<div class="overflow-x-auto rounded bg-white shadow"><table class="w-full text-sm"><thead class="bg-slate-100"><tr><th class="p-3 text-left">Judul</th><th>Mahasiswa</th><th>Dosen</th><th>Status</th><th>Aksi</th></tr></thead><tbody><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr class="border-t"><td class="p-3 font-medium"><?php echo e($t->title); ?></td><td><?php echo e($t->student->name); ?></td><td><?php echo e($t->supervisor->name ?? '-'); ?></td><td><?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51ed764111e345fc11534f121cfeb451 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status','data' => ['value' => $t->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($t->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $attributes = $__attributesOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__attributesOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $component = $__componentOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__componentOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?></td><td class="space-x-2"><a class="text-indigo-700" href="<?php echo e(route('titles.show',$t)); ?>">Detail</a><?php if(auth()->user()->isJurusan() || (auth()->id()==$t->student_id && in_array($t->status,['diajukan','revisi']))): ?><a class="text-blue-700" href="<?php echo e(route('titles.edit',$t)); ?>">Edit/Review</a><?php endif; ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="5" class="p-4 text-center text-slate-500">Belum ada data.</td></tr><?php endif; ?></tbody></table></div><div class="mt-4"><?php echo e($items->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT\SKRIPSI ORANG\vitra-skripsi-laravel-fixed\resources\views/titles/index.blade.php ENDPATH**/ ?>