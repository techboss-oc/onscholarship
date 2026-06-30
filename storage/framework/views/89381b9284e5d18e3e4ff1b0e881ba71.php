<?php $__env->startSection('content'); ?>


<style>
    @keyframes heroFloat {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes heroFloatSm {

        0%,
        100% {
            transform: translateY(0px) rotate(-15deg);
        }

        50% {
            transform: translateY(-7px) rotate(-15deg);
        }
    }

    @keyframes heroFloatAlt {

        0%,
        100% {
            transform: translateY(0px) rotate(-25deg);
        }

        50% {
            transform: translateY(-6px) rotate(-25deg);
        }
    }

    @keyframes heroFloatImg {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    @keyframes heroFloatCardOffset {

        0%,
        100% {
            transform: translateX(8px) translateY(0px);
        }

        50% {
            transform: translateX(8px) translateY(-9px);
        }
    }

    @keyframes heroPulseGlow {

        0%,
        100% {
            box-shadow: 0 8px 24px rgba(13, 71, 161, 0.28), 0 0 0 0 rgba(13, 71, 161, 0.15);
        }

        50% {
            box-shadow: 0 12px 32px rgba(13, 71, 161, 0.40), 0 0 0 8px rgba(13, 71, 161, 0);
        }
    }

    @keyframes heroGreenPulse {

        0%,
        100% {
            box-shadow: 0 8px 24px rgba(31, 164, 99, 0.28), 0 0 0 0 rgba(31, 164, 99, 0.15);
        }

        50% {
            box-shadow: 0 12px 32px rgba(31, 164, 99, 0.40), 0 0 0 8px rgba(31, 164, 99, 0);
        }
    }

    .hero-float-1 {
        animation: heroFloat 4s ease-in-out infinite;
    }

    .hero-float-2 {
        animation: heroFloat 5s ease-in-out infinite 0.8s;
    }

    .hero-float-3 {
        animation: heroFloat 4.5s ease-in-out infinite 1.6s;
    }

    .hero-float-4 {
        animation: heroFloat 6s ease-in-out infinite 0.4s;
    }

    .hero-float-img {
        animation: heroFloatImg 5.5s ease-in-out infinite 0.3s;
    }

    .hero-float-card-mid {
        animation: heroFloatCardOffset 5s ease-in-out infinite 1.2s;
    }

    .hero-float-shape-lg {
        animation: heroFloat 6s ease-in-out infinite 0.6s;
    }

    .hero-float-shape-sm {
        animation: heroFloatAlt 4s ease-in-out infinite 1.5s;
    }

    .hero-btn-blue {
        animation: heroPulseGlow 3s ease-in-out infinite;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .hero-btn-blue:hover {
        transform: scale(1.05) translateY(-2px) !important;
    }

    .hero-btn-green {
        animation: heroGreenPulse 3.5s ease-in-out infinite 0.5s;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .hero-btn-green:hover {
        transform: scale(1.05) translateY(-2px) !important;
    }
</style>


<section class="relative overflow-hidden min-h-[80vh] flex flex-col justify-start pt-28 sm:pt-32 md:pt-36 lg:pt-40" style="background:#0f172a;">

    
    <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at top right, rgba(13,71,161,0.15) 0%, transparent 50%), radial-gradient(circle at bottom left, rgba(31,164,99,0.1) 0%, transparent 40%); z-index: 0;"></div>



    
    <div class="absolute pointer-events-none select-none w-full h-full" style="z-index: 2;">
        
        <div class="absolute" style="top: 50%; left: 35%; width: 50px; height: 50px; background: linear-gradient(135deg, #1fa463 0%, #115033 100%); border-radius: 12px; transform: rotate(20deg); filter: blur(0.5px); opacity: 0;"></div>
        
        <div class="absolute hero-float-shape-sm" style="bottom: 15%; left: 33%; width: 70px; height: 45px; background: linear-gradient(135deg, #4da6ff, #0073e6); border-radius: 12px; opacity: 0.8; box-shadow: 0 10px 20px rgba(0,115,230,0.3);"></div>
        
        <div class="absolute hero-float-shape-lg" style="bottom: 25%; left: 42%; width: 140px; height: 140px; background: linear-gradient(135deg, #4da6ff, #0059b3); border-radius: 24px; opacity: 0.9; box-shadow: 0 15px 30px rgba(0,89,179,0.4);"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

            
            <div data-aos="fade-right">
                <h1 class="font-extrabold leading-tight tracking-tight mb-5 brand-font" style="font-size: clamp(2.2rem, 3.5vw, 3rem); line-height: 1.2;">
                    <span class="text-white" style="display: block;">Connecting Africa</span>
                    <span style="color: #1FA463; display: block;">to Quality Education</span>
                    <span class="text-white" style="display: block;">in China</span>
                </h1>
                <p class="mb-8 font-medium leading-relaxed text-gray-400" style="font-size: 1.05rem; max-width: 400px;">
                    Scholarships, Low Tuition, World-Class Universities,<br>and Expert Admission Support.
                </p>

                
                <div class="mb-10 max-w-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative bg-white/10 backdrop-blur-xl rounded-2xl p-1.5 border border-white/20 shadow-[0_15px_40px_rgba(0,0,0,0.4)]">
                        <!-- Subtle glow effect -->
                        <div class="absolute inset-0 rounded-2xl pointer-events-none" style="background: radial-gradient(circle at 0% 0%, rgba(31,164,99,0.15) 0%, transparent 50%), radial-gradient(circle at 100% 100%, rgba(13,71,161,0.15) 0%, transparent 50%);"></div>

                        <div class="relative flex flex-col sm:flex-row items-center gap-1.5">

                            
                            <div class="relative flex items-center gap-2 bg-white/10 border border-white/20 rounded-xl px-3 py-2.5 focus-within:border-[#4da6ff]/60 focus-within:bg-white/15 transition-all duration-300 w-full sm:w-auto">
                                <svg class="w-4 h-4 text-blue-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                <select class="bg-transparent border-none text-white text-xs font-semibold focus:ring-0 cursor-pointer outline-none appearance-none pr-7 w-full sm:w-28">
                                    <option value="course" class="bg-[#0f172a]">Courses</option>
                                    <option value="scholarship" class="bg-[#0f172a]">Scholarships</option>
                                    <option value="university" class="bg-[#0f172a]">Universities</option>
                                </select>
                                <svg class="absolute right-2.5 w-3.5 h-3.5 text-blue-300 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            
                            <div class="flex-1 flex items-center gap-2 bg-white/5 border border-white/10 rounded-xl focus-within:border-[#34d399]/60 focus-within:bg-white/10 transition-all duration-300 px-4 py-2.5 w-full">
                                <svg class="h-4 w-4 text-green-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input type="text"
                                    placeholder="Search for universities, scholarships, or programs..."
                                    class="block w-full bg-transparent border-none text-white placeholder-gray-300 focus:ring-0 text-sm font-medium outline-none">
                            </div>

                            
                            <button class="flex items-center justify-center gap-1.5 px-5 py-2.5 rounded-xl font-bold text-xs text-white uppercase tracking-wide transition-all duration-300 transform hover:scale-105 hover:shadow-2xl focus:outline-none w-full sm:w-auto"
                                style="background: linear-gradient(135deg, #1FA463 0%, #13824b 100%); box-shadow: 0 8px 25px rgba(31,164,99,0.4);">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <span>Search</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="#universities"
                        class="hero-btn-blue inline-flex items-center justify-center font-bold text-white rounded-xl"
                        style="padding: 14px 28px; background-color: #0D47A1; font-size: 0.95rem; box-shadow: 0 8px 24px rgba(13,71,161,0.28);">
                        Explore Universities
                    </a>
                    <a href="<?php echo e(route('register')); ?>"
                        class="hero-btn-green inline-flex items-center justify-center font-bold text-white rounded-xl"
                        style="padding: 14px 28px; background-color: #1FA463; font-size: 0.95rem; box-shadow: 0 8px 24px rgba(31,164,99,0.28);">
                        Apply Now
                    </a>
                </div>
            </div>

            
            <div class="relative flex items-center justify-center lg:justify-end mt-10 lg:mt-0" style="height: 520px;" data-aos="fade-left" data-aos-delay="100">

                
                <div class="absolute" style="left: -10%; top: -10%; width: 100%; height: 110%; background: linear-gradient(135deg, rgba(13,71,161,0.3), rgba(13,71,161,0.1)); border-radius: 150px 30px 150px 30px; z-index: 0; filter: blur(3px);"></div>

                
                <div class="absolute" style="right: -10px; top: -5%; width: 55%; height: 105%; background: linear-gradient(145deg, #1FA463, #13824b); border-radius: 80px 20px 80px 20px; z-index: 5;"></div>

                
                <div class="absolute z-10 hero-float-img" style="right: 32%; bottom: 5%; width: 55%; height: 90%;">
                    <div class="w-full h-full overflow-hidden shadow-2xl" style="border-radius: 140px 16px 140px 16px; background-color: #1e293b;">
                        <img src="<?php echo e(asset('images/hero_students.jpg')); ?>"
                            alt="Students celebrating graduation with flags"
                            class="w-full h-full object-cover object-center"
                            style="filter: contrast(1.05) saturate(1.1);">
                    </div>
                </div>

                

                
                <div class="absolute z-20 flex flex-col gap-4" style="right: 15px; top: 8%; width: 170px;">

                    
                    <div class="hero-float-1 rounded-3xl flex flex-col items-center text-center shadow-lg" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); padding: 18px 12px;">
                        <div class="flex-shrink-0 mb-2">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="font-black brand-font text-white" style="font-size:1.3rem; line-height:1;">100+</div>
                        <div style="font-size:0.6rem; color:rgba(255,255,255,0.9); font-weight:600; white-space:nowrap;">Partner Universities</div>
                    </div>

                    
                    <div class="hero-float-card-mid rounded-3xl flex flex-col items-center text-center shadow-lg" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); padding: 18px 12px;">
                        <div class="flex-shrink-0 mb-2">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </div>
                        <div class="font-black brand-font text-white" style="font-size:1.3rem; line-height:1;">1000+</div>
                        <div style="font-size:0.6rem; color:rgba(255,255,255,0.9); font-weight:600; white-space:nowrap;">Scholarship Opportunities</div>
                    </div>

                    
                    <div class="hero-float-3 rounded-3xl flex flex-col items-center text-center shadow-lg" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); padding: 18px 12px;">
                        <div class="flex-shrink-0 mb-2">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="font-black brand-font text-white" style="font-size:1.3rem; line-height:1;">15+</div>
                        <div style="font-size:0.6rem; color:rgba(255,255,255,0.9); font-weight:600;">African Countries</div>
                    </div>

                </div>

                
                <div class="hero-float-4 absolute z-20 rounded-3xl flex flex-col items-center justify-center text-center shadow-xl" style="bottom: 2%; left: 10%; background: rgba(255,255,255,0.15); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.25); padding: 15px 25px; min-width: 130px; border-radius: 20px;">
                    <div class="mb-2">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-black brand-font text-white" style="font-size:1.3rem; line-height:1; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">5000+</div>
                        <div style="font-size:0.6rem; color:rgba(255,255,255,0.95); font-weight:700;">Students Assisted</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="bg-white dark:bg-[#0f172a] py-2 pb-10 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 -mt-2">

            
            <a href="<?php echo e(route('universities.index')); ?>" class="block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: rgba(13,71,161,0.08);">
                    <svg class="w-6 h-6" style="color:#0D47A1;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0z" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white brand-font mb-1" style="font-size:1rem;">Top Universities</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Explore 100+ partner universities in China.</p>
                <span class="text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all" style="color:#1FA463;">
                    Explore
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </a>

            
            <a href="<?php echo e(route('scholarships.index')); ?>" class="block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: rgba(13,71,161,0.08);">
                    <svg class="w-6 h-6" style="color:#0D47A1;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white brand-font mb-1" style="font-size:1rem;">Scholarships</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Find fully funded and partial scholarships.</p>
                <span class="text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all" style="color:#1FA463;">
                    Explore
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </a>

            
            <a href="<?php echo e(route('services')); ?>" class="block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: rgba(13,71,161,0.08);">
                    <svg class="w-6 h-6" style="color:#0D47A1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white brand-font mb-1" style="font-size:1rem;">Low Tuition</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Quality education affordable for all.</p>
                <span class="text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all" style="color:#1FA463;">
                    Explore
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </a>

            
            <a href="<?php echo e(route('services')); ?>" class="block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-md border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: rgba(13,71,161,0.08);">
                    <svg class="w-6 h-6" style="color:#0D47A1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white brand-font mb-1" style="font-size:1rem;">Visa Support</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Professional visa guidance &amp; support.</p>
                <span class="text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all" style="color:#1FA463;">
                    Explore
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </a>

        </div>
    </div>
</section>


<section class="py-20 bg-gray-50 dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <p class="text-xs font-bold tracking-widest uppercase mb-2" style="color:#1FA463;">Global Opportunities</p>
                <h3 class="text-3xl md:text-4xl font-extrabold brand-font text-gray-900 dark:text-white mb-6">Why Study in China?</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-8 leading-relaxed">China has become one of the top destinations for international students, offering world-class universities, unparalleled infrastructure, and a rich cultural heritage. Experience rapid technological advancement and affordable living costs while building a global network.</p>
                <div class="space-y-4">
                    <?php $__currentLoopData = [['Affordable Education', 'Lower tuition fees and numerous scholarship opportunities compared to Western countries.'],['Top Ranked Universities', 'Get a recognized degree from institutions leading in global rankings and research.'],['Cultural Diversity', 'Join a vibrant community of international students and experience a diverse, dynamic culture.']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-gray-800 flex items-center justify-center flex-shrink-0" style="color:#0D47A1;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h5 class="font-bold text-gray-900 dark:text-white"><?php echo e($benefit[0]); ?></h5>
                            <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($benefit[1]); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="absolute inset-0 bg-gradient-to-tr from-[#1FA463] to-[#0D47A1] rounded-3xl transform rotate-3 scale-105 opacity-20 dark:opacity-30"></div>
                <img src="https://images.pexels.com/photos/208738/pexels-photo-208738.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&dpr=1" alt="China Cityscape" class="relative rounded-3xl shadow-xl w-full h-[400px] object-cover">
            </div>
        </div>
    </div>
</section>


<section id="universities" class="bg-white dark:bg-[#0f172a] pt-8 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-6" data-aos="fade-up">
            <h3 class="text-2xl font-extrabold brand-font" style="color:#1a2e55;">Popular Universities</h3>
            <a href="<?php echo e(route('universities.index')); ?>" class="text-sm font-bold flex items-center gap-1 hover:underline" style="color:#1FA463;">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php
            $fallbackUniversities = [
            ['name' => 'Tsinghua University', 'city' => 'Beijing', 'tags' => 'Engineering, Science, Arts', 'img' => 'https://images.pexels.com/photos/2041540/pexels-photo-2041540.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&dpr=1'],
            ['name' => 'Peking University', 'city' => 'Beijing', 'tags' => 'Medicine, Science, Law', 'img' => 'https://images.pexels.com/photos/208745/pexels-photo-208745.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&dpr=1'],
            ['name' => 'Zhejiang University', 'city' => 'Hangzhou', 'tags' => 'Engineering, Business', 'img' => 'https://images.pexels.com/photos/256150/pexels-photo-256150.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&dpr=1'],
            ['name' => 'Fudan University', 'city' => 'Shanghai', 'tags' => 'Management, Arts, Science', 'img' => 'https://images.pexels.com/photos/207692/pexels-photo-207692.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&dpr=1'],
            ];
            $uniIndex = 0;
            ?>

            <?php
            $displayUniversities = $universities->take(4);
            $dbCount = $displayUniversities->count();
            ?>

            <?php $__currentLoopData = $displayUniversities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $fb = $fallbackUniversities[$uniIndex % 4]; $uniIndex++; ?>
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:-translate-y-1 group" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 80); ?>">
                <div class="h-44 overflow-hidden">
                    <?php if($university->cover_image): ?>
                    <img src="<?php echo e(Storage::url($university->cover_image)); ?>" alt="<?php echo e($university->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='<?php echo e($fb['img']); ?>'">
                    <?php else: ?>
                    <img src="<?php echo e($fb['img']); ?>" alt="<?php echo e($university->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg,#dbeafe,#d1fae5)';">
                    <?php endif; ?>
                </div>
                <div class="p-4">
                    <h4 class="font-bold brand-font mb-1 text-gray-900 dark:text-white text-base"><?php echo e($university->name); ?></h4>
                    <p class="text-xs text-gray-500 mb-1 flex items-center gap-1">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <?php echo e($university->city ?? 'China'); ?>, China
                    </p>
                    <p class="text-xs font-semibold mt-2" style="color:#1FA463;"><?php echo e(($university->programs_count ?? 0) > 0 ? $university->programs_count . ' Programs' : $fb['tags']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php for($i = $dbCount; $i < 4; $i++): ?>
                <?php $fb=$fallbackUniversities[$uniIndex % 4]; $uniIndex++; ?>
                <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:-translate-y-1 group" data-aos="fade-up" data-aos-delay="<?php echo e(($i+1) * 80); ?>">
                <div class="h-44 overflow-hidden">
                    <img src="<?php echo e($fb['img']); ?>" alt="<?php echo e($fb['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg,#dbeafe,#d1fae5)';">
                </div>
                <div class="p-4">
                    <h4 class="font-bold brand-font mb-1 text-gray-900 dark:text-white text-base"><?php echo e($fb['name']); ?></h4>
                    <p class="text-xs text-gray-500 mb-1 flex items-center gap-1">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <?php echo e($fb['city']); ?>, China
                    </p>
                    <p class="text-xs font-semibold mt-2" style="color:#1FA463;"><?php echo e($fb['tags']); ?></p>
                </div>
        </div>
        <?php endfor; ?>
    </div>
    </div>
</section>


<section class="py-20 bg-gray-50 dark:bg-[#0b1120] border-t border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-10" data-aos="fade-up">
            <div>
                <p class="text-xs font-bold tracking-widest uppercase mb-2" style="color:#1FA463;">Fund Your Future</p>
                <h3 class="text-3xl font-extrabold brand-font text-gray-900 dark:text-white">Featured Scholarships</h3>
            </div>
            <a href="<?php echo e(route('scholarships.index')); ?>" class="hidden sm:flex text-sm font-bold items-center gap-1 hover:underline" style="color:#0D47A1;">
                View All Scholarships
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php $displayScholarships = $scholarships ?? collect([]); ?>
            <?php $__empty_1 = true; $__currentLoopData = $displayScholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all border border-gray-100 dark:border-gray-800 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                <div class="inline-block px-3 py-1 rounded-full text-xs font-bold mb-4" style="background: rgba(31,164,99,0.1); color:#1FA463;"><?php echo e($scholarship->type ?? 'Featured'); ?></div>
                <h4 class="text-xl font-bold brand-font text-gray-900 dark:text-white mb-2"><?php echo e($scholarship->title); ?></h4>
                <p class="text-sm text-gray-500 mb-4 line-clamp-2"><?php echo e($scholarship->description); ?></p>
                <div class="flex items-center gap-2 text-xs font-semibold text-gray-600 dark:text-gray-300 mb-6">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Deadline: <?php echo e(\Carbon\Carbon::parse($scholarship->deadline)->format('d M, Y')); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php $__currentLoopData = [['CSC Full Scholarship', 'Fully funded including tuition, accommodation, and monthly stipend.','Dec 31, 2026'],['Provincial Scholarship', 'Partial funding covering tuition for academic excellence.','Oct 15, 2026'],['University Grant', 'First-year tuition waiver for international students.','Nov 30, 2026']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fbSchol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all border border-gray-100 dark:border-gray-800 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                <div class="inline-block px-3 py-1 rounded-full text-xs font-bold mb-4" style="background: rgba(31,164,99,0.1); color:#1FA463;">Featured</div>
                <h4 class="text-xl font-bold brand-font text-gray-900 dark:text-white mb-2"><?php echo e($fbSchol[0]); ?></h4>
                <p class="text-sm text-gray-500 mb-4"><?php echo e($fbSchol[1]); ?></p>
                <div class="flex items-center gap-2 text-xs font-semibold text-gray-600 dark:text-gray-300">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Deadline: <?php echo e($fbSchol[2]); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="py-20" style="background:#0f172a;">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <p class="text-xs font-bold tracking-widest uppercase mb-3" style="color:#1FA463;">Simple Process</p>
            <h3 class="text-3xl md:text-4xl font-extrabold text-white brand-font mb-4">Your Admission Journey</h3>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto text-base leading-relaxed">We've simplified the process of securing your education in China down to four easy steps.</p>
        </div>

        <?php
        $timelineSteps = [
        ['1','Create Profile','Register as a student or agent and upload your required academic documents.','#1FA463','
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />'],
        ['2','Select Program','Browse our extensive database of universities and apply for your desired major.','#0D47A1','
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 19 7.5 19s3.332-0.477 4.5-1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 19 16.5 19s-3.332-0.477-4.5-1.253" />'],
        ['3','Processing','Our expert team handles the application and scholarship placement on your behalf.','#1FA463','
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />'],
        ['4','Visa & Departure','Receive your JW202, secure your student visa, and pack your bags for China!','#0D47A1','
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />']
        ];
        ?>

        <div class="relative md:hidden">
            <div class="absolute left-6 top-0 bottom-0 w-0.5" style="background: linear-gradient(180deg, #1FA463 0%, #0D47A1 100%);"></div>

            <?php $__currentLoopData = $timelineSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="relative pl-14 pb-10 last:pb-0" data-aos="fade-up" data-aos-delay="<?php echo e($index * 90); ?>">
                <div class="absolute left-6 -translate-x-1/2 top-1 z-20 w-6 h-6 rounded-full flex items-center justify-center" style="background: <?php echo e($step[3]); ?>; box-shadow: 0 0 0 4px rgba(15,23,42,1), 0 0 0 8px <?php echo e($step[3]); ?>30;">
                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?php echo $step[4]; ?></svg>
                </div>

                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full mb-4" style="background: <?php echo e($step[3]); ?>20; border: 1px solid <?php echo e($step[3]); ?>40;">
                        <span class="text-lg font-black brand-font" style="color: <?php echo e($step[3]); ?>;">0<?php echo e($step[0]); ?></span>
                        <span class="text-xs font-bold text-white/80">STEP</span>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-3 brand-font"><?php echo e($step[1]); ?></h4>
                    <p class="text-gray-400 leading-relaxed text-sm"><?php echo e($step[2]); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="hidden md:block relative">
            <div class="absolute left-10 right-10 top-7 h-px" style="background: linear-gradient(90deg, rgba(31,164,99,.55) 0%, rgba(13,71,161,.55) 100%);"></div>

            <div class="grid grid-cols-4 gap-6">
                <?php $__currentLoopData = $timelineSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                    <div class="absolute left-1/2 -translate-x-1/2 top-3 z-20 w-12 h-12 rounded-2xl flex items-center justify-center" style="background: <?php echo e($step[3]); ?>; box-shadow: 0 0 0 6px rgba(15,23,42,1), 0 10px 30px <?php echo e($step[3]); ?>25;">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?php echo $step[4]; ?></svg>
                    </div>

                    <div class="pt-16 h-full bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:border-white/20 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center justify-between gap-3 mb-4">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full" style="background: <?php echo e($step[3]); ?>14; border: 1px solid <?php echo e($step[3]); ?>33;">
                                <span class="text-base font-black brand-font" style="color: <?php echo e($step[3]); ?>;">0<?php echo e($step[0]); ?></span>
                                <span class="text-[11px] font-bold text-white/80 tracking-widest">STEP</span>
                            </div>
                            <div class="text-[11px] font-bold uppercase tracking-widest text-white/50">Simple</div>
                        </div>
                        <h4 class="text-lg font-extrabold text-white mb-3 brand-font leading-tight"><?php echo e($step[1]); ?></h4>
                        <p class="text-gray-400 leading-relaxed text-sm"><?php echo e($step[2]); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>


<section class="relative overflow-hidden py-20" style="background: linear-gradient(180deg, #08111f 0%, #0f172a 55%, #08111f 100%);">
    <div class="absolute inset-x-0 top-0 h-40 pointer-events-none" style="background: linear-gradient(180deg, rgba(31,164,99,.08), transparent);"></div>
    <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-[620px] h-[260px] rounded-full blur-3xl opacity-40 pointer-events-none" style="background: radial-gradient(circle, rgba(31,164,99,.18), transparent 65%);"></div>
    <div class="absolute bottom-0 right-0 w-[420px] h-[220px] rounded-full blur-3xl opacity-35 pointer-events-none" style="background: radial-gradient(circle, rgba(13,71,161,.18), transparent 65%);"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-14" data-aos="fade-up">
            <p class="text-xs font-bold tracking-[0.28em] uppercase mb-3" style="color:#1FA463;">Success Stories</p>
            <h3 class="text-3xl sm:text-4xl md:text-5xl font-extrabold brand-font text-white leading-tight">Hear from Our Students</h3>
            <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base md:text-lg leading-relaxed text-white/72">
                Inspiring journeys from African students who secured admission, scholarships, and a smooth transition to university life in China.
            </p>
            <div class="mt-6 flex flex-wrap items-center justify-center gap-3 text-xs sm:text-sm">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/6 px-4 py-2 text-white/80">
                    <span class="w-2 h-2 rounded-full" style="background:#1FA463;"></span>
                    Scholarship Guidance
                </span>
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/6 px-4 py-2 text-white/80">
                    <span class="w-2 h-2 rounded-full" style="background:#0D47A1;"></span>
                    Visa Support
                </span>
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/6 px-4 py-2 text-white/80">
                    <span class="w-2 h-2 rounded-full" style="background:#1FA463;"></span>
                    Real Student Results
                </span>
            </div>
        </div>
        <style>
            #testimonial-carousel-track {
                display: flex;
                width: 100%;
                transition: transform 700ms cubic-bezier(.2, .9, .2, 1);
                will-change: transform;
            }

            #testimonial-carousel [data-slide] {
                flex: 0 0 100%;
                width: 100%;
            }

            #testimonial-carousel button:focus {
                outline: none;
                box-shadow: 0 0 0 4px rgba(31, 164, 99, .25);
            }

            @keyframes testimonialProgress {
                from {
                    transform: scaleX(0);
                }

                to {
                    transform: scaleX(1);
                }
            }

            .testimonial-progress-fill {
                transform-origin: left center;
                transform: scaleX(0);
            }
        </style>

        <?php $displayTestimonials = $testimonials ?? collect([]); ?>

        <div id="testimonial-carousel" class="relative max-w-6xl mx-auto" data-aos="fade-up">
            <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-[520px] h-[220px] rounded-full blur-3xl opacity-40 pointer-events-none" style="background: radial-gradient(circle, rgba(31,164,99,.22), transparent 60%);"></div>
            <div class="absolute -bottom-16 left-10 w-[420px] h-[240px] rounded-full blur-3xl opacity-35 pointer-events-none" style="background: radial-gradient(circle, rgba(13,71,161,.22), transparent 60%);"></div>

            <div class="relative overflow-hidden rounded-[32px] border border-white/10 bg-[#0f1b31]/85 backdrop-blur-xl shadow-[0_30px_80px_rgba(2,8,23,.45)]">
                <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(135deg, rgba(31,164,99,.12), rgba(13,71,161,.15));"></div>
                <div class="absolute inset-x-0 top-0 h-px pointer-events-none" style="background: linear-gradient(90deg, transparent, rgba(255,255,255,.55), transparent);"></div>

                <div id="testimonial-carousel-track" aria-live="polite">
                    <?php $__empty_1 = true; $__currentLoopData = $displayTestimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div data-slide class="p-5 sm:p-7 lg:p-10">
                        <div class="grid gap-5 lg:grid-cols-[minmax(0,1.35fr)_minmax(260px,0.65fr)] lg:gap-8">
                            <div class="rounded-[28px] border border-white/10 bg-white/[0.04] p-5 sm:p-7 lg:p-8">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="inline-flex items-center gap-3 self-start rounded-2xl border border-white/10 bg-white/[0.06] px-4 py-3">
                                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(31,164,99,.16); color:#34d399;">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-[11px] font-bold uppercase tracking-[0.26em] text-white/45">Student Voice</div>
                                            <div class="text-sm sm:text-base font-semibold text-white/90">Real admission journey</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 self-start">
                                        <button type="button" data-prev class="w-11 h-11 rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition text-white/80">
                                            <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button type="button" data-next class="w-11 h-11 rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition text-white/80">
                                            <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <p class="text-lg sm:text-[1.35rem] leading-8 sm:leading-9 text-white/92">
                                        “<?php echo $testimonial->content; ?>”
                                    </p>
                                </div>

                                <div class="mt-6 flex flex-wrap items-center gap-3">
                                    <div class="inline-flex items-center gap-1 rounded-full border border-white/10 bg-white/[0.05] px-3 py-2" aria-label="5 star rating">
                                        <?php for($star = 0; $star < 5; $star++): ?>
                                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="#FBBF24" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <?php endfor; ?>
                                            <span class="ml-2 text-xs sm:text-sm font-semibold text-white/80">5.0 Student Rating</span>
                                    </div>
                                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.05] px-3 py-2 text-xs sm:text-sm font-medium text-white/72">
                                        <span class="w-2 h-2 rounded-full" style="background:#1FA463;"></span>
                                        Scholarship Support
                                    </span>
                                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.05] px-3 py-2 text-xs sm:text-sm font-medium text-white/72">
                                        <span class="w-2 h-2 rounded-full" style="background:#0D47A1;"></span>
                                        Admission Guidance
                                    </span>
                                </div>
                            </div>

                            <div class="rounded-[28px] border border-white/10 bg-[linear-gradient(180deg,rgba(255,255,255,0.08),rgba(255,255,255,0.03))] p-5 sm:p-6 lg:p-7">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/6 px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.24em] text-white/60">
                                        Student Profile
                                    </div>
                                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/6 px-3 py-1.5 text-xs font-bold text-white/85">
                                        <span class="w-2 h-2 rounded-full" style="background:#1FA463;"></span>
                                        Verified Student
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center gap-4 min-w-0">
                                    <?php if($testimonial->image): ?>
                                    <img src="<?php echo e(Storage::url($testimonial->image)); ?>" class="w-16 h-16 rounded-full object-cover border-2 border-[#1FA463] shadow-lg" alt="<?php echo e($testimonial->name); ?>">
                                    <?php else: ?>
                                    <div class="w-16 h-16 rounded-full flex items-center justify-center font-black text-xl text-white border-2 border-[#1FA463] shadow-lg" style="background: linear-gradient(135deg, #0D47A1, #1FA463);">
                                        <?php echo e(substr($testimonial->name, 0, 1)); ?>

                                    </div>
                                    <?php endif; ?>
                                    <div class="min-w-0">
                                        <div class="font-black brand-font text-white text-lg leading-tight"><?php echo e($testimonial->name); ?></div>
                                        <div class="mt-1 text-sm text-white/70 leading-relaxed break-words"><?php echo e($testimonial->university ?? 'Student'); ?></div>
                                    </div>
                                </div>

                                <div class="mt-6 space-y-3">
                                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] px-4 py-3">
                                        <div class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/45">Outcome</div>
                                        <div class="mt-1 text-sm text-white/80">Successfully guided from application stage to study placement in China.</div>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] px-4 py-3">
                                        <div class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/45">Why It Matters</div>
                                        <div class="mt-1 text-sm text-white/80">Shows the value of clear support, scholarship advice, and a smoother student journey.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php $__currentLoopData = [['Sarah M.', 'University of Electronic Science', 'Onscholarship made my dream of studying in China a reality. The process was seamless and the scholarship support was incredible!'],['David K.', 'Tsinghua University', 'From the application to visa processing, their team was always there to guide me. I highly recommend their services to any student in Africa.'],['Grace A.', 'Zhejiang University', 'I am so grateful for the opportunity. The resources provided helped me settle quickly in my new university environment!']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fbTest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-slide class="p-5 sm:p-7 lg:p-10">
                        <div class="grid gap-5 lg:grid-cols-[minmax(0,1.35fr)_minmax(260px,0.65fr)] lg:gap-8">
                            <div class="rounded-[28px] border border-white/10 bg-white/[0.04] p-5 sm:p-7 lg:p-8">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="inline-flex items-center gap-3 self-start rounded-2xl border border-white/10 bg-white/[0.06] px-4 py-3">
                                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(31,164,99,.16); color:#34d399;">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-[11px] font-bold uppercase tracking-[0.26em] text-white/45">Student Voice</div>
                                            <div class="text-sm sm:text-base font-semibold text-white/90">Real admission journey</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 self-start">
                                        <button type="button" data-prev class="w-11 h-11 rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition text-white/80">
                                            <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button type="button" data-next class="w-11 h-11 rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 transition text-white/80">
                                            <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <p class="text-lg sm:text-[1.35rem] leading-8 sm:leading-9 text-white/92">
                                        “<?php echo e($fbTest[2]); ?>”
                                    </p>
                                </div>

                                <div class="mt-6 flex flex-wrap items-center gap-3">
                                    <div class="inline-flex items-center gap-1 rounded-full border border-white/10 bg-white/[0.05] px-3 py-2" aria-label="5 star rating">
                                        <?php for($star = 0; $star < 5; $star++): ?>
                                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="#FBBF24" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <?php endfor; ?>
                                            <span class="ml-2 text-xs sm:text-sm font-semibold text-white/80">5.0 Student Rating</span>
                                    </div>
                                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.05] px-3 py-2 text-xs sm:text-sm font-medium text-white/72">
                                        <span class="w-2 h-2 rounded-full" style="background:#1FA463;"></span>
                                        Scholarship Support
                                    </span>
                                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.05] px-3 py-2 text-xs sm:text-sm font-medium text-white/72">
                                        <span class="w-2 h-2 rounded-full" style="background:#0D47A1;"></span>
                                        Admission Guidance
                                    </span>
                                </div>
                            </div>

                            <div class="rounded-[28px] border border-white/10 bg-[linear-gradient(180deg,rgba(255,255,255,0.08),rgba(255,255,255,0.03))] p-5 sm:p-6 lg:p-7">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/6 px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.24em] text-white/60">
                                        Student Profile
                                    </div>
                                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/6 px-3 py-1.5 text-xs font-bold text-white/85">
                                        <span class="w-2 h-2 rounded-full" style="background:#1FA463;"></span>
                                        Verified Student
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center gap-4 min-w-0">
                                    <div class="w-16 h-16 rounded-full flex items-center justify-center font-black text-xl text-white border-2 border-[#1FA463] shadow-lg" style="background: linear-gradient(135deg, #0D47A1, #1FA463);">
                                        <?php echo e(substr($fbTest[0], 0, 1)); ?>

                                    </div>
                                    <div class="min-w-0">
                                        <div class="font-black brand-font text-white text-lg leading-tight"><?php echo e($fbTest[0]); ?></div>
                                        <div class="mt-1 text-sm text-white/70 leading-relaxed break-words"><?php echo e($fbTest[1]); ?></div>
                                    </div>
                                </div>

                                <div class="mt-6 space-y-3">
                                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] px-4 py-3">
                                        <div class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/45">Outcome</div>
                                        <div class="mt-1 text-sm text-white/80">Successfully guided from application stage to study placement in China.</div>
                                    </div>
                                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] px-4 py-3">
                                        <div class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/45">Why It Matters</div>
                                        <div class="mt-1 text-sm text-white/80">Shows the value of clear support, scholarship advice, and a smoother student journey.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-7 flex flex-col items-center gap-4">
                <div class="sm:hidden inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.05] px-4 py-2 text-xs font-medium text-white/70">
                    <svg class="w-4 h-4 text-[#34d399]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7l-5 5 5 5M16 7l5 5-5 5" />
                    </svg>
                    Swipe to explore more student stories
                </div>

                <div class="w-full max-w-md">
                    <div class="h-1.5 w-full overflow-hidden rounded-full bg-white/10">
                        <div class="testimonial-progress-fill h-full rounded-full" data-progress-fill style="background: linear-gradient(90deg, #1FA463 0%, #0D47A1 100%);"></div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-2" data-dots></div>
            </div>
        </div>

        <script>
            (function() {
                const root = document.getElementById('testimonial-carousel');
                if (!root) return;

                const track = document.getElementById('testimonial-carousel-track');
                if (!track) return;

                const slides = Array.from(track.querySelectorAll('[data-slide]'));
                const prevButtons = Array.from(root.querySelectorAll('[data-prev]'));
                const nextButtons = Array.from(root.querySelectorAll('[data-next]'));
                const dotsWrap = root.querySelector('[data-dots]');
                const progressFill = root.querySelector('[data-progress-fill]');
                const AUTOPLAY_MS = 6500;
                let index = 0;
                let autoplayTimer = null;

                function restartProgress() {
                    if (!progressFill) return;
                    progressFill.style.animation = 'none';
                    progressFill.offsetWidth;
                    progressFill.style.animation = `testimonialProgress ${AUTOPLAY_MS}ms linear forwards`;
                    progressFill.style.animationPlayState = 'running';
                }

                function setIndex(nextIndex) {
                    if (!slides.length) return;
                    index = (nextIndex + slides.length) % slides.length;
                    track.style.transform = `translateX(-${index * 100}%)`;
                    if (dotsWrap) {
                        Array.from(dotsWrap.querySelectorAll('button')).forEach((btn, i) => {
                            btn.setAttribute('aria-current', i === index ? 'true' : 'false');
                            btn.style.opacity = i === index ? '1' : '.35';
                            btn.style.transform = i === index ? 'scale(1)' : 'scale(.9)';
                        });
                    }
                }

                function next() {
                    setIndex(index + 1);
                }

                function prev() {
                    setIndex(index - 1);
                }

                prevButtons.forEach((btn) => btn.addEventListener('click', () => {
                    prev();
                    startAutoplay();
                }));
                nextButtons.forEach((btn) => btn.addEventListener('click', () => {
                    next();
                    startAutoplay();
                }));

                if (dotsWrap) {
                    dotsWrap.innerHTML = '';
                    slides.forEach((_, i) => {
                        const b = document.createElement('button');
                        b.type = 'button';
                        b.className = 'w-2.5 h-2.5 rounded-full transition';
                        b.style.background = 'linear-gradient(90deg, #1FA463, #0D47A1)';
                        b.style.opacity = '.28';
                        b.style.transform = 'scale(.9)';
                        b.style.boxShadow = '0 0 0 3px rgba(31,164,99,.12)';
                        b.addEventListener('click', () => {
                            setIndex(i);
                            startAutoplay();
                        });
                        dotsWrap.appendChild(b);
                    });
                }

                function startAutoplay() {
                    stopAutoplay();
                    autoplayTimer = window.setInterval(next, AUTOPLAY_MS);
                    restartProgress();
                }

                function stopAutoplay() {
                    if (autoplayTimer) window.clearInterval(autoplayTimer);
                    autoplayTimer = null;
                    if (progressFill) {
                        progressFill.style.animationPlayState = 'paused';
                    }
                }

                root.addEventListener('mouseenter', stopAutoplay);
                root.addEventListener('mouseleave', startAutoplay);
                root.addEventListener('focusin', stopAutoplay);
                root.addEventListener('focusout', startAutoplay);

                let touchStartX = 0;
                let touchDeltaX = 0;
                track.addEventListener('touchstart', (e) => {
                    touchStartX = e.touches[0].clientX;
                    touchDeltaX = 0;
                }, {
                    passive: true
                });
                track.addEventListener('touchmove', (e) => {
                    touchDeltaX = e.touches[0].clientX - touchStartX;
                }, {
                    passive: true
                });
                track.addEventListener('touchend', () => {
                    if (Math.abs(touchDeltaX) > 50) {
                        if (touchDeltaX < 0) next();
                        else prev();
                        startAutoplay();
                    }
                });

                setIndex(0);
                startAutoplay();
            })();
        </script>
    </div>
</section>


<section class="py-20 bg-gray-50 dark:bg-[#0f172a] border-t border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-10" data-aos="fade-up">
            <div>
                <p class="text-xs font-bold tracking-widest uppercase mb-2" style="color:#0D47A1;">Stay Updated</p>
                <h3 class="text-3xl font-extrabold brand-font text-gray-900 dark:text-white">Latest Insights</h3>
            </div>
            <a href="<?php echo e(route('blog.index')); ?>" class="hidden sm:flex text-sm font-bold items-center gap-1 hover:underline" style="color:#1FA463;">
                Read Blog
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $displayPosts = $recentPosts ?? collect([]); ?>
            <?php $__empty_1 = true; $__currentLoopData = $displayPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group border border-gray-100 dark:border-gray-700" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                <div class="h-48 overflow-hidden relative">
                    <img src="<?php echo e(Storage::url($post->featured_image)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <?php if($post->category): ?>
                    <div class="absolute top-4 left-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm px-3 py-1 rounded-md text-xs font-bold text-[#0D47A1] dark:text-blue-400">
                        <?php echo e($post->category->name); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2"><?php echo e(\Carbon\Carbon::parse($post->published_at)->format('M d, Y')); ?></p>
                    <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-3 line-clamp-2"><a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="hover:text-[#1FA463] transition"><?php echo e($post->title); ?></a></h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-4"><?php echo e($post->excerpt); ?></p>
                    <a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all" style="color:#1FA463;">Read More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php $__currentLoopData = [['How to Apply for Scholarships in China', 'A comprehensive guide on finding and applying for the best scholarship opportunities.', 'https://images.pexels.com/photos/3184611/pexels-photo-3184611.jpeg?auto=compress&cs=tinysrgb&w=600'],['Top 5 Cities for International Students', 'Discover the best cities in China offering vibrant student life, amazing culture, and career prospects.', 'https://images.pexels.com/photos/10185906/pexels-photo-10185906.jpeg?auto=compress&cs=tinysrgb&w=600'],['Understanding the Student Visa Process', 'Everything you need to know about preparing documents and attending your JW202 visa interview.', 'https://images.pexels.com/photos/8927063/pexels-photo-8927063.jpeg?auto=compress&cs=tinysrgb&w=600']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fbBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group border border-gray-100 dark:border-gray-700" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                <div class="h-48 overflow-hidden relative">
                    <img src="<?php echo e($fbBlog[2]); ?>" alt="<?php echo e($fbBlog[0]); ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2"><?php echo e(date('M d, Y')); ?></p>
                    <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-3 line-clamp-2"><a href="<?php echo e(route('blog.index')); ?>" class="hover:text-[#1FA463] transition"><?php echo e($fbBlog[0]); ?></a></h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-4"><?php echo e($fbBlog[1]); ?></p>
                    <a href="<?php echo e(route('blog.index')); ?>" class="text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all" style="color:#1FA463;">Read More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="py-16 bg-white dark:bg-[#0b1120]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl relative overflow-hidden shadow-2xl" data-aos="zoom-in">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0D47A1] to-[#1FA463] opacity-95"></div>
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <!-- Decorative circle -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-60 h-60 bg-white opacity-10 rounded-full blur-2xl"></div>

            <div class="relative z-10 p-10 md:p-16 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white brand-font mb-4">Ready to Start Your Journey?</h2>
                    <p class="text-white/80 text-lg">Join thousands of African students who have successfully launched their global careers through education in China. Let us handle the complexities while you focus on your future.</p>
                </div>
                <div class="flex-shrink-0">
                    <a href="<?php echo e(route('register')); ?>" class="inline-flex items-center justify-center font-bold bg-white rounded-xl px-8 py-4 shadow-xl hover:bg-gray-50 hover:-translate-y-1 transition-all w-full md:w-auto text-lg border border-white/20" style="color:#0D47A1;">
                        Apply Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hainan\resources\views/welcome.blade.php ENDPATH**/ ?>