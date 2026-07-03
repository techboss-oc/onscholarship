@extends('layouts.admin')

@section('content')
<div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-[#0f2441] dark:text-white brand-font">Application Fees</h1>
        <p class="text-sm mt-2 text-gray-500 dark:text-gray-400">Set one global application fee and monitor payment status across all submitted applications.</p>
    </div>
    <div class="inline-flex items-center gap-3 self-start rounded-2xl border px-4 py-3" style="border-color: var(--border); background: var(--bg-card);">
        <div class="w-10 h-10 rounded-2xl flex items-center justify-center" style="background: rgba(241,90,36,0.12);">
            <svg class="w-5 h-5 text-[#f15a24]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .672-3 1.5S10.343 11 12 11s3 .672 3 1.5S13.657 14 12 14m0-6V6m0 8v2m9-4a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Global Fee</p>
            <p class="text-sm font-semibold mt-1" style="color: var(--text-primary);">{{ $settings['currency'] }} {{ number_format($settings['amount'], 2) }} per application</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-5 mb-8">
    <div class="stat-card">
        <div>
            <p class="stat-label">Fee Amount</p>
            <p class="stat-value text-[#f15a24]">{{ $settings['currency'] }} {{ number_format($settings['amount'], 2) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Uniform for all submissions</p>
        </div>
        <div class="stat-icon" style="background: rgba(241,90,36,0.12);">
            <svg class="w-6 h-6 text-[#f15a24]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .672-3 1.5S10.343 11 12 11s3 .672 3 1.5S13.657 14 12 14m0-6V6m0 8v2m9-4a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
    <div class="stat-card">
        <div>
            <p class="stat-label">Total Applications</p>
            <p class="stat-value">{{ number_format($stats['total']) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Tracked for fee monitoring</p>
        </div>
        <div class="stat-icon" style="background: rgba(59,130,246,0.12);">
            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
    </div>
    <div class="stat-card">
        <div>
            <p class="stat-label">Paid</p>
            <p class="stat-value text-emerald-500">{{ number_format($stats['paid']) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Ready for full processing</p>
        </div>
        <div class="stat-icon" style="background: rgba(16,185,129,0.12);">
            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>
    <div class="stat-card">
        <div>
            <p class="stat-label">Unpaid</p>
            <p class="stat-value text-amber-500">{{ number_format($stats['unpaid']) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Need fee confirmation</p>
        </div>
        <div class="stat-icon" style="background: rgba(245,158,11,0.12);">
            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01m-7.938 4h15.876c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L2.34 17c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
    </div>
    <div class="stat-card">
        <div>
            <p class="stat-label">Collected</p>
            <p class="stat-value">{{ $settings['currency'] }} {{ number_format($stats['collected'], 2) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Paid application fee total</p>
        </div>
        <div class="stat-icon" style="background: rgba(139,92,246,0.12);">
            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a5 5 0 00-10 0v2m-2 0h14a2 2 0 012 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2z" />
            </svg>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-6 xl:grid-cols-[420px_minmax(0,1fr)]">
    <div class="admin-card p-6">
        <h2 class="brand-font text-base font-bold" style="color: var(--text-primary);">Fee Configuration</h2>
        <p class="mt-1 text-xs" style="color: var(--text-muted);">This fixed fee is applied to every application across universities, programs, and scholarships.</p>

        <form action="{{ route('admin.application_fees.settings') }}" method="POST" class="mt-5 space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Fee Amount</label>
                    <input type="number" step="0.01" min="0" name="application_fee_amount" value="{{ old('application_fee_amount', $settings['amount']) }}" class="mt-2 w-full rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Currency</label>
                    <input type="text" name="application_fee_currency" value="{{ old('application_fee_currency', $settings['currency']) }}" class="mt-2 w-full rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-[0.18em]" style="color: var(--text-muted);">Payment Instructions</label>
                <textarea name="application_fee_instructions" rows="5" class="mt-2 w-full rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">{{ old('application_fee_instructions', $settings['instructions']) }}</textarea>
            </div>

            <button type="submit" class="inline-flex items-center justify-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition hover:opacity-95" style="background: var(--accent);">
                Save Fee Settings
            </button>
        </form>
    </div>

    <div class="admin-card p-0 overflow-hidden">
        <div class="flex flex-col gap-4 border-b px-5 py-5 lg:flex-row lg:items-end lg:justify-between" style="border-color: var(--border);">
            <div>
                <h2 class="brand-font text-base font-bold" style="color: var(--text-primary);">Fee Monitoring</h2>
                <p class="text-xs mt-1" style="color: var(--text-muted);">Review the payment state of every application and fix exceptions from one place.</p>
            </div>

            <form method="GET" action="{{ route('admin.application_fees.index') }}" class="grid grid-cols-1 gap-3 md:grid-cols-[minmax(0,1.5fr)_190px_auto]">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by app ID, student, program, or ref" class="rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                <select name="fee_status" class="rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                    <option value="">All fee statuses</option>
                    <option value="paid" @selected(request('fee_status') === 'paid')>Paid</option>
                    <option value="unpaid" @selected(request('fee_status') === 'unpaid')>Unpaid</option>
                    <option value="waived" @selected(request('fee_status') === 'waived')>Waived</option>
                </select>
                <div class="flex gap-2">
                    <button type="submit" class="rounded-2xl px-4 py-3 text-sm font-bold text-white transition hover:opacity-95" style="background: var(--accent);">Filter</button>
                    <a href="{{ route('admin.application_fees.index') }}" class="rounded-2xl border px-4 py-3 text-sm font-bold transition hover:bg-gray-50 dark:hover:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">Reset</a>
                </div>
            </form>
        </div>

        @if($applications->count())
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($applications as $application)
                    @php
                        $feeStatusStyle = match ($application->application_fee_status) {
                            'paid' => 'background: rgba(16,185,129,0.12); color: #10b981;',
                            'waived' => 'background: rgba(59,130,246,0.12); color: #3b82f6;',
                            default => 'background: rgba(245,158,11,0.12); color: #f59e0b;',
                        };
                    @endphp
                    <div class="p-5">
                        <div class="flex flex-col gap-5 xl:flex-row xl:items-start xl:justify-between">
                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-center gap-3">
                                    <p class="text-base font-black brand-font" style="color: var(--text-primary);">{{ $application->application_number }}</p>
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide" style="{{ $feeStatusStyle }}">
                                        {{ $application->application_fee_status ?: 'unpaid' }}
                                    </span>
                                </div>
                                <div class="mt-2 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs" style="color: var(--text-muted);">
                                    <span class="font-semibold" style="color: var(--text-secondary);">{{ $application->student?->user?->name ?? 'Unknown Student' }}</span>
                                    <span class="hidden sm:inline">•</span>
                                    <span>{{ $application->program?->name ?? 'Program not available' }}</span>
                                    <span class="hidden sm:inline">•</span>
                                    <span>{{ $application->program?->university?->name ?? 'University not available' }}</span>
                                    @if($application->agent)
                                        <span class="hidden sm:inline">•</span>
                                        <span>Agent: {{ $application->agent->name }}</span>
                                    @endif
                                </div>
                                <div class="mt-3 flex flex-wrap gap-2 text-xs">
                                    <span class="inline-flex items-center rounded-xl border px-3 py-2" style="border-color: var(--border); color: var(--text-secondary);">
                                        Amount: {{ $application->application_fee_currency ?: $settings['currency'] }} {{ number_format((float) $application->application_fee_amount, 2) }}
                                    </span>
                                    <span class="inline-flex items-center rounded-xl border px-3 py-2" style="border-color: var(--border); color: var(--text-secondary);">
                                        Method: {{ $application->application_fee_method ? ucwords(str_replace('_', ' ', $application->application_fee_method)) : 'Not set' }}
                                    </span>
                                    <span class="inline-flex items-center rounded-xl border px-3 py-2 break-all" style="border-color: var(--border); color: var(--text-secondary);">
                                        Reference: {{ $application->application_fee_reference ?: 'Not provided' }}
                                    </span>
                                </div>
                            </div>

                            <form action="{{ route('admin.application_fees.update', $application->id) }}" method="POST" class="grid w-full gap-3 xl:w-[340px]">
                                @csrf
                                @method('PATCH')
                                <select name="application_fee_status" class="rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                                    <option value="paid" @selected($application->application_fee_status === 'paid')>Paid</option>
                                    <option value="unpaid" @selected($application->application_fee_status === 'unpaid')>Unpaid</option>
                                    <option value="waived" @selected($application->application_fee_status === 'waived')>Waived</option>
                                </select>
                                <input type="text" name="application_fee_reference" value="{{ $application->application_fee_reference }}" placeholder="Reference" class="rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                                <input type="text" name="application_fee_method" value="{{ $application->application_fee_method }}" placeholder="Method" class="rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                                <textarea name="application_fee_notes" rows="3" placeholder="Optional admin note" class="rounded-2xl border px-4 py-3 text-sm outline-none transition focus:border-[#f15a24] focus:ring-2 focus:ring-[#f15a24]/20 dark:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">{{ $application->application_fee_notes }}</textarea>
                                <button type="submit" class="rounded-2xl px-4 py-3 text-sm font-bold text-white transition hover:opacity-95" style="background: #0f2441;">
                                    Update Fee Status
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="border-t p-5" style="border-color: var(--border);">
                {{ $applications->links() }}
            </div>
        @else
            <div class="p-12 text-center">
                <p class="text-base font-semibold" style="color: var(--text-secondary);">No applications found</p>
                <p class="mt-2 text-sm" style="color: var(--text-muted);">Once students or agents submit applications, their fee records will appear here for monitoring.</p>
            </div>
        @endif
    </div>
</div>
@endsection
