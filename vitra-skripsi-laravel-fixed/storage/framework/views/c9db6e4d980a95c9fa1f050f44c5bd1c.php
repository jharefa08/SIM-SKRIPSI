

<?php $__env->startSection('content'); ?>

<div class="mb-4 flex items-center justify-between">
    <h1 class="text-2xl font-bold">Pengajuan Judul</h1>

<?php if(auth()->user()->isMahasiswa()): ?>
    <a href="<?php echo e(route('titles.create')); ?>"
       class="rounded bg-indigo-600 px-4 py-2 text-white">
        Ajukan Judul
    </a>
<?php endif; ?>

</div>

<form class="mb-4 grid gap-2 md:grid-cols-4">
    <input name="q"
           value="<?php echo e(request('q')); ?>"
           class="rounded border p-2 md:col-span-2"
           placeholder="Cari judul/mahasiswa">

<select name="status" class="rounded border p-2">
    <option value="">Semua status</option>
    <?php $__currentLoopData = ['Diajukan','Disetujui','Ditolak','Revisi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($s); ?>" <?php if(request('status') == $s): echo 'selected'; endif; ?>>
            <?php echo e($s); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<button class="rounded bg-slate-800 px-4 py-2 text-white">
    Filter
</button>

</form>

<div class="overflow-x-auto rounded bg-white shadow">
    <table class="w-full text-sm">
        <thead class="bg-slate-100">
            <tr>
                <th class="p-3 text-left">Judul</th>
                <th>Mahasiswa</th>
                <th>Dosen</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-t">
                <td class="p-3 font-medium">
                    <?php echo e($t->title); ?>

                </td>

                <td><?php echo e($t->student->name); ?></td>

                <td><?php echo e($t->supervisor->name ?? '-'); ?></td>

                <td>
                    <?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
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
<?php endif; ?>
                </td>

                <td class="whitespace-nowrap">
                    <div class="flex items-center justify-center gap-3">

                        
                        <a href="<?php echo e(route('titles.show', $t)); ?>"
                           class="text-indigo-700 hover:text-indigo-900"
                           title="Detail">
                            <svg class="w-5 h-5"
                                 aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24">
                                <path stroke="currentColor"
                                      stroke-width="2"
                                      d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                <path stroke="currentColor"
                                      stroke-width="2"
                                      d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </a>

                        
                        <?php if(auth()->user()->isJurusan() || (auth()->id() == $t->student_id && in_array($t->status, ['diajukan','revisi']))): ?>
                            <a href="<?php echo e(route('titles.edit', $t)); ?>"
                               class="text-blue-700 hover:text-blue-900"
                               title="Edit / Review">
                                <svg class="w-5 h-5"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </a>
                        <?php endif; ?>            

                        
                        <!-- <a href="<?php echo e(route('titles.edit', $t)); ?>"
                        class="text-blue-700 hover:text-blue-900"
                        title="Vote">
                            <svg class="h-6 w-6"
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
                        </a> -->

                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="p-4 text-center text-slate-500">
                    Belum ada data.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</div>

<div class="mt-4">
    <?php echo e($items->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/titles/index.blade.php ENDPATH**/ ?>