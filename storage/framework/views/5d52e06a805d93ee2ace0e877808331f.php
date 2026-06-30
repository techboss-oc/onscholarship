<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <div class="rounded-[28px] border border-[#0f2441]/10 bg-gradient-to-br from-[#0f2441] via-[#12315b] to-[#0d47a1] p-6 sm:p-8 text-white shadow-[0_24px_60px_rgba(15,36,65,0.22)] overflow-hidden relative">
            <div class="absolute -top-16 -right-10 h-48 w-48 rounded-full bg-white/10 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-20 left-10 h-44 w-44 rounded-full blur-3xl pointer-events-none" style="background: rgba(31, 164, 99, 0.18);"></div>

            <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.22em] text-white/85">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#1FA463] animate-pulse"></span>
                        Account Pending Approval
                    </div>

                    <h1 class="mt-5 text-3xl sm:text-4xl font-black brand-font leading-tight">
                        Your agent application is under review
                    </h1>

                    <p class="mt-4 max-w-2xl text-sm sm:text-base leading-7 text-blue-100/90">
                        Thank you for registering with Onscholarship. Our administration team is currently reviewing your agent account details. Once approved, you will receive access to all agent dashboard tools and be notified by email.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <div class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/10 px-4 py-2.5 text-sm font-semibold text-white/90">
                            <span class="w-2 h-2 rounded-full bg-[#1FA463]"></span>
                            Review in progress
                        </div>
                        <div class="inline-flex items-center gap-2 rounded-2xl border border-white/15 bg-white/10 px-4 py-2.5 text-sm font-semibold text-white/90">
                            <span class="w-2 h-2 rounded-full bg-white/80"></span>
                            Email notification after approval
                        </div>
                    </div>
                </div>

                <div class="relative self-start lg:self-center">
                    <div class="rounded-[28px] border border-white/15 bg-white/10 backdrop-blur-md p-5 sm:p-6 min-w-[260px] shadow-2xl">
                        <div class="flex items-center justify-between gap-4">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Onscholarship" class="h-10 w-auto object-contain brightness-0 invert">
                            <div class="rounded-full bg-amber-400/20 px-3 py-1 text-xs font-bold uppercase tracking-[0.18em] text-amber-200">
                                Pending
                            </div>
                        </div>

                        <div class="mt-6 space-y-4">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/50">Agent</p>
                                <p class="mt-1 text-lg font-bold text-white"><?php echo e(auth()->user()->name); ?></p>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/50">Current Access</p>
                                <p class="mt-1 text-sm leading-6 text-white/80">Dashboard navigation is visible, but approval is required before agent operations become active.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[minmax(0,1.3fr)_minmax(320px,0.7fr)]">
            <div class="rounded-[28px] border border-gray-200 bg-white p-6 sm:p-8 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                <div class="flex items-center justify-between gap-4 flex-wrap">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.24em] text-[#1FA463]">Next Steps</p>
                        <h2 class="mt-2 text-2xl font-black brand-font text-[#0f2441] dark:text-white">What happens while you wait</h2>
                    </div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50 px-4 py-2 text-sm font-semibold text-amber-700 dark:border-amber-500/20 dark:bg-amber-500/10 dark:text-amber-200">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        Approval queue
                    </div>
                </div>

                <div class="mt-8 grid gap-4 md:grid-cols-3">
                    <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-800 dark:bg-white/5">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#0D47A1]/10 text-[#0D47A1] dark:bg-[#0D47A1]/20 dark:text-blue-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-bold brand-font text-[#0f2441] dark:text-white">1. Application Review</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">We verify your registration details and confirm your account meets the onboarding requirements.</p>
                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-800 dark:bg-white/5">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#1FA463]/10 text-[#1FA463] dark:bg-[#1FA463]/20 dark:text-green-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-bold brand-font text-[#0f2441] dark:text-white">2. Approval Decision</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">Once approved, your portal permissions are activated and your agent tools become available immediately.</p>
                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-800 dark:bg-white/5">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-amber-500/10 text-amber-600 dark:bg-amber-500/20 dark:text-amber-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-bold brand-font text-[#0f2441] dark:text-white">3. Email Update</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">You will receive an email update so you know exactly when your account is ready for full dashboard access.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[28px] border border-gray-200 bg-white p-6 sm:p-7 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                <p class="text-xs font-bold uppercase tracking-[0.24em] text-[#1FA463]">Support</p>
                <h2 class="mt-2 text-2xl font-black brand-font text-[#0f2441] dark:text-white">Need help sooner?</h2>
                <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    If you need help with your application details or want to confirm your onboarding status, our team is available to assist you.
                </p>

                <div class="mt-6 space-y-4">
                    <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-800 dark:bg-white/5">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 dark:text-white/40">Portal Status</p>
                        <p class="mt-2 text-lg font-bold text-[#0f2441] dark:text-white">Waiting for approval</p>
                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-800 dark:bg-white/5">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 dark:text-white/40">Support Email</p>
                        <a href="mailto:info@onscholarship.com" class="mt-2 inline-flex text-sm font-semibold text-[#0D47A1] hover:underline dark:text-blue-300">
                            info@onscholarship.com
                        </a>
                    </div>
                </div>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center justify-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition hover:opacity-95"
                       style="background: linear-gradient(135deg, #0D47A1 0%, #1FA463 100%); box-shadow: 0 14px 30px rgba(13,71,161,.22);">
                        Return to Homepage
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="inline-flex w-full sm:w-auto items-center justify-center rounded-2xl border border-gray-200 px-5 py-3 text-sm font-bold text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-white/5">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.agent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hainan\resources\views/agent/pending.blade.php ENDPATH**/ ?>