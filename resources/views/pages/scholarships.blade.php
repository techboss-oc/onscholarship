@extends('layouts.guest')

@section('title', 'Scholarships')
@section('meta_description', 'Explore available scholarships for African students to study in China. Find government, university, and private scholarships with Onscholarship.')
@section('meta_keywords', 'Scholarships in China, Study in China, International Scholarships, Onscholarship')

@section('content')
<div class="pt-28 pb-24 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" data-aos="fade-up">

        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-black text-[#0f2441] dark:text-white brand-font">Available <span class="text-[#f15a24]">Scholarships</span></h1>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Explore full and partial funding options provided by the Chinese Government, Provinces, and individual Universities.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($scholarships as $scholarship)
            <div class="glass relative p-6 rounded-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm flex flex-col md:flex-row gap-6 hover:shadow-md transition">
                <div class="w-16 h-16 shrink-0 bg-blue-50 dark:bg-gray-700 rounded-xl flex items-center justify-center text-[#f15a24]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2"></path>
                    </svg>
                </div>
                <div class="flex-grow">
                    <div class="flex flex-wrap gap-2 mb-2">
                        <span class="px-2 py-0.5 bg-gray-100 dark:bg-gray-700 text-xs font-semibold rounded text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $scholarship->funding_type)) }}</span>
                        <span class="px-2 py-0.5 bg-blue-100 dark:bg-blue-900 text-xs font-semibold rounded text-blue-700 dark:text-blue-300">Degree: {{ ucfirst($scholarship->degree_type) }}</span>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 brand-font line-clamp-1">{{ $scholarship->name }}</h4>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2">{{ $scholarship->description }}</p>
                    <div class="flex justify-between items-center mt-auto">
                        <div class="text-xs text-red-500 font-semibold">Deadline: {{ \Carbon\Carbon::parse($scholarship->deadline)->format('M d, Y') }}</div>
                        <a href="{{ route('scholarships.show', $scholarship->id) }}" class="text-sm font-bold text-[#f15a24]">More info &rsaquo;</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12 flex justify-center">
            {{ $scholarships->links() }}
        </div>
    </div>
</div>
@endsection