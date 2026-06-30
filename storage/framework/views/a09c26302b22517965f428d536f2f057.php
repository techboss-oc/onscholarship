

<?php $__env->startSection('content'); ?>
<?php
    $isAgent = auth()->user()->hasRole('agent');
    $homeRoute = $isAgent ? 'agent.dashboard' : 'student.dashboard';
    $programRoute = $isAgent ? 'agent.programs.search' : 'student.programs.search';
?>

<div class="max-w-7xl mx-auto">
    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-gray-200 dark:border-gray-700 bg-white/70 dark:bg-gray-800/60 text-xs font-black uppercase tracking-widest text-gray-600 dark:text-gray-300">
                <span class="w-1.5 h-1.5 rounded-full bg-[#f15a24]"></span>
                Scholarship
            </div>
            <h1 class="mt-4 text-2xl sm:text-3xl font-black brand-font text-gray-900 dark:text-white">Scholarships</h1>
            <div class="mt-2 flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 flex-wrap">
                <a href="<?php echo e(route($homeRoute)); ?>" class="hover:text-[#f15a24] transition">Home</a>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <a href="<?php echo e(route($programRoute)); ?>" class="hover:text-[#f15a24] transition">Programs</a>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-semibold">Scholarships</span>
            </div>
        </div>

        <div class="flex items-center gap-3 flex-wrap">
            <div class="px-4 py-2.5 rounded-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                <div class="text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400">Total</div>
                <div class="text-lg font-black brand-font text-gray-900 dark:text-white"><?php echo e(number_format($scholarships->total())); ?></div>
            </div>
            <a href="<?php echo e(route($programRoute)); ?>" class="inline-flex items-center justify-center px-5 py-3 rounded-2xl font-bold text-white transition shadow-sm hover:opacity-95" style="background:#0f2441;">
                Find Programs
            </a>
        </div>
    </div>

    <div class="mt-8">
        <details class="group rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden" open>
            <summary class="cursor-pointer list-none px-5 py-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl flex items-center justify-center bg-[#f15a24]/10 text-[#f15a24]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-black brand-font text-gray-900 dark:text-white">Filters</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Search and refine scholarship results</div>
                    </div>
                </div>
                <div class="w-11 h-11 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 flex items-center justify-center text-gray-500 dark:text-gray-300 group-open:rotate-180 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </summary>

            <div class="px-5 pb-5">
                <form action="<?php echo e(url()->current()); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">Keyword</label>
                        <input type="text" name="keyword" value="<?php echo e(request('keyword')); ?>" placeholder="Scholarship or university..." class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 text-gray-900 dark:text-white placeholder:text-gray-400 focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">University</label>
                        <select name="university_id" class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 text-gray-900 dark:text-white focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                            <option value="">All</option>
                            <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($uni->id); ?>" <?php echo e(request('university_id') == $uni->id ? 'selected' : ''); ?>><?php echo e($uni->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">Type</label>
                        <select name="type" class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 text-gray-900 dark:text-white focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                            <option value="">All</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>" <?php echo e(request('type') == $type ? 'selected' : ''); ?>><?php echo e(ucfirst($type)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">Coverage</label>
                        <input type="text" name="coverage" value="<?php echo e(request('coverage')); ?>" placeholder="e.g. Tuition, Stipend" class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 text-gray-900 dark:text-white placeholder:text-gray-400 focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                    </div>

                    <div class="flex items-end gap-3 lg:col-span-5">
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 rounded-2xl font-bold text-white transition shadow-sm hover:opacity-95" style="background:#f15a24;">
                            Find Scholarships
                        </button>
                        <a href="<?php echo e(url()->current()); ?>" class="inline-flex items-center justify-center px-6 py-3 rounded-2xl font-bold border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/70 transition">
                            Clear
                        </a>
                    </div>
                </form>
            </div>
        </details>
    </div>

    <div class="mt-8 lg:hidden space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden">
                <div class="p-5">
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <div class="text-sm font-bold text-gray-500 dark:text-gray-400 break-words">
                                <?php echo e($scholarship->university->name); ?>

                                <?php if($scholarship->university->is_featured): ?>
                                    <span class="ml-1 text-[11px] font-black uppercase tracking-widest text-amber-500">(Gold)</span>
                                <?php endif; ?>
                            </div>
                            <div class="mt-1 text-lg font-black brand-font text-gray-900 dark:text-white break-words">
                                <?php echo e($scholarship->name); ?>

                            </div>
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed break-words line-clamp-3">
                                <?php echo e($scholarship->description); ?>

                            </div>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black uppercase tracking-widest border border-[#f15a24]/25 text-[#f15a24] bg-[#f15a24]/10">
                            <?php echo e($scholarship->type); ?>

                        </span>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-gray-50 dark:bg-gray-900/40 border border-gray-200/70 dark:border-gray-700 p-4">
                            <div class="text-[11px] font-black uppercase tracking-widest text-gray-500 dark:text-gray-400">Slots</div>
                            <div class="mt-1 text-sm font-bold text-gray-900 dark:text-white"><?php echo e($scholarship->available_slots ?? 0); ?></div>
                        </div>
                        <div class="rounded-2xl bg-gray-50 dark:bg-gray-900/40 border border-gray-200/70 dark:border-gray-700 p-4">
                            <div class="text-[11px] font-black uppercase tracking-widest text-gray-500 dark:text-gray-400">Deadline</div>
                            <div class="mt-1 text-sm font-bold text-gray-900 dark:text-white"><?php echo e($scholarship->deadline ? $scholarship->deadline->format('Y-m-d') : 'N/A'); ?></div>
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-end">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 rounded-2xl font-bold text-white transition hover:opacity-95" style="background:#0f2441;">
                            View &amp; Apply
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-10 text-center text-gray-500 dark:text-gray-400">
                No scholarships found matching your criteria.
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-8 hidden lg:block rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                <thead class="bg-gray-50 dark:bg-gray-900/40 text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="px-6 py-4">University</th>
                        <th class="px-6 py-4">Scholarship</th>
                        <th class="px-6 py-4">Slots</th>
                        <th class="px-6 py-4">Deadline</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    <?php $__empty_1 = true; $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/30">
                            <td class="px-6 py-5 align-top">
                                <div class="font-bold text-gray-900 dark:text-white break-words">
                                    <?php echo e($scholarship->university->name); ?>

                                    <?php if($scholarship->university->is_featured): ?>
                                        <span class="ml-1 text-[11px] font-black uppercase tracking-widest text-amber-500">(Gold)</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-top">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0">
                                        <div class="font-black brand-font text-gray-900 dark:text-white break-words"><?php echo e($scholarship->name); ?></div>
                                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-2 break-words"><?php echo e($scholarship->description); ?></div>
                                        <div class="mt-3">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black uppercase tracking-widest border border-[#f15a24]/25 text-[#f15a24] bg-[#f15a24]/10">
                                                <?php echo e($scholarship->type); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-top">
                                <div class="font-bold text-gray-900 dark:text-white"><?php echo e($scholarship->available_slots ?? 0); ?></div>
                            </td>
                            <td class="px-6 py-5 align-top">
                                <div class="font-bold text-green-600 dark:text-green-400"><?php echo e($scholarship->deadline ? $scholarship->deadline->format('Y-m-d') : 'N/A'); ?></div>
                            </td>
                            <td class="px-6 py-5 align-top text-right">
                                <a href="#" class="inline-flex items-center justify-center px-4 py-2 rounded-xl font-bold text-white transition hover:opacity-95" style="background:#0f2441;">
                                    View &amp; Apply
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center text-gray-500 dark:text-gray-400">No scholarships found matching your criteria.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="text-sm text-gray-500 dark:text-gray-400">Rows per page</div>
            <select onchange="window.location.href=this.value" class="px-3 py-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm">
                <option value="<?php echo e(request()->fullUrlWithQuery(['per_page' => 10])); ?>" <?php echo e($perPage == 10 ? 'selected' : ''); ?>>10</option>
                <option value="<?php echo e(request()->fullUrlWithQuery(['per_page' => 25])); ?>" <?php echo e($perPage == 25 ? 'selected' : ''); ?>>25</option>
                <option value="<?php echo e(request()->fullUrlWithQuery(['per_page' => 50])); ?>" <?php echo e($perPage == 50 ? 'selected' : ''); ?>>50</option>
            </select>
        </div>
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Showing <span class="font-bold text-gray-900 dark:text-white"><?php echo e($scholarships->firstItem() ?? 0); ?>–<?php echo e($scholarships->lastItem() ?? 0); ?></span> of <span class="font-bold text-gray-900 dark:text-white"><?php echo e($scholarships->total()); ?></span>
        </div>
    </div>

    <div class="mt-6 flex justify-center">
        <?php echo e($scholarships->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layoutName, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hainan\resources\views/shared/scholarships.blade.php ENDPATH**/ ?>