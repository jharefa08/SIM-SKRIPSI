
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'SIM Skripsi')); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800">

    <nav class="bg-indigo-700 text-white shadow">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3">

            <a href="<?php echo e(route('dashboard')); ?>"
               class="text-lg font-bold tracking-wide">
                SIM Skripsi & Bimbingan
            </a>

            <?php if(auth()->guard()->check()): ?>
            <div class="flex flex-wrap items-center gap-4 text-sm">

                <span class="hidden rounded bg-indigo-800 px-3 py-1 md:inline">
                    <?php echo e(auth()->user()->name); ?> · <?php echo e(auth()->user()->role); ?>

                </span>

                
                <a href="<?php echo e(route('archives.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    🗂️ <span>Arsip</span>
                </a>


                
                <a href="<?php echo e(route('titles.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    📄 <span>Judul</span>
                </a>

                
                <a href="<?php echo e(route('guidances.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    📚 <span>Bimbingan</span>
                </a>

                
                <?php if(auth()->user()->isDosen()): ?>
                <a href="<?php echo e(route('supervisions.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    👨‍🎓 <span>Supervisi</span>
                </a>
                <?php endif; ?>

                
                <a href="<?php echo e(route('exams.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    🗓️ <span>Sidang</span>
                </a>

                
                <a href="<?php echo e(route('progress.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    📈 <span>Monitoring</span>
                </a>

                
                <a href="<?php echo e(route('notifications.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    🔔 <span>Notifikasi</span>
                </a>

                
                <?php if(auth()->user()->isJurusan()): ?>
                <a href="<?php echo e(route('users.index')); ?>"
                   class="flex items-center gap-1 hover:text-indigo-200">
                    👥 <span>Pengguna</span>
                </a>
                <?php endif; ?>

                
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button
                        type="submit"
                        class="rounded bg-white/10 px-3 py-1 transition hover:bg-white/20">
                        🚪 Log out
                    </button>
                </form>

            </div>
            <?php endif; ?>

        </div>
    </nav>

    <main class="mx-auto max-w-7xl p-4">

        <?php if(session('success')): ?>
            <div class="mb-4 rounded border border-green-200 bg-green-50 p-3 text-green-700">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($e); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

    </main>

</body>
</html>

<?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/layouts/app.blade.php ENDPATH**/ ?>