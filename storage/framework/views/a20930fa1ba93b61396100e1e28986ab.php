

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">My Applications</h1>
    <a href="<?php echo e(route('student.applications.create')); ?>" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + New Application
    </a>
</div>

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="p-5 border-b border-gray-100 dark:border-gray-700 last:border-0 hover:bg-gray-50 dark:hover:bg-gray-700/50">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white"><?php echo e($app->program->name ?? 'Program N/A'); ?></h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1"><?php echo e($app->program->university->name ?? ''); ?></p>
                <p class="text-xs text-gray-400 mt-1"><?php echo e(ucfirst($app->intake_semester)); ?> <?php echo e($app->intake_year); ?> • Applied <?php echo e($app->created_at->format('M d, Y')); ?></p>
            </div>
            <?php
                $colors = ['draft'=>'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300','submitted'=>'bg-blue-100 text-blue-700','processing'=>'bg-yellow-100 text-yellow-700','accepted'=>'bg-green-100 text-green-700','rejected'=>'bg-red-100 text-red-700'];
                $c = $colors[$app->status] ?? 'bg-gray-100 text-gray-600';
            ?>
            <span class="shrink-0 px-3 py-1 text-xs font-bold rounded-lg <?php echo e($c); ?> uppercase"><?php echo e($app->status); ?></span>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="p-12 text-center text-gray-400">
        <p class="text-lg font-medium mb-3">No applications yet</p>
        <a href="<?php echo e(route('student.applications.create')); ?>" class="text-[#f15a24] font-bold hover:underline">Start your first application →</a>
    </div>
    <?php endif; ?>
</div>
<?php if($applications->hasPages()): ?>
<div class="mt-6 flex justify-center"><?php echo e($applications->links()); ?></div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hainan\resources\views/student/applications/index.blade.php ENDPATH**/ ?>