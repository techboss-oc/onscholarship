@extends($layoutName)

@section('content')
@php
    $isAgent = auth()->user()->hasRole('agent');
    $homeRoute = $isAgent ? 'agent.dashboard' : 'student.dashboard';
    $programRoute = $isAgent ? 'agent.programs.search' : 'student.programs.search';
@endphp

<style>
#sc-filters select option { color: #0f172a; background: #ffffff; }
html.dark #sc-filters select option { color: #ffffff; background: #0b1220; }
</style>

<div class="max-w-7xl mx-auto">
    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-gray-200 dark:border-gray-700 bg-white/70 dark:bg-gray-800/60 text-xs font-black uppercase tracking-widest text-gray-600 dark:text-gray-300">
                <span class="w-1.5 h-1.5 rounded-full bg-[#f15a24]"></span>
                Scholarship
            </div>
            <h1 class="mt-4 text-2xl sm:text-3xl font-black brand-font text-gray-900 dark:text-white">Scholarships</h1>
            <div class="mt-2 flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 flex-wrap">
                <a href="{{ route($homeRoute) }}" class="hover:text-[#f15a24] transition">Home</a>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <a href="{{ route($programRoute) }}" class="hover:text-[#f15a24] transition">Programs</a>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-semibold">Scholarships</span>
            </div>
        </div>

        <div class="flex items-center gap-3 flex-wrap">
            <div class="px-4 py-2.5 rounded-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                <div class="text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400">Total</div>
                <div class="text-lg font-black brand-font text-gray-900 dark:text-white">{{ number_format($scholarships->total()) }}</div>
            </div>
            <a href="{{ route($programRoute) }}" class="inline-flex items-center justify-center px-5 py-3 rounded-2xl font-bold text-white transition shadow-sm hover:opacity-95" style="background:#0f2441;">
                Find Programs
            </a>
        </div>
    </div>

    <div class="mt-8">
        <details id="sc-filters" class="group rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden" open>
            <summary class="cursor-pointer list-none px-5 py-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl flex items-center justify-center bg-[#f15a24]/10 text-[#f15a24]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-black brand-font text-gray-900 dark:text-white">Filters</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Search and refine scholarship results</div>
                    </div>
                </div>
                <div class="w-11 h-11 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 flex items-center justify-center text-gray-500 dark:text-gray-300 group-open:rotate-180 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </summary>

            <div class="px-5 pb-5">
                <form action="{{ url()->current() }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">Keyword</label>
                        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Scholarship or university..." class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#0b1120] text-[#0f172a] dark:text-white placeholder:text-gray-500 dark:placeholder:text-gray-400 caret-[#0D47A1] dark:caret-[#1FA463] focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">University</label>
                        <select name="university_id" class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#0b1120] text-[#0f172a] dark:text-white focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                            <option value="">All</option>
                            @foreach($universities as $uni)
                                <option value="{{ $uni->id }}" {{ request('university_id') == $uni->id ? 'selected' : '' }}>{{ $uni->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">Type</label>
                        <select name="type" class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#0b1120] text-[#0f172a] dark:text-white focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                            <option value="">All</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-2">Coverage</label>
                        <input type="text" name="coverage" value="{{ request('coverage') }}" placeholder="e.g. Tuition, Stipend" class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#0b1120] text-[#0f172a] dark:text-white placeholder:text-gray-500 dark:placeholder:text-gray-400 caret-[#0D47A1] dark:caret-[#1FA463] focus:ring-2 focus:ring-[#f15a24] focus:border-[#f15a24]">
                    </div>

                    <div class="flex items-end gap-3 lg:col-span-5">
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 rounded-2xl font-bold text-white transition shadow-sm hover:opacity-95" style="background:#f15a24;">
                            Find Scholarships
                        </button>
                        <a href="{{ url()->current() }}" class="inline-flex items-center justify-center px-6 py-3 rounded-2xl font-bold border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/70 transition">
                            Clear
                        </a>
                    </div>
                </form>
            </div>
        </details>
    </div>

    <div class="mt-8 lg:hidden space-y-4">
        @forelse($scholarships as $scholarship)
            <div class="rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden">
                <div class="p-5">
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <div class="text-sm font-bold text-gray-500 dark:text-gray-400 break-words">
                                {{ $scholarship->university->name }}
                                @if($scholarship->university->is_featured)
                                    <span class="ml-1 text-[11px] font-black uppercase tracking-widest text-amber-500">(Gold)</span>
                                @endif
                            </div>
                            <div class="mt-1 text-lg font-black brand-font text-gray-900 dark:text-white break-words">
                                {{ $scholarship->name }}
                            </div>
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed break-words line-clamp-3">
                                {{ $scholarship->description }}
                            </div>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black uppercase tracking-widest border border-[#f15a24]/25 text-[#f15a24] bg-[#f15a24]/10">
                            {{ $scholarship->type }}
                        </span>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-gray-50 dark:bg-gray-900/40 border border-gray-200/70 dark:border-gray-700 p-4">
                            <div class="text-[11px] font-black uppercase tracking-widest text-gray-500 dark:text-gray-400">Slots</div>
                            <div class="mt-1 text-sm font-bold text-gray-900 dark:text-white">{{ $scholarship->available_slots ?? 0 }}</div>
                        </div>
                        <div class="rounded-2xl bg-gray-50 dark:bg-gray-900/40 border border-gray-200/70 dark:border-gray-700 p-4">
                            <div class="text-[11px] font-black uppercase tracking-widest text-gray-500 dark:text-gray-400">Deadline</div>
                            <div class="mt-1 text-sm font-bold text-gray-900 dark:text-white">{{ $scholarship->deadline ? $scholarship->deadline->format('Y-m-d') : 'N/A' }}</div>
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-end">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 rounded-2xl font-bold text-white transition hover:opacity-95" style="background:#0f2441;">
                            View &amp; Apply
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-10 text-center text-gray-500 dark:text-gray-400">
                No scholarships found matching your criteria.
            </div>
        @endforelse
    </div>

    <div class="mt-8 hidden lg:block rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                <thead class="bg-gray-50 dark:bg-gray-900/40 text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="px-6 py-4">University</th>
                        <th class="px-6 py-4">Scholarship</th>
                        <th class="px-6 py-4">Slots</th>
                        <th class="px-6 py-4">Deadline</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($scholarships as $scholarship)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/30">
                            <td class="px-6 py-5 align-top">
                                <div class="font-bold text-gray-900 dark:text-white break-words">
                                    {{ $scholarship->university->name }}
                                    @if($scholarship->university->is_featured)
                                        <span class="ml-1 text-[11px] font-black uppercase tracking-widest text-amber-500">(Gold)</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-5 align-top">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0">
                                        <div class="font-black brand-font text-gray-900 dark:text-white break-words">{{ $scholarship->name }}</div>
                                        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-2 break-words">{{ $scholarship->description }}</div>
                                        <div class="mt-3">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black uppercase tracking-widest border border-[#f15a24]/25 text-[#f15a24] bg-[#f15a24]/10">
                                                {{ $scholarship->type }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-top">
                                <div class="font-bold text-gray-900 dark:text-white">{{ $scholarship->available_slots ?? 0 }}</div>
                            </td>
                            <td class="px-6 py-5 align-top">
                                <div class="font-bold text-green-600 dark:text-green-400">{{ $scholarship->deadline ? $scholarship->deadline->format('Y-m-d') : 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-5 align-top text-right">
                                <a href="#" class="inline-flex items-center justify-center px-4 py-2 rounded-xl font-bold text-white transition hover:opacity-95" style="background:#0f2441;">
                                    View &amp; Apply
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center text-gray-500 dark:text-gray-400">No scholarships found matching your criteria.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="text-sm text-gray-500 dark:text-gray-400">Rows per page</div>
            <select onchange="window.location.href=this.value" class="px-3 py-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm">
                <option value="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ request()->fullUrlWithQuery(['per_page' => 25]) }}" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
            </select>
        </div>
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Showing <span class="font-bold text-gray-900 dark:text-white">{{ $scholarships->firstItem() ?? 0 }}–{{ $scholarships->lastItem() ?? 0 }}</span> of <span class="font-bold text-gray-900 dark:text-white">{{ $scholarships->total() }}</span>
        </div>
    </div>

    <div class="mt-6 flex justify-center">
        {{ $scholarships->links() }}
    </div>
</div>
@endsection
