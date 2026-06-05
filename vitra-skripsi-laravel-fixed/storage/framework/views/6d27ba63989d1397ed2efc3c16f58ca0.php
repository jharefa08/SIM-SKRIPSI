<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo e(config('app.name', 'SIM Skripsi')); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800">
<nav class="bg-indigo-700 text-white shadow">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3">
        <a href="<?php echo e(route('dashboard')); ?>" class="font-bold">SIM Skripsi & Bimbingan</a>
        <?php if(auth()->guard()->check()): ?>
        <div class="flex flex-wrap items-center gap-3 text-sm">
            <span class="hidden rounded bg-indigo-800 px-2 py-1 md:inline"><?php echo e(auth()->user()->name); ?> · <?php echo e(auth()->user()->role); ?></span>
            <a class="hover:underline" href="<?php echo e(route('titles.index')); ?>">Judul</a>
            <a class="hover:underline" href="<?php echo e(route('guidances.index')); ?>">Bimbingan</a>
            <?php if(auth()->user()->isDosen()): ?><a class="hover:underline" href="<?php echo e(route('supervisions.index')); ?>">Mahasiswa Bimbingan</a><?php endif; ?>
            <a class="hover:underline" href="<?php echo e(route('exams.index')); ?>">Sidang</a>
            <a class="hover:underline" href="<?php echo e(route('progress.index')); ?>">Monitoring</a>
            <a class="hover:underline" href="<?php echo e(route('archives.index')); ?>">Arsip</a>
            <a class="hover:underline" href="<?php echo e(route('notifications.index')); ?>">Notifikasi</a>
            <?php if(auth()->user()->isJurusan()): ?><a class="hover:underline" href="<?php echo e(route('users.index')); ?>">Pengguna</a><?php endif; ?>
            <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?><button class="rounded bg-white/10 px-3 py-1 hover:bg-white/20">Keluar</button></form>
        </div>
        <?php endif; ?>
    </div>
</nav>
<main class="mx-auto max-w-7xl p-4">
    <?php if(session('success')): ?><div class="mb-4 rounded border border-green-200 bg-green-50 p-3 text-green-700"><?php echo e(session('success')); ?></div><?php endif; ?>
    <?php if($errors->any()): ?><div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700"><ul class="list-disc pl-5"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</main>
</body>
</html>
<?php /**PATH D:\PROJECT\SKRIPSI ORANG\vitra-skripsi-laravel-fixed\resources\views/layouts/app.blade.php ENDPATH**/ ?>