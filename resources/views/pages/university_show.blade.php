@extends('layouts.guest')

@section('title', $university->name)

@section('content')
<div class="relative bg-[#0f2441] pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        @if($university->cover_image)
            <img src="{{ Storage::url($university->cover_image) }}" alt="Cover" class="w-full h-full object-cover opacity-30">
        @else
            <div class="w-full h-full bg-gradient-to-r from-[#0f2441] via-blue-900 to-transparent opacity-50"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#0f2441] to-transparent"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row items-center md:items-end gap-8" data-aos="fade-up">
            <div class="w-32 h-32 md:w-48 md:h-48 bg-white rounded-3xl p-2 shadow-2xl flex-shrink-0">
                @if($university->logo)
                    <img src="{{ Storage::url($university->logo) }}" alt="Logo" class="w-full h-full object-contain">
                @else
                    <div class="w-full h-full bg-gray-100 rounded-2xl flex items-center justify-center text-[#0f2441] text-5xl font-black">
                        {{ substr($university->name, 0, 1) }}
                    </div>
                @endif
            </div>
            <div class="flex-grow text-center md:text-left">
                <span class="inline-block px-3 py-1 bg-[#f15a24] text-white text-xs font-bold rounded-full mb-4">{{ $university->city }}, {{ $university->province }}</span>
                <h1 class="text-3xl md:text-5xl font-black text-white brand-font mb-2">{{ $university->name }}</h1>
                <p class="text-gray-300">Ranking: {{ $university->ranking ?? 'N/A' }} | Type: {{ ucfirst($university->type) }}</p>
            </div>
            <div class="shrink-0">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-[#f15a24] text-white rounded-xl font-bold hover:bg-[#d94a1c] transition shadow-lg inline-block text-center w-full md:w-auto">Apply Here</a>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-50 dark:bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-12">
                <section class="glass p-8 rounded-3xl bg-white dark:bg-gray-800 shadow-sm" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-[#0f2441] dark:text-white mb-4 brand-font">About the University</h3>
                    <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-400">
                        {!! nl2br(e($university->description ?? 'No description available for this university.')) !!}
                    </div>
                </section>
                
                <section class="glass p-8 rounded-3xl bg-white dark:bg-gray-800 shadow-sm" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-[#0f2441] dark:text-white mb-6 brand-font">Available Programs ({{ $university->programs->count() }})</h3>
                    @if($university->programs->count() > 0)
                        <div class="space-y-4">
                            @foreach($university->programs as $program)
                                <div class="p-4 border border-gray-100 dark:border-gray-700 rounded-xl hover:border-[#f15a24] transition bg-gray-50 dark:bg-gray-900">
                                    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
                                        <div>
                                            <h4 class="font-bold text-gray-900 dark:text-white">{{ $program->name }}</h4>
                                            <p class="text-sm text-gray-500">{{ ucfirst($program->degree_level) }} &bull; {{ $program->duration_years }} Years &bull; {{ ucfirst($program->teaching_language) }}</p>
                                        </div>
                                        <div class="shrink-0">
                                            <span class="font-bold text-[#0f2441] dark:text-gray-200">${{ number_format($program->tuition_fee) }}/yr</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No programs listed yet.</p>
                    @endif
                </section>
            </div>
            
            <div class="space-y-8">
                <div class="glass p-8 rounded-3xl bg-[#0f2441] text-white shadow-xl" data-aos="fade-left">
                    <h4 class="text-xl font-bold mb-6 brand-font border-b border-white/10 pb-4">Quick Facts</h4>
                    <ul class="space-y-4">
                        <li class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Founded</span>
                            <span class="font-semibold">{{ $university->founded_year ?? 'N/A' }}</span>
                        </li>
                        <li class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Location</span>
                            <span class="font-semibold text-right">{{ $university->city }}, {{ $university->province }}</span>
                        </li>
                        <li class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Total Students</span>
                            <span class="font-semibold">{{ $university->student_count ? number_format($university->student_count) : 'N/A' }}</span>
                        </li>
                        <li class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Website</span>
                            <a href="{{ $university->website }}" target="_blank" class="font-semibold text-[#f15a24] hover:underline">Official Site</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
