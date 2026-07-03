@extends('layouts.student')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">My Applications</h1>
    <a href="{{ route('student.applications.create') }}" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + New Application
    </a>
</div>

@if($pendingServiceChargeApplications->count())
<div class="mb-6 rounded-3xl border border-[#f15a24]/20 bg-[#f15a24]/10 p-5">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#f15a24]">Payment Prompt</p>
            <h2 class="mt-2 text-lg font-black text-[#0f2441] dark:text-white brand-font">Service Charge Needed To Continue Processing</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">One or more applications have been accepted and now require the program service charge before admission processing can continue.</p>
        </div>
        <a href="{{ route('student.applications.service_charge', $pendingServiceChargeApplications->first()->id) }}" class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition hover:opacity-95" style="background: #0f2441;">
            Pay Service Charge
        </a>
    </div>
</div>
@endif

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    @forelse($applications as $app)
    <div class="p-5 border-b border-gray-100 dark:border-gray-700 last:border-0 hover:bg-gray-50 dark:hover:bg-gray-700/50">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white">{{ $app->program->name ?? 'Program N/A' }}</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $app->program->university->name ?? '' }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ ucfirst($app->intake_semester) }} {{ $app->intake_year }} • Applied {{ $app->created_at->format('M d, Y') }}</p>
                <div class="mt-3 flex flex-wrap gap-2 text-[11px]">
                    <span class="px-3 py-1 rounded-lg bg-slate-100 text-slate-700 dark:bg-slate-700/60 dark:text-slate-200 font-bold uppercase">
                        App Fee {{ $app->application_fee_currency ?: 'USD' }} {{ number_format((float) $app->application_fee_amount, 2) }}
                    </span>
                    <span class="px-3 py-1 rounded-lg bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-300 font-bold uppercase">
                        Service Charge {{ $app->service_charge_currency ?: 'USD' }} {{ number_format((float) $app->service_charge_amount, 2) }}
                    </span>
                </div>
            </div>
            @php
            $colors = ['draft'=>'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300','submitted'=>'bg-yellow-100 text-yellow-700','under_review'=>'bg-blue-100 text-blue-700','documents_required'=>'bg-orange-100 text-orange-700','accepted'=>'bg-green-100 text-green-700','offer_letter_issued'=>'bg-emerald-100 text-emerald-700','visa_processing'=>'bg-indigo-100 text-indigo-700','completed'=>'bg-teal-100 text-teal-700','rejected'=>'bg-red-100 text-red-700'];
            $c = $colors[$app->status] ?? 'bg-gray-100 text-gray-600';
            @endphp
            <div class="shrink-0 text-right">
                <span class="px-3 py-1 text-xs font-bold rounded-lg {{ $c }} uppercase">{{ str_replace('_', ' ', $app->status) }}</span>
                <div class="mt-2">
                    <span class="px-3 py-1 text-[11px] font-bold rounded-lg uppercase {{ $app->application_fee_status === 'paid' ? 'bg-emerald-100 text-emerald-700' : ($app->application_fee_status === 'waived' ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700') }}">
                        App Fee {{ $app->application_fee_status ?: 'unpaid' }}
                    </span>
                </div>
                <div class="mt-2">
                    <span class="px-3 py-1 text-[11px] font-bold rounded-lg uppercase {{ $app->service_charge_status === 'paid' ? 'bg-emerald-100 text-emerald-700' : ($app->service_charge_status === 'waived' ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700') }}">
                        Service {{ $app->service_charge_status ?: 'unpaid' }}
                    </span>
                </div>
            </div>
        </div>
        @if(in_array($app->status, ['accepted', 'offer_letter_issued', 'visa_processing'], true) && !in_array($app->service_charge_status, ['paid', 'waived'], true))
        <div class="mt-4 flex items-center justify-between rounded-2xl border border-[#f15a24]/20 bg-[#f15a24]/10 px-4 py-3">
            <div>
                <p class="text-sm font-bold text-[#0f2441] dark:text-white">Admission service charge is now due</p>
                <p class="text-xs text-gray-600 dark:text-gray-300 mt-1">Pay {{ $app->service_charge_currency ?: 'USD' }} {{ number_format((float) $app->service_charge_amount, 2) }} to continue processing this application.</p>
            </div>
            <a href="{{ route('student.applications.service_charge', $app->id) }}" class="px-4 py-2 bg-[#0f2441] text-white text-xs font-bold rounded-xl hover:opacity-95 transition">
                Pay Now
            </a>
        </div>
        @endif
    </div>
    @empty
    <div class="p-12 text-center text-gray-400">
        <p class="text-lg font-medium mb-3">No applications yet</p>
        <a href="{{ route('student.applications.create') }}" class="text-[#f15a24] font-bold hover:underline">Start your first application →</a>
    </div>
    @endforelse
</div>
@if($applications->hasPages())
<div class="mt-6 flex justify-center">{{ $applications->links() }}</div>
@endif
@endsection