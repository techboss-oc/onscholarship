@extends('layouts.guest')

@section('content')
<div class="pt-32 pb-20 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('programs.index') }}" class="inline-block mb-8 text-[#f15a24] font-semibold hover:underline">&larr; Back to all programs</a>
        
        <div class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 overflow-hidden shadow-lg" data-aos="fade-up">
            <div class="p-8 md:p-12">
                <span class="px-4 py-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-sm font-bold rounded-full mb-6 inline-block uppercase tracking-wider">{{ $program->degree_level }}</span>
                <h1 class="text-3xl md:text-5xl font-black text-[#0f2441] dark:text-white brand-font mb-4">{{ $program->name }}</h1>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Offered by <a href="{{ route('universities.show', $program->university->id) }}" class="text-[#f15a24] hover:underline">{{ $program->university->name }}</a>
                </p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 py-8 border-y border-gray-100 dark:border-gray-700">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Duration</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $program->duration_years }} Years</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Tuition Fee</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">${{ number_format((float) $program->tuition_fee, 2) }} / Yr</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Language</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">English Taught</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Service Charge</p>
                        <p class="text-lg font-bold text-[#f15a24]">USD {{ number_format((float) $program->service_charge_usd, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Status</p>
                        <p class="text-lg font-bold text-green-600">Accepting Apps</p>
                    </div>
                </div>

                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Program Overview</h3>
                    <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                        {!! nl2br(e($program->description ?? 'No specific description provided for this program. It combines rigorous academic coursework with practical experience.')) !!}
                    </div>
                </div>

                <div class="mt-12 bg-gray-50 dark:bg-gray-700/30 p-8 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-[#0f2441] opacity-5"></div>
                    <div class="relative z-10 w-full text-center md:text-left">
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Ready to apply?</h4>
                        <p class="text-gray-600 dark:text-gray-300">Start your journey today. Registration takes less than 3 minutes.</p>
                    </div>
                    <a href="{{ route('register') }}" class="relative z-10 shrink-0 px-8 py-3 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md whitespace-nowrap">
                        Apply Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
