@extends('layouts.guest')

@section('title', 'Programs')
@section('meta_description', 'Browse bachelor\'s, master\'s, and PhD programs at Chinese universities. Find your perfect program with Onscholarship.')
@section('meta_keywords', 'Study in China, University Programs, Bachelor\'s, Master\'s, PhD, Onscholarship')

@section('content')
<div class="pt-32 pb-20 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-black text-[#0f2441] dark:text-white brand-font mb-6">Explore Programs</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300">Discover your next academic adventure in China. Browse hundreds of bachelor's, master's, and PhD programs from excellent partner universities.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-64 shrink-0" data-aos="fade-right">
                <form action="{{ route('programs.index') }}" method="GET" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-24">
                    @if(request()->filled('q'))
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    @endif

                    <h3 class="font-bold text-gray-900 dark:text-white mb-4">Filter By Degree</h3>
                    <div class="space-y-3">
                        @foreach(['bachelor' => 'Bachelor', 'master' => 'Master', 'phd' => 'PhD', 'non-degree' => 'Non-Degree'] as $val => $label)
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="degree" value="{{ $val }}" onchange="this.form.submit()" {{ request('degree') == $val ? 'checked' : '' }}
                                class="text-[#f15a24] focus:ring-[#f15a24]">
                            <span class="text-gray-700 dark:text-gray-300 text-sm">{{ $label }}</span>
                        </label>
                        @endforeach
                        <div class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('programs.index') }}" class="text-sm text-gray-500 hover:text-[#f15a24]">Clear Filters</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="flex-grow">
                <div class="mb-7 -mt-3 md:-mt-5" data-aos="fade-up">
                    <form action="{{ route('programs.index') }}" method="GET" class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl p-3 sm:p-4 shadow-sm">
                        @if(request()->filled('degree'))
                        <input type="hidden" name="degree" value="{{ request('degree') }}">
                        @endif

                        <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
                            <div class="flex-1">
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ request('q') }}"
                                    placeholder="Search programs or universities..."
                                    class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0b1120] border border-gray-200 dark:border-white/10 focus:ring-2 focus:ring-[#0D47A1] focus:border-[#0D47A1] text-gray-900 dark:text-white placeholder:text-gray-500 dark:placeholder:text-gray-500 caret-[#0D47A1] dark:caret-[#1FA463]">
                            </div>

                            <div class="flex gap-3">
                                <button type="submit" class="inline-flex items-center justify-center px-5 py-3 rounded-xl font-bold text-white transition shadow-sm hover:opacity-95" style="background:#0D47A1;">
                                    Search
                                </button>
                                @if(request()->filled('q') || request()->filled('degree'))
                                <a href="{{ route('programs.index') }}" class="inline-flex items-center justify-center px-5 py-3 rounded-xl font-bold border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/70 transition">
                                    Clear
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($programs as $p)
                    <div class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group" data-aos="fade-up">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="px-3 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold rounded-full mb-3 inline-block uppercase tracking-wide">{{ $p->degree_level }}</span>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-[#f15a24] transition"><a href="{{ route('programs.show', $p->id) }}">{{ $p->name }}</a></h3>
                                    <p class="text-sm text-gray-500 line-clamp-1"><a href="{{ route('universities.show', $p->university->id) }}" class="hover:underline">{{ $p->university->name }}</a></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-xl">
                                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Duration</p>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $p->duration_years }} Years</p>
                                </div>
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-xl">
                                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Tuition / Yr</p>
                                    <p class="text-sm font-semibold text-[#f15a24]">${{ number_format($p->tuition_fee, 0) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-16 text-center text-gray-500">
                        No programs found matching this criteria.
                    </div>
                    @endforelse
                </div>
                <div class="mt-12 flex justify-center">{{ $programs->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
