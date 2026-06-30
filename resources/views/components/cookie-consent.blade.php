<div x-data="{
        showCookies: false,
        init() {
            if (!localStorage.getItem('cookieConsent')) {
                setTimeout(() => { this.showCookies = true }, 1500);
            }
        },
        accept() {
            localStorage.setItem('cookieConsent', 'accepted');
            this.showCookies = false;
        },
        reject() {
            localStorage.setItem('cookieConsent', 'rejected');
            this.showCookies = false;
        }
    }"
    x-show="showCookies"
    x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="opacity-0 translate-y-12 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 translate-y-12 scale-95"
    class="fixed bottom-4 sm:bottom-6 left-4 sm:left-6 right-4 sm:right-auto z-[9999] sm:w-[400px]"
    style="display: none;"
>
    <!-- Glassmorphism Container -->
    <div class="relative overflow-hidden rounded-2xl shadow-2xl p-6 border border-white/60 dark:border-white/10"
         style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);"
         :class="$store.theme.dark ? '!bg-slate-900/85' : ''">

        <!-- Decorative background shapes -->
        <div class="absolute -top-12 -right-12 w-32 h-32 rounded-full mix-blend-multiply dark:mix-blend-lighten filter blur-2xl opacity-40 animate-pulse pointer-events-none" style="background-color: #0D47A1;"></div>
        <div class="absolute -bottom-10 -left-10 w-28 h-28 rounded-full mix-blend-multiply dark:mix-blend-lighten filter blur-2xl opacity-30 animate-pulse pointer-events-none" style="animation-delay: 2s; background-color: #1FA463;"></div>

        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-xl bg-blue-50 dark:bg-slate-800" style="color: #0D47A1;" :class="$store.theme.dark ? '!text-blue-400' : ''">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.078 2.015-.227 2.978m-3.413 5.49a13.923 13.923 0 01-1.36 2.04v-.003c.09-.15.18-.306.27-.468m-1.385-4.48c.189-.548.337-1.118.444-1.706M9 11h.01M15 11h.01M12 15h.01m-2.887 1.832a8.966 8.966 0 01-1.127-1.921"/></svg>
                    </div>
                    <h3 class="text-lg font-extrabold brand-font text-gray-900 dark:text-white mt-1">Cookie Notice</h3>
                </div>
                <button @click="showCookies = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <p class="text-[0.85rem] text-gray-600 dark:text-gray-300 mb-5 leading-relaxed font-medium">
                We use cookies to enhance your browsing experience, analyze site traffic, and deliver personalized educational content. By choosing <span class="font-bold text-gray-800 dark:text-gray-200">"Accept All"</span>, you consent to our use of cookies.
            </p>
            
            <div class="flex items-center gap-3">
                <button @click="reject()" class="flex-1 px-4 py-2.5 text-xs font-bold uppercase tracking-wide text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-white/5 hover:bg-gray-200 dark:hover:bg-white/10 rounded-xl transition-all">
                    Decline
                </button>
                <button @click="accept()" class="flex-1 px-4 py-2.5 text-xs font-bold uppercase tracking-wide text-white rounded-xl shadow-[0_4px_14px_rgba(13,71,161,0.3)] hover:shadow-lg transition-all hover:-translate-y-0.5" style="background:#0D47A1;">
                    Accept All
                </button>
            </div>
        </div>
    </div>
</div>
