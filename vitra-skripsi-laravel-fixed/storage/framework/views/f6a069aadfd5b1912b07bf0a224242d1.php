

<?php $__env->startSection('content'); ?>
<div class="mx-auto max-w-4xl">
    <div class="rounded-xl bg-white p-6 shadow">

        
        <div class="flex flex-col gap-3 border-b pb-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    <?php echo e($title->title); ?>

                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Detail pengajuan judul skripsi
                </p>
            </div>

            <?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
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
<?php endif; ?>
        </div>

        
        <dl class="mt-6 grid gap-5 md:grid-cols-2">

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Mahasiswa
                </dt>
                <dd class="mt-1 text-slate-800">
                    <?php echo e($title->student->name); ?>

                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Dosen Pembimbing
                </dt>
                <dd class="mt-1 text-slate-800">
                    <?php echo e($title->supervisor->name ?? '-'); ?>

                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Tanggal Persetujuan
                </dt>
                <dd class="mt-1 text-slate-800">
                    <?php echo e(optional($title->approved_at)->format('d/m/Y H:i') ?? '-'); ?>

                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">
                    Catatan
                </dt>
                <dd class="mt-1 text-slate-800">
                    <?php echo e($title->notes ?: '-'); ?>

                </dd>
            </div>

        </dl>

        
        <div class="mt-8 border-t pt-6">
            <h2 class="mb-3 text-lg font-semibold text-slate-800">
                Latar Belakang
            </h2>

            <div class="rounded-lg bg-slate-50 p-4 text-slate-700">
                <p class="whitespace-pre-line">
                    <?php echo e($title->background ?: '-'); ?>

                </p>
            </div>
        </div>

        

        <?php if($title->status === 'disetujui' && auth()->user()->isMahasiswa()): ?>
        <div class="mt-6 border-t pt-6">
            <h2 class="mb-3 text-lg font-semibold text-slate-800">
                Dokumen
            </h2>

            <a href="<?php echo e(route('titles.approvalLetter', $title)); ?>"
               target="_blank"
               class="inline-flex items-center gap-2 rounded-lg bg-green-600 px-4 py-2 text-white transition hover:bg-green-700">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 16V4m0 12l-4-4m4 4l4-4M4 20h16"/>
                </svg>

                Download Surat Penunjukan Pembimbing
            </a>
        </div>
        <?php endif; ?>

        
        <?php if(auth()->user()->isDosen()): ?>
        <div class="mt-6 border-t pt-6">
            <h2 class="mb-3 text-lg font-semibold text-slate-800">
                Voting Judul
            </h2>

            <a href=""
            class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700">

                <svg class="h-5 w-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                </svg>

                Setuju
            </a>

            <a href=""
            class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2 text-white transition hover:bg-red-700">

                <svg class="h-5 w-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 13c-.889.086-1.416.543-2.156 1.057a22.322 22.322 0 0 0-3.958 5.084 1.6 1.6 0 0 1-.582.628 1.549 1.549 0 0 1-1.466.087 1.587 1.587 0 0 1-.537-.406 1.666 1.666 0 0 1-.384-1.279l1.389-4.114M17 13h3V6.5A1.5 1.5 0 0 0 18.5 5v0A1.5 1.5 0 0 0 17 6.5V13Zm-6.5 1H5.585c-.286 0-.372-.014-.626-.15a1.797 1.797 0 0 1-.637-.572 1.873 1.873 0 0 1-.215-1.673l2.098-6.4C6.462 4.48 6.632 4 7.88 4c2.302 0 4.79.943 6.67 1.475"/>
                </svg>

                Tidak Setuju
            </a>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/titles/show.blade.php ENDPATH**/ ?>