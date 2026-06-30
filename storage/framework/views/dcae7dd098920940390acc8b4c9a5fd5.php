

<?php $__env->startSection('title', 'About Us'); ?>
<?php $__env->startSection('meta_description', 'Learn about Onscholarship, the premier educational consulting firm connecting African students with top universities in China.'); ?>
<?php $__env->startSection('meta_keywords', 'Onscholarship, About Us, Study in China, Educational Consulting'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @keyframes aboutGlow {

        0%,
        100% {
            transform: translateY(0);
            opacity: .45;
        }

        50% {
            transform: translateY(-10px);
            opacity: .7;
        }
    }

    .about-glow {
        animation: aboutGlow 7s ease-in-out infinite;
    }
</style>

<div class="pt-28 bg-white dark:bg-gray-900">
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0D1F3C] via-[#0b1730] to-[#0f172a]"></div>
        <div class="absolute -top-24 -right-24 w-[520px] h-[520px] rounded-full blur-[110px] about-glow" style="background: radial-gradient(circle at 30% 30%, rgba(13,71,161,.55), transparent 60%);"></div>
        <div class="absolute -bottom-40 -left-40 w-[620px] h-[620px] rounded-full blur-[120px] about-glow" style="background: radial-gradient(circle at 40% 40%, rgba(31,164,99,.45), transparent 60%); animation-delay: 1.5s;"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-16 md:pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-white/80 text-xs font-bold tracking-wide uppercase">
                        <span class="w-1.5 h-1.5 rounded-full" style="background:#1FA463;"></span>
                        About Us
                    </div>
                    <h1 class="mt-5 text-4xl sm:text-5xl lg:text-6xl font-black brand-font text-white leading-[1.05]">
                        Connecting Africa to
                        <span class="text-white">Quality Education</span>
                        <span class="block" style="color:#1FA463;">in China</span>
                    </h1>
                    <p class="mt-6 text-base sm:text-lg text-white/70 leading-relaxed max-w-xl">
                        Onscholarship Education Company Limited bridges students, agents, and top Chinese universities with a transparent process, strong guidance, and reliable support from application to departure.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="<?php echo e(route('universities.index')); ?>"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-white transition shadow-lg"
                            style="background:#1FA463; box-shadow: 0 12px 26px rgba(31,164,99,.22);">
                            Explore Universities
                        </a>
                        <a href="<?php echo e(route('contact')); ?>"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-white/90 border border-white/15 bg-white/5 hover:bg-white/10 transition">
                            Talk to Us
                        </a>
                    </div>

                    <div class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-xl" data-aos="fade-up" data-aos-delay="120">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-2xl font-black text-white brand-font">100+</div>
                            <div class="text-xs font-semibold text-white/70 mt-1">Students Guided</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-2xl font-black text-white brand-font">50+</div>
                            <div class="text-xs font-semibold text-white/70 mt-1">Partner Schools</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-2xl font-black text-white brand-font">24/7</div>
                            <div class="text-xs font-semibold text-white/70 mt-1">Support</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-2xl font-black text-white brand-font">4</div>
                            <div class="text-xs font-semibold text-white/70 mt-1">Simple Steps</div>
                        </div>
                    </div>
                </div>

                <div class="relative" data-aos="fade-left" data-aos-delay="150">
                    <div class="absolute -inset-4 rounded-3xl blur-xl opacity-40" style="background: linear-gradient(135deg, rgba(13,71,161,.55), rgba(31,164,99,.45));"></div>
                    <div class="relative rounded-3xl overflow-hidden border border-white/10 shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent"></div>
                        <img src="<?php echo e(asset('images/hero_students.jpg')); ?>"
                            alt="Students celebrating graduation"
                            class="w-full h-[360px] sm:h-[420px] object-cover">
                        <div class="absolute left-5 bottom-5 right-5">
                            <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
                                <div class="text-white">
                                    <div class="text-sm font-bold uppercase tracking-widest text-white/70">Trusted Guidance</div>
                                    <div class="text-xl sm:text-2xl font-black brand-font">Admission & Scholarship Support</div>
                                </div>
                                <div class="inline-flex items-center gap-2 rounded-2xl border border-white/10 bg-white/10 px-4 py-3 backdrop-blur">
                                    <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background: rgba(31,164,99,.18); color:#1FA463;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 11c0 3.866-3.134 7-7 7m14 0c-3.866 0-7-3.134-7-7m0 0c0-3.866 3.134-7 7-7m-14 0c3.866 0 7 3.134 7 7z" />
                                        </svg>
                                    </div>
                                    <div class="leading-tight">
                                        <div class="text-sm font-black text-white">Global Network</div>
                                        <div class="text-xs font-semibold text-white/70">Universities & Agents</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-20 bg-white dark:bg-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-40 -right-24 w-[520px] h-[520px] rounded-full blur-[110px]" style="background: radial-gradient(circle at 30% 30%, rgba(13,71,161,.12), transparent 60%);"></div>
            <div class="absolute -bottom-56 -left-28 w-[680px] h-[680px] rounded-full blur-[120px]" style="background: radial-gradient(circle at 40% 40%, rgba(31,164,99,.10), transparent 60%);"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
                <div data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-gray-200/70 dark:border-white/10 bg-white/70 dark:bg-white/5 text-xs font-black uppercase tracking-widest text-gray-700 dark:text-white/80">
                        <span class="w-1.5 h-1.5 rounded-full" style="background:#0D47A1;"></span>
                        Our Principles
                    </div>
                    <h2 class="mt-5 text-3xl md:text-4xl font-black brand-font text-[#0f2441] dark:text-white">
                        What We Stand For
                    </h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed">
                        We deliver a guided experience that is clear, professional, and student-first. Our goal is to make studying in China feel simple, safe, and achievable.
                    </p>
                </div>

                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="group relative overflow-hidden rounded-3xl border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="50">
                        <div class="absolute inset-x-0 top-0 h-1" style="background: linear-gradient(90deg, #0D47A1, rgba(13,71,161,.15));"></div>
                        <div class="absolute -right-16 -top-20 w-48 h-48 rounded-full blur-2xl opacity-60" style="background: radial-gradient(circle, rgba(13,71,161,.18), transparent 65%);"></div>
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(13,71,161,.12); color:#0D47A1;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8c-1.657 0-3 1.343-3 3v1h6v-1c0-1.657-1.343-3-3-3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 12h14v7a2 2 0 01-2 2H7a2 2 0 01-2-2v-7z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12V9a3 3 0 016 0v3" />
                            </svg>
                        </div>
                        <div class="text-lg font-black brand-font text-[#0f2441] dark:text-white">Transparency</div>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Clear requirements, clear timelines, and honest guidance from start to finish.
                        </p>
                        <div class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-500 dark:text-white/60">
                            <span class="w-8 h-0.5 rounded" style="background: rgba(13,71,161,.35);"></span>
                            Clear Process
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-3xl border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="absolute inset-x-0 top-0 h-1" style="background: linear-gradient(90deg, #1FA463, rgba(31,164,99,.15));"></div>
                        <div class="absolute -right-16 -top-20 w-48 h-48 rounded-full blur-2xl opacity-60" style="background: radial-gradient(circle, rgba(31,164,99,.18), transparent 65%);"></div>
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(31,164,99,.12); color:#1FA463;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M16 7a4 4 0 10-8 0v3H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2v-6a2 2 0 00-2-2h-2V7z" />
                            </svg>
                        </div>
                        <div class="text-lg font-black brand-font text-[#0f2441] dark:text-white">Support</div>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            A responsive team that guides you through every stage, including visa and departure.
                        </p>
                        <div class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-500 dark:text-white/60">
                            <span class="w-8 h-0.5 rounded" style="background: rgba(31,164,99,.35);"></span>
                            Real Guidance
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-3xl border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="150">
                        <div class="absolute inset-x-0 top-0 h-1" style="background: linear-gradient(90deg, #f15a24, rgba(241,90,36,.15));"></div>
                        <div class="absolute -right-16 -top-20 w-48 h-48 rounded-full blur-2xl opacity-60" style="background: radial-gradient(circle, rgba(241,90,36,.16), transparent 65%);"></div>
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(241,90,36,.12); color:#f15a24;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 6v6l4 2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-lg font-black brand-font text-[#0f2441] dark:text-white">Speed</div>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Organized processing and follow-up so your application keeps moving forward.
                        </p>
                        <div class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-500 dark:text-white/60">
                            <span class="w-8 h-0.5 rounded" style="background: rgba(241,90,36,.35);"></span>
                            Fast Updates
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-14 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="group relative overflow-hidden rounded-3xl border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-right">
                    <div class="absolute inset-x-0 top-0 h-1" style="background: linear-gradient(90deg, #0D47A1, rgba(13,71,161,.15));"></div>
                    <div class="absolute -right-16 -top-20 w-48 h-48 rounded-full blur-2xl opacity-60" style="background: radial-gradient(circle, rgba(13,71,161,.18), transparent 65%);"></div>
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(13,71,161,.12); color:#0D47A1;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                        </svg>
                    </div>
                    <div class="text-xs font-black uppercase tracking-widest" style="color:#0D47A1;">Mission</div>
                    <div class="mt-2 text-lg sm:text-xl font-black brand-font text-[#0f2441] dark:text-white">Student-first outcomes</div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Empower African students with global opportunities by providing seamless access to quality, affordable, and transformative education in China.
                    </p>
                    <div class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-500 dark:text-white/60">
                        <span class="w-8 h-0.5 rounded" style="background: rgba(13,71,161,.35);"></span>
                        Student Focus
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-3xl border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="80">
                    <div class="absolute inset-x-0 top-0 h-1" style="background: linear-gradient(90deg, #1FA463, rgba(31,164,99,.15));"></div>
                    <div class="absolute -right-16 -top-20 w-48 h-48 rounded-full blur-2xl opacity-60" style="background: radial-gradient(circle, rgba(31,164,99,.18), transparent 65%);"></div>
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(31,164,99,.12); color:#1FA463;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 2l3 7h7l-5.5 4 2.5 9-7-5-7 5 2.5-9L2 9h7l3-7z" />
                        </svg>
                    </div>
                    <div class="text-xs font-black uppercase tracking-widest" style="color:#1FA463;">Vision</div>
                    <div class="mt-2 text-lg sm:text-xl font-black brand-font text-[#0f2441] dark:text-white">A clear path to China</div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Build a trusted bridge between Africa and China where students can confidently access world-class universities and scholarships.
                    </p>
                    <div class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-500 dark:text-white/60">
                        <span class="w-8 h-0.5 rounded" style="background: rgba(31,164,99,.35);"></span>
                        Trusted Bridge
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-3xl border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-left" data-aos-delay="140">
                    <div class="absolute inset-x-0 top-0 h-1" style="background: linear-gradient(90deg, #f15a24, rgba(241,90,36,.15));"></div>
                    <div class="absolute -right-16 -top-20 w-48 h-48 rounded-full blur-2xl opacity-60" style="background: radial-gradient(circle, rgba(241,90,36,.16), transparent 65%);"></div>
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(241,90,36,.12); color:#f15a24;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 2l8 4v6c0 5-3.5 9.4-8 10-4.5-.6-8-5-8-10V6l8-4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4" />
                        </svg>
                    </div>
                    <div class="text-xs font-black uppercase tracking-widest" style="color:#f15a24;">Values</div>
                    <div class="mt-2 text-lg sm:text-xl font-black brand-font text-[#0f2441] dark:text-white">Trust, clarity, results</div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Professionalism, transparency, and consistent support — the three things that make the journey easier for every student.
                    </p>
                    <div class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-500 dark:text-white/60">
                        <span class="w-8 h-0.5 rounded" style="background: rgba(241,90,36,.35);"></span>
                        Trust & Clarity
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-20 bg-gray-50 dark:bg-[#0b1120] border-t border-gray-100 dark:border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-8">
                <div data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-black brand-font text-[#0f2441] dark:text-white">How We Work</h2>
                    <p class="mt-3 text-gray-600 dark:text-gray-400 max-w-2xl leading-relaxed">
                        A structured approach designed to reduce delays and make each step predictable.
                    </p>
                </div>
                <a href="<?php echo e(route('register')); ?>" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-white transition shadow-lg"
                    style="background:#0D47A1; box-shadow: 0 12px 26px rgba(13,71,161,.22);" data-aos="fade-left">
                    Start Your Application
                </a>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="rounded-3xl bg-white dark:bg-white/5 border border-gray-100 dark:border-white/10 p-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center" style="background: rgba(31,164,99,.12); color:#1FA463;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2" />
                                <circle cx="9" cy="7" r="4" stroke-width="2.2" />
                            </svg>
                        </div>
                        <div class="text-4xl font-black brand-font text-gray-200/80 dark:text-white/15">01</div>
                    </div>
                    <div class="mt-5 text-lg font-black brand-font text-[#0f2441] dark:text-white">Create Profile</div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Register as a student or agent and upload the required academic documents.</p>
                </div>

                <div class="rounded-3xl bg-white dark:bg-white/5 border border-gray-100 dark:border-white/10 p-6" data-aos="fade-up" data-aos-delay="60">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center" style="background: rgba(13,71,161,.12); color:#0D47A1;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div class="text-4xl font-black brand-font text-gray-200/80 dark:text-white/15">02</div>
                    </div>
                    <div class="mt-5 text-lg font-black brand-font text-[#0f2441] dark:text-white">Select Program</div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Browse programs and apply for a university and major that fits your goals.</p>
                </div>

                <div class="rounded-3xl bg-white dark:bg-white/5 border border-gray-100 dark:border-white/10 p-6" data-aos="fade-up" data-aos-delay="120">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center" style="background: rgba(241,90,36,.12); color:#f15a24;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="text-4xl font-black brand-font text-gray-200/80 dark:text-white/15">03</div>
                    </div>
                    <div class="mt-5 text-lg font-black brand-font text-[#0f2441] dark:text-white">Processing</div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">We handle the application follow-up and scholarship placement on your behalf.</p>
                </div>

                <div class="rounded-3xl bg-white dark:bg-white/5 border border-gray-100 dark:border-white/10 p-6" data-aos="fade-up" data-aos-delay="180">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center" style="background: rgba(31,164,99,.12); color:#1FA463;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-4xl font-black brand-font text-gray-200/80 dark:text-white/15">04</div>
                    </div>
                    <div class="mt-5 text-lg font-black brand-font text-[#0f2441] dark:text-white">Visa & Departure</div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Receive JW202, secure your student visa, and prepare for departure.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-20 bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-32 -right-28 w-[520px] h-[520px] rounded-full blur-[110px]" style="background: radial-gradient(circle at 30% 30%, rgba(13,71,161,.10), transparent 60%);"></div>
            <div class="absolute -bottom-40 -left-36 w-[640px] h-[640px] rounded-full blur-[120px]" style="background: radial-gradient(circle at 40% 40%, rgba(31,164,99,.09), transparent 60%);"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-black brand-font text-[#0f2441] dark:text-white">Frequently Asked</h2>
                    <p class="mt-3 text-gray-600 dark:text-gray-400 leading-relaxed max-w-xl">
                        Quick answers to common questions about studying in China with Onscholarship.
                    </p>

                    <div class="mt-8 space-y-4">
                        <details class="group rounded-3xl overflow-hidden border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 shadow-sm hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="0">
                            <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(31,164,99,.12); color:#1FA463;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        </svg>
                                    </span>
                                    <span class="font-black brand-font text-[#0f2441] dark:text-white">Do you help with scholarships?</span>
                                </div>
                                <span class="w-10 h-10 rounded-2xl flex items-center justify-center border border-gray-200/70 dark:border-white/10 bg-gray-50 dark:bg-white/5 text-gray-600 dark:text-gray-200 group-open:rotate-45 transition duration-300">+</span>
                            </summary>
                            <div class="px-6 pb-6 -mt-1">
                                <div class="h-px bg-gray-100 dark:bg-white/10 mb-4"></div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                    Yes. We assist with scholarship placement opportunities where available and guide you through requirements and timelines.
                                </p>
                            </div>
                        </details>

                        <details class="group rounded-3xl overflow-hidden border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 shadow-sm hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="60">
                            <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(13,71,161,.12); color:#0D47A1;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="font-black brand-font text-[#0f2441] dark:text-white">What documents do I need?</span>
                                </div>
                                <span class="w-10 h-10 rounded-2xl flex items-center justify-center border border-gray-200/70 dark:border-white/10 bg-gray-50 dark:bg-white/5 text-gray-600 dark:text-gray-200 group-open:rotate-45 transition duration-300">+</span>
                            </summary>
                            <div class="px-6 pb-6 -mt-1">
                                <div class="h-px bg-gray-100 dark:bg-white/10 mb-4"></div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                    Typically transcripts, passport, medical form, and other academic documents. The exact list depends on the program and level.
                                </p>
                            </div>
                        </details>

                        <details class="group rounded-3xl overflow-hidden border border-gray-100 dark:border-white/10 bg-white dark:bg-white/5 shadow-sm hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="120">
                            <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(241,90,36,.12); color:#f15a24;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 3l8 4v6c0 5-3.5 9.4-8 10-4.5-.6-8-5-8-10V7l8-4z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4" />
                                        </svg>
                                    </span>
                                    <span class="font-black brand-font text-[#0f2441] dark:text-white">Do you assist with visas?</span>
                                </div>
                                <span class="w-10 h-10 rounded-2xl flex items-center justify-center border border-gray-200/70 dark:border-white/10 bg-gray-50 dark:bg-white/5 text-gray-600 dark:text-gray-200 group-open:rotate-45 transition duration-300">+</span>
                            </summary>
                            <div class="px-6 pb-6 -mt-1">
                                <div class="h-px bg-gray-100 dark:bg-white/10 mb-4"></div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                    Yes. After admission documents are ready, we guide you through visa steps and departure preparation.
                                </p>
                            </div>
                        </details>
                    </div>
                </div>

                <div class="relative" data-aos="fade-left" data-aos-delay="120">
                    <div class="absolute -inset-3 rounded-3xl blur-xl opacity-35" style="background: linear-gradient(135deg, rgba(13,71,161,.55), rgba(31,164,99,.45));"></div>
                    <div class="relative rounded-3xl border border-gray-100 dark:border-white/10 bg-[#0f172a] overflow-hidden shadow-2xl">
                        <div class="p-8 md:p-10">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-white/75 text-xs font-bold tracking-wide uppercase">
                                <span class="w-1.5 h-1.5 rounded-full" style="background:#0D47A1;"></span>
                                Ready to start?
                            </div>
                            <h3 class="mt-5 text-2xl md:text-3xl font-black brand-font text-white leading-tight">
                                Let’s build your study plan together.
                            </h3>
                            <p class="mt-4 text-white/70 leading-relaxed">
                                Share your preferred program and timeline, and we’ll guide you through the best options.
                            </p>

                            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a href="<?php echo e(route('programs.index')); ?>" class="rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition p-5">
                                    <div class="font-black text-white brand-font">Browse Programs</div>
                                    <div class="mt-1 text-sm text-white/70">Find your best match</div>
                                </a>
                                <a href="<?php echo e(route('contact')); ?>" class="rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition p-5">
                                    <div class="font-black text-white brand-font">Contact Support</div>
                                    <div class="mt-1 text-sm text-white/70">Fast response</div>
                                </a>
                            </div>
                        </div>

                        <div class="h-2" style="background: linear-gradient(90deg, #1FA463, #0D47A1);"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hainan\resources\views/pages/about.blade.php ENDPATH**/ ?>