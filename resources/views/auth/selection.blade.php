<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center relative py-20 px-4 sm:px-6 lg:px-8">
        
        <div class="relative max-w-4xl w-full z-10">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-black brand-font tracking-tight mb-3 text-gray-900 dark:text-white">
                    Welcome Back
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 font-medium">Please select your portal to continue</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-10">
                
                {{-- Student Portal Card --}}
                <a href="{{ route('login.type', 'student') }}" class="group block relative rounded-3xl overflow-hidden bg-white dark:bg-gray-800 shadow-xl border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white dark:from-blue-900/20 dark:to-gray-800 opacity-50 z-0"></div>
                    <div class="relative z-10 p-10 flex flex-col items-center text-center">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-110 shadow-md" style="background: linear-gradient(135deg, #0b49b3, #0D47A1);">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white brand-font mb-2">Student Portal</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-6">
                            Track applications, upload documents, check admission status, and connect with universities.
                        </p>
                        <span class="inline-flex items-center justify-center font-bold text-white rounded-xl py-3 px-6 w-full transition-all" style="background-color: #0b49b3;">
                            Log In as Student
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </div>
                </a>

                {{-- Agent Portal Card --}}
                <a href="{{ route('login.type', 'agent') }}" class="group block relative rounded-3xl overflow-hidden bg-white dark:bg-gray-800 shadow-xl border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-white dark:from-green-900/20 dark:to-gray-800 opacity-50 z-0"></div>
                    <div class="relative z-10 p-10 flex flex-col items-center text-center">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-110 shadow-md" style="background: linear-gradient(135deg, #1FA463, #15804c);">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white brand-font mb-2">Agent Portal</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-6">
                            Manage your referred students, track commissions, and access exclusive partner resources.
                        </p>
                        <span class="inline-flex items-center justify-center font-bold text-white rounded-xl py-3 px-6 w-full transition-all" style="background-color: #1FA463;">
                            Log In as Agent
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </div>
                </a>

            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white inline-flex items-center transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Return to Homepage
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
