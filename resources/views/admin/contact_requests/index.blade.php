@extends('layouts.admin')

@section('content')
@php
$selectedStatus = request('status');
@endphp

<div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-[#0f2441] dark:text-white brand-font">Contact Messages</h1>
        <p class="text-sm mt-2 text-gray-500 dark:text-gray-400">View website enquiries and manage their status.</p>
    </div>
    <div class="inline-flex items-center gap-3 self-start rounded-2xl border px-4 py-3" style="border-color: var(--border); background: var(--bg-card);">
        <div class="w-10 h-10 rounded-2xl flex items-center justify-center" style="background: rgba(139,92,246,0.12);">
            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Inbox Health</p>
            <p class="text-sm font-semibold mt-1" style="color: var(--text-primary);">
                {{ $stats['new'] > 0 ? $stats['new'] . ' new messages need review' : 'All enquiries are up to date' }}
            </p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
    <div class="stat-card">
        <div>
            <p class="stat-label">All Messages</p>
            <p class="stat-value">{{ number_format($stats['total']) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Total contact enquiries</p>
        </div>
        <div class="stat-icon" style="background: rgba(139,92,246,0.12);">
            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div>
            <p class="stat-label">New</p>
            <p class="stat-value {{ $stats['new'] > 0 ? 'text-[#f15a24]' : '' }}">{{ number_format($stats['new']) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Awaiting first review</p>
        </div>
        <div class="stat-icon" style="background: rgba(241,90,36,0.12);">
            <svg class="w-6 h-6 text-[#f15a24]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div>
            <p class="stat-label">Read</p>
            <p class="stat-value text-blue-500">{{ number_format($stats['read']) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Opened by the admin team</p>
        </div>
        <div class="stat-icon" style="background: rgba(59,130,246,0.12);">
            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0c-2.21 3.333-5.21 5-9 5s-6.79-1.667-9-5c2.21-3.333 5.21-5 9-5s6.79 1.667 9 5zm-9 2a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div>
            <p class="stat-label">Replied</p>
            <p class="stat-value text-emerald-500">{{ number_format($stats['replied']) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Handled successfully</p>
        </div>
        <div class="stat-icon" style="background: rgba(16,185,129,0.12);">
            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>
</div>

<div class="admin-card p-6 mb-6">
    <div class="flex flex-col gap-6 xl:flex-row xl:items-end xl:justify-between">
        <form method="GET" action="{{ route('admin.contact_requests.index') }}" class="grid flex-1 grid-cols-1 gap-4 md:grid-cols-[minmax(0,1.8fr)_minmax(200px,0.8fr)_auto]">
            <div>
                <label class="block text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Search Inbox</label>
                <div class="relative mt-2">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4" style="color: var(--text-muted);">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Search by name, email, or subject"
                        class="w-full rounded-2xl border py-3.5 pl-11 pr-4 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5"
                        style="border-color: var(--border); color: var(--text-primary);">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Filter Status</label>
                <select
                    name="status"
                    class="mt-2 w-full rounded-2xl border px-4 py-3.5 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5"
                    style="border-color: var(--border); color: var(--text-primary);">
                    <option value="">All statuses</option>
                    <option value="new" @selected($selectedStatus==='new' )>New</option>
                    <option value="read" @selected($selectedStatus==='read' )>Read</option>
                    <option value="replied" @selected($selectedStatus==='replied' )>Replied</option>
                    <option value="closed" @selected($selectedStatus==='closed' )>Closed</option>
                </select>
            </div>

            <div class="flex gap-2 md:self-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl px-5 py-3.5 text-sm font-bold text-white transition hover:opacity-95" style="background: var(--accent);">
                    Apply Filters
                </button>
                <a href="{{ route('admin.contact_requests.index') }}" class="inline-flex items-center justify-center rounded-2xl border px-5 py-3.5 text-sm font-bold transition hover:bg-gray-50 dark:hover:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                    Reset
                </a>
            </div>
        </form>

        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.contact_requests.index', array_filter(['status' => 'new', 'q' => request('q')])) }}"
                class="inline-flex items-center rounded-full px-3.5 py-2 text-xs font-bold uppercase tracking-wide transition {{ $selectedStatus === 'new' ? 'text-[#f15a24]' : '' }}"
                style="background: {{ $selectedStatus === 'new' ? 'rgba(241,90,36,0.14)' : 'rgba(241,90,36,0.08)' }}; color: {{ $selectedStatus === 'new' ? '#f15a24' : 'var(--text-secondary)' }};">
                New
            </a>
            <a href="{{ route('admin.contact_requests.index', array_filter(['status' => 'read', 'q' => request('q')])) }}"
                class="inline-flex items-center rounded-full px-3.5 py-2 text-xs font-bold uppercase tracking-wide transition"
                style="background: rgba(59,130,246,0.10); color: {{ $selectedStatus === 'read' ? '#3b82f6' : 'var(--text-secondary)' }};">
                Read
            </a>
            <a href="{{ route('admin.contact_requests.index', array_filter(['status' => 'replied', 'q' => request('q')])) }}"
                class="inline-flex items-center rounded-full px-3.5 py-2 text-xs font-bold uppercase tracking-wide transition"
                style="background: rgba(16,185,129,0.10); color: {{ $selectedStatus === 'replied' ? '#10b981' : 'var(--text-secondary)' }};">
                Replied
            </a>
        </div>
    </div>
</div>

<div class="admin-card p-0 overflow-hidden">
    <div class="flex flex-col gap-3 border-b px-5 py-5 sm:flex-row sm:items-center sm:justify-between" style="border-color: var(--border);">
        <div>
            <h2 class="brand-font text-base font-bold" style="color: var(--text-primary);">Message Queue</h2>
            <p class="text-xs mt-1" style="color: var(--text-muted);">
                {{ number_format($contactRequests->total()) }} {{ \Illuminate\Support\Str::plural('message', $contactRequests->total()) }} found
                @if($selectedStatus)
                for the {{ $selectedStatus }} status
                @endif
            </p>
        </div>
        <div class="inline-flex items-center rounded-full px-3 py-1.5 text-xs font-bold uppercase tracking-wide" style="background: rgba(139,92,246,0.10); color: #8b5cf6;">
            Inbox Management
        </div>
    </div>

    @if($contactRequests->count() > 0)
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($contactRequests as $contactRequest)
        @php
        $statusPalette = match ($contactRequest->status) {
        'new' => 'background: rgba(241,90,36,0.12); color: #f15a24;',
        'read' => 'background: rgba(59,130,246,0.12); color: #3b82f6;',
        'replied' => 'background: rgba(16,185,129,0.12); color: #10b981;',
        default => 'background: rgba(107,114,128,0.12); color: #6b7280;',
        };
        @endphp

        <a href="{{ route('admin.contact_requests.show', $contactRequest->id) }}" class="block p-5 sm:p-6 transition hover:bg-gray-50 dark:hover:bg-white/5">
            <div class="flex flex-col gap-5 xl:flex-row xl:items-start xl:justify-between">
                <div class="min-w-0 flex-1">
                    <div class="flex items-start gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl font-black text-white shadow-sm" style="background: linear-gradient(135deg, #0f2441 0%, #1f4e8c 100%);">
                            {{ strtoupper(substr($contactRequest->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="truncate text-base font-black brand-font" style="color: var(--text-primary);">{{ $contactRequest->subject }}</p>
                                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide" style="{{ $statusPalette }}">
                                    {{ $contactRequest->status }}
                                </span>
                            </div>

                            <div class="mt-2 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs" style="color: var(--text-muted);">
                                <span class="font-semibold" style="color: var(--text-secondary);">{{ $contactRequest->name }}</span>
                                <span class="hidden sm:inline">•</span>
                                <span class="break-all">{{ $contactRequest->email }}</span>
                                @if($contactRequest->phone)
                                <span class="hidden sm:inline">•</span>
                                <span>{{ $contactRequest->phone }}</span>
                                @endif
                                @if($contactRequest->country)
                                <span class="hidden sm:inline">•</span>
                                <span>{{ $contactRequest->country }}</span>
                                @endif
                            </div>

                            <p class="mt-3 max-w-4xl text-sm leading-7" style="color: var(--text-muted);">
                                {{ \Illuminate\Support\Str::limit($contactRequest->message, 220) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex shrink-0 flex-col gap-3 xl:items-end">
                    <div class="text-left xl:text-right">
                        <p class="text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Received</p>
                        <p class="mt-1 text-sm font-semibold" style="color: var(--text-primary);">{{ $contactRequest->created_at->format('M j, Y') }}</p>
                        <p class="mt-1 text-xs" style="color: var(--text-muted);">{{ $contactRequest->created_at->diffForHumans() }}</p>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center rounded-xl border px-3 py-2 text-xs font-semibold" style="border-color: var(--border); color: var(--text-secondary);">
                            {{ \Illuminate\Support\Str::limit($contactRequest->email, 28) }}
                        </span>
                        <span class="inline-flex items-center rounded-xl px-3 py-2 text-xs font-bold text-white" style="background: var(--accent);">
                            Open Message
                        </span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="border-t p-5" style="border-color: var(--border);">
        {{ $contactRequests->links() }}
    </div>
    @else
    <div class="flex flex-col items-center justify-center p-12 text-center">
        <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl" style="background: var(--border);">
            <svg class="w-8 h-8" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        <p class="text-base font-semibold" style="color: var(--text-secondary);">No messages found</p>
        <p class="mt-2 text-sm" style="color: var(--text-muted);">Try a different search term or reset your filters to see more enquiries.</p>
    </div>
    @endif
</div>
@endsection