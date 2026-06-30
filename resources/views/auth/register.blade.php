<x-guest-layout>

    {{-- Registration Page Background --}}
    <div class="fixed inset-0 pointer-events-none" style="z-index:-1;">
        <div class="absolute inset-0" style="background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fe 50%, #ffffff 100%);"></div>
        <div class="absolute inset-0 dark:bg-gray-900"></div>
        {{-- Floating blobs --}}
        <div class="absolute top-[15%] left-[8%] w-[420px] h-[420px] rounded-full blur-[110px] opacity-35 mix-blend-multiply dark:mix-blend-screen" style="background: #3b82f6;"></div>
        <div class="absolute bottom-[8%] right-[8%] w-[480px] h-[480px] rounded-full blur-[130px] opacity-25 mix-blend-multiply dark:mix-blend-screen" style="background: #1FA463;"></div>
        <div class="absolute top-[50%] right-[25%] w-[300px] h-[300px] rounded-full blur-[90px] opacity-20 mix-blend-multiply dark:mix-blend-screen" style="background: #8b5cf6;"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center py-24 px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="max-w-lg w-full bg-white/60 dark:bg-[#1e293b]/70 backdrop-blur-2xl rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] border border-white/50 dark:border-gray-700/50 overflow-hidden relative">

            {{-- Decorative Accent Bar --}}
            <div class="h-2 w-full absolute top-0 left-0" style="background: linear-gradient(90deg, #0b49b3, #1FA463);"></div>

            <div class="p-8 sm:p-10 relative z-10">

                {{-- Header --}}
                <div class="mb-8 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/50 dark:bg-gray-800/50 backdrop-blur-md border border-gray-200/50 dark:border-gray-600/50 text-xs font-semibold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-all mb-8 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                        Back to Login
                    </a>

                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, #0b49b3, #1FA463);">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-3xl font-black text-gray-900 dark:text-white brand-font tracking-tight mb-1">Create Account</h2>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Join Onscholarship to begin your journey.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1.5">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                               placeholder="e.g. John Doe"
                               class="block w-full px-4 py-3 rounded-xl border border-gray-300/50 dark:border-gray-600/50 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-[#0b49b3] focus:border-transparent transition-all shadow-inner">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1.5">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                               placeholder="you@example.com"
                               class="block w-full px-4 py-3 rounded-xl border border-gray-300/50 dark:border-gray-600/50 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-[#0b49b3] focus:border-transparent transition-all shadow-inner">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Account Type --}}
                    <div>
                        <label for="role" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1.5">Account Type</label>
                        <select id="role" name="role" required
                                class="block w-full px-4 py-3 rounded-xl border border-gray-300/50 dark:border-gray-600/50 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-[#0b49b3] focus:border-transparent transition-all shadow-inner cursor-pointer">
                            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>🎓 Student</option>
                            <option value="agent" {{ old('role') == 'agent' ? 'selected' : '' }}>💼 Agent / Consultant</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div x-data="{ show: false }">
                        <label for="password" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
                        <div class="relative">
                            <input id="password" x-bind:type="show ? 'text' : 'password'" name="password" required autocomplete="new-password"
                                   placeholder="At least 8 characters"
                                   class="block w-full px-4 py-3 rounded-xl border border-gray-300/50 dark:border-gray-600/50 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-[#0b49b3] focus:border-transparent transition-all shadow-inner pr-12">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none transition-colors">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Confirm Password --}}
                    <div x-data="{ show: false }">
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1.5">Confirm Password</label>
                        <div class="relative">
                            <input id="password_confirmation" x-bind:type="show ? 'text' : 'password'" name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Repeat your password"
                                   class="block w-full px-4 py-3 rounded-xl border border-gray-300/50 dark:border-gray-600/50 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-[#0b49b3] focus:border-transparent transition-all shadow-inner pr-12">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none transition-colors">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Submit --}}
                    <div class="mt-8 pt-5 border-t border-gray-200/50 dark:border-gray-700/50">
                        <button type="submit" class="w-full flex items-center justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0b49b3] transition-all hover:-translate-y-0.5 hover:shadow-xl dark:focus:ring-offset-gray-900" style="background: linear-gradient(90deg, #0b49b3, #1FA463); box-shadow: 0 10px 20px -5px rgba(11,73,179,0.35);">
                            Create My Account
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </button>

                        <p class="mt-5 text-center text-sm text-gray-500 dark:text-gray-400">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-bold text-[#0b49b3] hover:opacity-80 transition-opacity ml-1">Sign in here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
