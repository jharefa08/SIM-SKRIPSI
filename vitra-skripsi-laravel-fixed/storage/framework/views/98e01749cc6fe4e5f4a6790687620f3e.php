

<?php $__env->startSection('content'); ?>
<div class="mx-auto max-w-3xl rounded bg-white shadow">

    <div class="border-b p-4">
        <h1 class="text-xl font-bold">
            Chat dengan <?php echo e($receiver->name); ?>

        </h1>
        <p class="text-sm text-slate-500">
            <?php echo e(ucfirst($receiver->role)); ?>

        </p>
    </div>

    <div class="h-[500px] space-y-3 overflow-y-auto bg-slate-50 p-4">
        <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <?php if($msg->sender_id == auth()->id()): ?>
                <div class="flex justify-end">
                    <div class="max-w-xs rounded-lg bg-indigo-600 px-4 py-2 text-white">
                        <p><?php echo e($msg->message); ?></p>
                        <small class="block text-right text-xs text-indigo-100">
                            <?php echo e($msg->created_at->format('H:i')); ?>

                        </small>
                    </div>
                </div>
            <?php else: ?>
                <div class="flex justify-start">
                    <div class="max-w-xs rounded-lg bg-white px-4 py-2 shadow">
                        <p><?php echo e($msg->message); ?></p>
                        <small class="block text-right text-xs text-slate-400">
                            <?php echo e($msg->created_at->format('H:i')); ?>

                        </small>
                    </div>
                </div>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-slate-500">
                Belum ada pesan.
            </p>
        <?php endif; ?>
    </div>

    <form method="POST"
          action="<?php echo e(route('chats.store', $receiver)); ?>"
          class="flex gap-2 border-t p-4">
        <?php echo csrf_field(); ?>

        <input type="text"
               name="message"
               class="w-full rounded border p-2"
               placeholder="Tulis pesan..."
               required>

        <button class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            Kirim
        </button>
    </form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\VITRA\SIM-SKRIPSI\vitra-skripsi-laravel-fixed\resources\views/chats/show.blade.php ENDPATH**/ ?>