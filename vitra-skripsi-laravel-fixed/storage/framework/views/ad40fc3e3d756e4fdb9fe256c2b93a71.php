<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'SIM Skripsi')); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-700 via-indigo-600 to-blue-500">

    <div class="flex min-h-screen items-center justify-center px-4 py-8">

        <div class="grid w-full max-w-5xl overflow-hidden rounded-2xl bg-white shadow-2xl md:grid-cols-2">

            
            <div class="hidden bg-indigo-700 p-10 text-white md:flex md:flex-col md:justify-between">

                <div>
                    <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-xl bg-white/20 text-3xl">
                        🎓
                    </div>

                    <h1 class="mb-4 text-3xl font-bold leading-tight">
                        SIM Skripsi & Bimbingan
                    </h1>

                    <p class="text-indigo-100">
                        Sistem informasi untuk membantu proses pengajuan judul,
                        bimbingan, sidang, monitoring, dan arsip skripsi.
                    </p>
                </div>

                <div class="mt-10 text-sm text-indigo-200">
                    © <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'SIM Skripsi')); ?>

                </div>

            </div>

            
            <div class="p-6 sm:p-8 md:p-10">

                <div class="mb-8 text-center md:text-left">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-indigo-100 text-3xl md:mx-0">
                        🔐
                    </div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        Selamat Datang
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Silakan masuk untuk melanjutkan ke sistem.
                    </p>
                </div>

                <?php echo $__env->yieldContent('content'); ?>

            </div>

        </div>

    </div>

</body>
</html><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/layouts/guest.blade.php ENDPATH**/ ?>