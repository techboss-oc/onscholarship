@extends('layouts.agent')

@section('content')
<div class="bg-[#0f2441] -m-4 sm:-m-6 p-4 sm:p-8 min-h-screen text-white font-sans">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black brand-font mb-2">Add New Student</h1>
            <p class="text-white/60">Create a new student account and link it to your agency.</p>
        </div>
        <a href="{{ route('agent.students.index') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 rounded-xl text-sm font-bold transition">
            Back to List
        </a>
    </div>

    <div class="max-w-2xl">
        <div class="bg-white/5 border border-white/10 rounded-2xl p-8 shadow-2xl backdrop-blur-md">
            <form action="{{ route('agent.students.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-bold text-white/60 mb-2 uppercase tracking-wider">Full Name</label>
                    <input type="text" name="name" required placeholder="Enter student's full name"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/20 focus:outline-none focus:border-[#f15a24] transition">
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-white/60 mb-2 uppercase tracking-wider">Email Address</label>
                    <input type="email" name="email" required placeholder="student@example.com"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/20 focus:outline-none focus:border-[#f15a24] transition">
                    @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-white/60 mb-2 uppercase tracking-wider">Default Password</label>
                    <input type="password" name="password" required placeholder="Minimum 8 characters"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/20 focus:outline-none focus:border-[#f15a24] transition">
                    <p class="text-white/40 text-[10px] mt-2 italic">The student can change this after their first login.</p>
                    @error('password') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-[#f15a24] hover:bg-orange-600 text-white font-black rounded-xl transition shadow-lg shadow-orange-900/20 uppercase tracking-widest text-sm">
                        Create Student Account
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-8 p-6 bg-blue-500/10 border border-blue-500/20 rounded-2xl flex gap-4">
            <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center text-blue-400 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-blue-400 mb-1">What happens next?</p>
                <p class="text-xs text-white/60 leading-relaxed">Once created, the student can log in using their email and the password you provided. They will be automatically linked to your agency for recruitment tracking.</p>
            </div>
        </div>
    </div>
</div>
@endsection
