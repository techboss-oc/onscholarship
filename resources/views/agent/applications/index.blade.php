@extends('layouts.agent')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Student Applications</h1>
        <p class="text-sm text-gray-500 mt-1">Track the application status of your referred students.</p>
    </div>
    <a href="{{ route('agent.applications.create') }}" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + New Application
    </a>
</div>

@if($pendingServiceChargeApplications->count())
<div class="mb-6 rounded-3xl border border-[#f15a24]/20 bg-[#f15a24]/10 p-5">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#f15a24]">Action Needed</p>
            <h2 class="mt-2 text-lg font-black text-[#0f2441] dark:text-white brand-font">Service Charge Required For Accepted Application</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">At least one managed student has an accepted application waiting for the program service charge.</p>
        </div>
        <a href="{{ route('agent.applications.service_charge', $pendingServiceChargeApplications->first()->id) }}" class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition hover:opacity-95" style="background: #0f2441;">
            Pay Service Charge
        </a>
    </div>
</div>
@endif

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">App ID</th>
                    <th class="p-4">Student</th>
                    <th class="p-4">Program & University</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-center">Service Charge</th>
                    <th class="p-4">Submitted</th>
                    <th class="p-4 text-right">Details</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($applications as $app)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                    <td class="p-4 text-sm font-medium text-gray-500">#{{ str_pad($app->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $app->student->user->name }}</p>
                        <p class="text-[11px] text-gray-400 mt-1">App Fee: {{ $app->application_fee_currency ?: 'USD' }} {{ number_format((float) $app->application_fee_amount, 2) }}</p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-900 dark:text-white max-w-[250px] truncate" title="{{ $app->program->name }}">{{ $app->program->name }}</p>
                        <p class="text-xs text-gray-500 max-w-[250px] truncate">{{ $app->program->university->name }}</p>
                        <p class="text-[11px] text-gray-400 mt-1">Service: {{ $app->service_charge_currency ?: 'USD' }} {{ number_format((float) $app->service_charge_amount, 2) }}</p>
                    </td>
                    <td class="p-4 text-center">
                        @if($app->status === 'submitted')
                        <span class="px-2.5 py-1 bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 text-xs font-bold rounded-full uppercase tracking-wider">Submitted</span>
                        @elseif($app->status === 'under_review')
                        <span class="px-2.5 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400 text-xs font-bold rounded-full uppercase tracking-wider">Under Review</span>
                        @elseif(in_array($app->status, ['accepted', 'offer_letter_issued', 'visa_processing', 'completed'], true))
                        <span class="px-2.5 py-1 bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 text-xs font-bold rounded-full uppercase tracking-wider">{{ str_replace('_', ' ', $app->status) }}</span>
                        @elseif($app->status === 'documents_required')
                        <span class="px-2.5 py-1 bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-400 text-xs font-bold rounded-full uppercase tracking-wider">Documents Required</span>
                        @else
                        <span class="px-2.5 py-1 bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 text-xs font-bold rounded-full uppercase tracking-wider">{{ str_replace('_', ' ', $app->status) }}</span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        @if($app->service_charge_status === 'paid')
                        <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400 text-xs font-bold rounded-full uppercase tracking-wider">Paid</span>
                        @elseif($app->service_charge_status === 'waived')
                        <span class="px-2.5 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400 text-xs font-bold rounded-full uppercase tracking-wider">Waived</span>
                        @else
                        <span class="px-2.5 py-1 bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400 text-xs font-bold rounded-full uppercase tracking-wider">Unpaid</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ $app->created_at->format('M d, Y') }}</td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            @if(in_array($app->status, ['accepted', 'offer_letter_issued', 'visa_processing'], true) && !in_array($app->service_charge_status, ['paid', 'waived'], true))
                            <a href="{{ route('agent.applications.service_charge', $app->id) }}" class="px-3 py-1.5 bg-[#f15a24] text-white hover:bg-[#d94a1c] rounded-lg text-xs font-bold transition">Pay</a>
                            @endif
                            <a href="{{ route('agent.applications.show', $app->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-xs font-medium transition">View</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-400">Your students have not submitted any applications yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $applications->links() }}</div>
@endsection