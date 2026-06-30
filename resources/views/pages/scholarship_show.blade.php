@extends('layouts.guest')

@section('title', $scholarship->name)

@section('content')
<div class="pt-28 pb-24 bg-gray-50 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" data-aos="fade-up">
        
        <a href="{{ route('scholarships.index') }}" class="inline-flex items-center text-[#f15a24] font-semibold text-sm hover:underline mb-8">
            &larr; Back to Scholarships
        </a>

        <div class="glass p-8 md:p-12 rounded-3xl bg-white dark:bg-gray-800 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#f15a24]/10 rounded-full filter blur-3xl"></div>
            
            <div class="flex flex-wrap gap-2 mb-6">
                <span class="px-3 py-1 bg-[#0f2441] text-white text-xs font-bold rounded-full shadow tracking-wide uppercase">{{ str_replace('_', ' ', $scholarship->funding_type) }} FULL COVERAGE</span>
                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full shadow tracking-wide uppercase">{{ $scholarship->degree_type }} Degree</span>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-black text-[#0f2441] dark:text-white brand-font mb-6 relative z-10 leading-tight">
                {{ $scholarship->name }}
            </h1>
            
            <div class="flex items-center gap-4 text-sm font-semibold mb-8 border-b border-gray-100 dark:border-gray-700 pb-8">
                <div class="flex items-center text-red-500">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Deadline: {{ \Carbon\Carbon::parse($scholarship->deadline)->format('F j, Y') }}
                </div>
            </div>

            <div class="prose dark:prose-invert max-w-none mb-12 relative z-10">
                <h3 class="text-xl font-bold brand-font text-gray-900 dark:text-gray-100">About this Scholarship</h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-lg">
                    {!! nl2br(e($scholarship->description)) !!}
                </p>
                <div class="mt-8 p-6 bg-blue-50 dark:bg-blue-900/20 rounded-2xl border border-blue-100 dark:border-blue-800/50">
                    <h4 class="text-blue-900 dark:text-blue-300 font-bold mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        What it covers
                    </h4>
                    <p class="text-blue-800 dark:text-blue-200 text-sm">
                        {{ $scholarship->coverage ?? 'Full coverage typically includes tuition fees, accommodation on campus, comprehensive medical insurance, and a monthly stipend for living expenses.' }}
                    </p>
                </div>
                
                <h3 class="text-xl font-bold brand-font text-gray-900 dark:text-gray-100 mt-8">Requirements</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    {!! nl2br(e($scholarship->requirements ?? "Standard documents are required: Passport, Highest Degree Certificate, Academic Transcripts, Physical Examination Form, Non-Criminal Record, Study Plan, and Recommendation Letters.")) !!}
                </p>
            </div>

            <div class="text-center relative z-10">
                <a href="{{ route('register') }}" class="inline-block px-12 py-5 bg-[#f15a24] text-white rounded-xl font-bold text-lg hover:bg-[#d94a1c] transition shadow-xl hover:shadow-[0_0_20px_rgba(241,90,36,0.6)] hover:-translate-y-1 transform duration-300">
                    Apply Through Our Portal
                </a>
                <p class="text-xs text-gray-500 mt-4">Creating an account allows our agents to process your application directly to the university.</p>
            </div>
        </div>
    </div>
</div>
@endsection
