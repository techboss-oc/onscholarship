

<?php $__env->startSection('title', 'Partner Universities'); ?>
<?php $__env->startSection('meta_description', 'Discover top universities in China for international students. Explore partner universities with Onscholarship.'); ?>
<?php $__env->startSection('meta_keywords', 'Universities in China, Study in China, Partner Universities, Onscholarship'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-28 pb-24 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" data-aos="fade-up">

        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-black text-[#0f2441] dark:text-white brand-font">Explore <span class="text-[#f15a24]">Universities</span></h1>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Discover top-ranking institutions across China offering premium education for international students.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Reused Card Layout from Homepage -->
            <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 flex flex-col">
                <div class="relative h-48 overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <div class="w-full h-full bg-gradient-to-br from-[#0f2441] to-blue-900 flex items-center justify-center opacity-80 group-hover:scale-110 transition duration-700">
                        <span class="text-white text-5xl font-extrabold opacity-30"><?php echo e(substr($university->name, 0, 1)); ?></span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 flex items-center gap-4">
                        <span class="px-3 py-1 bg-[#f15a24] text-white text-xs font-bold rounded-full shadow"><?php echo e($university->city ?? 'China'); ?></span>
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 brand-font line-clamp-1"><?php echo e($university->name); ?></h4>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2"><?php echo e(Str::limit($university->description ?? 'Discover exclusive programs and opportunities offered at this esteemed institution.', 80)); ?></p>

                    <div class="mt-auto border-t border-gray-100 dark:border-gray-700 pt-4 flex justify-between items-center">
                        <span class="font-bold text-[#0f2441] dark:text-gray-200 text-sm"><?php echo e($university->programs_count ?? 0); ?> Programs</span>
                        <a href="<?php echo e(route('universities.show', $university->id)); ?>" class="text-[#f15a24] text-sm font-semibold hover:text-[#d94a1c] transition">View Details &rarr;</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php echo e($universities->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hainan\resources\views/pages/universities.blade.php ENDPATH**/ ?>