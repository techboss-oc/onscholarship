@extends('layouts.student')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-black text-[#0f2441] dark:text-white brand-font">Welcome back, {{ auth()->user()->name }}!</h1>
    <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Track your application journey from here.</p>
</div>

<!-- Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
    <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $applications->count() }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Applications</p>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f15a24] flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
        </div>
        <div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $documents->count() }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Documents</p>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        <div>
            <p class="text-2xl font-black text-gray-900 dark:text-white">
                {{ $applications->where('status','accepted')->count() }}
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Accepted</p>
        </div>
    </div>
</div>

<!-- Profile Completion Banner -->
@php $profileComplete = $profile && $profile->passport_number && $profile->date_of_birth; @endphp
@if(!$profileComplete)
<div class="bg-gradient-to-r from-[#f15a24] to-orange-400 text-white p-5 rounded-2xl mb-8 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-lg">
    <div>
        <h3 class="font-bold text-lg brand-font">Complete Your Profile</h3>
        <p class="text-sm opacity-90">Add your passport number & date of birth to start applying.</p>
    </div>
    <a href="{{ route('student.profile') }}" class="shrink-0 px-6 py-2.5 bg-white text-[#f15a24] font-bold rounded-xl hover:bg-gray-50 transition">
        Update Profile
    </a>
</div>
@endif

@if($pendingServiceChargeApplications->count())
<div class="bg-gradient-to-r from-[#0f2441] to-[#1f4e8c] text-white p-5 rounded-2xl mb-8 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-lg">
    <div>
        <h3 class="font-bold text-lg brand-font">Service Charge Payment Needed</h3>
        <p class="text-sm opacity-90">Your accepted application for {{ $pendingServiceChargeApplications->first()->program->name ?? 'your program' }} is waiting for the admission service charge.</p>
    </div>
    <a href="{{ route('student.applications.service_charge', $pendingServiceChargeApplications->first()->id) }}" class="shrink-0 px-6 py-2.5 bg-white text-[#0f2441] font-bold rounded-xl hover:bg-gray-50 transition">
        Pay Now
    </a>
</div>
@endif

<!-- Recent Applications -->
<div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden mb-8">
    <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700">
        <h3 class="font-bold text-lg brand-font text-gray-900 dark:text-white">Recent Applications</h3>
        <a href="{{ route('student.applications.index') }}" class="text-sm text-[#f15a24] font-semibold hover:underline">View all</a>
    </div>
    @forelse($applications as $app)
    <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 border-b border-gray-50 dark:border-gray-700 last:border-0">
        <div>
            <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ $app->program->name ?? 'Program N/A' }}</p>
            <p class="text-xs text-gray-400">{{ $app->program->university->name ?? '' }} • {{ $app->intake_semester }} {{ $app->intake_year }}</p>
            <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-1">Application Fee: {{ $app->application_fee_currency ?: 'USD' }} {{ number_format((float) $app->application_fee_amount, 2) }} • Service Charge: {{ $app->service_charge_currency ?: 'USD' }} {{ number_format((float) $app->service_charge_amount, 2) }}</p>
        </div>
        @php
            $colors = ['draft'=>'bg-gray-100 text-gray-600','submitted'=>'bg-yellow-100 text-yellow-700','under_review'=>'bg-blue-100 text-blue-700','documents_required'=>'bg-orange-100 text-orange-700','accepted'=>'bg-green-100 text-green-700','offer_letter_issued'=>'bg-emerald-100 text-emerald-700','visa_processing'=>'bg-indigo-100 text-indigo-700','completed'=>'bg-teal-100 text-teal-700','rejected'=>'bg-red-100 text-red-700'];
            $color = $colors[$app->status] ?? 'bg-gray-100 text-gray-600';
        @endphp
        <div class="text-right">
            <span class="px-2.5 py-1 text-xs font-bold rounded-md {{ $color }} uppercase">{{ str_replace('_', ' ', $app->status) }}</span>
            @if(in_array($app->status, ['accepted', 'offer_letter_issued', 'visa_processing'], true) && !in_array($app->service_charge_status, ['paid', 'waived'], true))
                <div class="mt-2">
                    <a href="{{ route('student.applications.service_charge', $app->id) }}" class="inline-flex px-3 py-1.5 bg-[#f15a24] text-white rounded-lg text-[11px] font-bold hover:bg-[#d94a1c] transition">Pay Service Charge</a>
                </div>
            @endif
        </div>
    </div>
    @empty
    <div class="p-8 text-center text-gray-400 text-sm">
        <p class="mb-3">No applications yet.</p>
        <a href="{{ route('student.applications.create') }}" class="text-[#f15a24] font-bold">Create your first application →</a>
    </div>
    @endforelse
</div>

<div class="flex justify-center">
    <a href="{{ route('student.applications.create') }}" class="px-8 py-3 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">
        + New Application
    </a>
</div>
@endsection
