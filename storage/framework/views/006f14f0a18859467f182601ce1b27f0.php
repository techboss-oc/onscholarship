

<?php $__env->startSection('title', 'My Wishlist | Onscholarship'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">My Wishlist</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Saved programs you are interested in.</p>
        </div>
        <a href="<?php echo e(route('student.programs.search')); ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-[#f15a24] text-white rounded-lg hover:bg-[#d94e1c] transition text-sm font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            Browse More Programs
        </a>
    </div>

    <?php if($wishlist->isEmpty()): ?>
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-12 text-center">
            <div class="w-20 h-20 bg-gray-50 dark:bg-gray-700/50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Your wishlist is empty</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">Explore thousands of programs and save your favorites here.</p>
            <a href="<?php echo e(route('student.programs.search')); ?>" class="text-[#f15a24] font-medium hover:underline">Find Programs Now &rarr;</a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $program = $item->program; ?>
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="relative h-48">
                        <?php if($program->university->logo): ?>
                            <img src="<?php echo e(Storage::url($program->university->logo)); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-[#0f2441] to-[#1a3a5f] flex items-center justify-center text-white/20 text-4xl font-bold italic">
                                <?php echo e(substr($program->university->name, 0, 1)); ?>

                            </div>
                        <?php endif; ?>
                        <div class="absolute top-4 right-4">
                            <form action="<?php echo e(route('student.wishlist.toggle')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="program_id" value="<?php echo e($program->id); ?>">
                                <button type="submit" class="p-2 bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-full text-red-500 hover:bg-red-50 transition shadow-sm">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold rounded uppercase tracking-wider">
                                <?php echo e($program->degree_level); ?>

                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white line-clamp-1 mb-1"><?php echo e($program->name); ?></h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm flex items-center gap-1 mb-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <?php echo e($program->university->name); ?>

                        </p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-50 dark:border-gray-700">
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-tighter uppercase">Tuition Fee</p>
                                <p class="text-sm font-bold text-[#f15a24]">$<?php echo e(number_format($program->tuition_fee, 0)); ?>/yr</p>
                            </div>
                            <a href="<?php echo e(route('student.applications.create', ['program_id' => $program->id])); ?>" class="px-4 py-2 bg-gray-900 dark:bg-white dark:text-gray-900 text-white rounded-lg text-sm font-bold hover:bg-gray-800 transition">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hainan\resources\views/student/wishlist/index.blade.php ENDPATH**/ ?>