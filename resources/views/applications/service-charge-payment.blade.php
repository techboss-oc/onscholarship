@extends($layoutName)

@section('content')
<div class="mb-6">
    <a href="{{ $backRoute }}" class="text-sm text-[#f15a24] font-semibold hover:underline">&larr; Back</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-3">{{ $flowLabel }}</h1>
    <p class="text-sm text-gray-500 mt-2">Your application has moved forward. Complete the service charge to continue admission processing and support.</p>
</div>

<div class="grid grid-cols-1 xl:grid-cols-[minmax(0,1.15fr)_360px] gap-6">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="mb-6 rounded-2xl border border-[#f15a24]/20 bg-[#f15a24]/10 px-5 py-4">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#f15a24]">Next Admission Step</p>
            <p class="mt-2 text-sm text-[#0f2441] dark:text-white">{{ $serviceCharge['instructions'] }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ $payerLabel }}</label>
                <input type="text" readonly value="{{ $studentName }}" class="w-full rounded-xl border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Program</label>
                <input type="text" readonly value="{{ $application->program->name }} - {{ $application->program->university->name }}" class="w-full rounded-xl border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>
        </div>

        <div class="mb-6 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/30 p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Current Application Status</p>
                    <p class="mt-2 text-sm font-semibold text-gray-900 dark:text-white">{{ str_replace('_', ' ', $application->status) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Service Charge</p>
                    <p class="mt-2 text-2xl font-black text-[#f15a24] brand-font">{{ $serviceCharge['currency'] }} {{ number_format($serviceCharge['amount'], 2) }}</p>
                </div>
            </div>
        </div>

        <form action="{{ $submitRoute }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Choose Gateway <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($gatewayOptions as $gatewayKey => $gateway)
                        <label class="rounded-2xl border border-gray-200 dark:border-gray-700 px-4 py-4 cursor-pointer transition hover:border-[#f15a24] hover:bg-[#f15a24]/5">
                            <div class="flex items-start gap-3">
                                <input type="radio" name="payment_gateway" value="{{ $gatewayKey }}" {{ old('payment_gateway', $loop->first ? $gatewayKey : '') === $gatewayKey ? 'checked' : '' }} class="mt-1 text-[#f15a24] focus:ring-[#f15a24]">
                                <div>
                                    <p class="font-bold text-gray-900 dark:text-white">{{ $gateway['label'] }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Configured currency: {{ $gateway['currency'] }}</p>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('payment_gateway')<p class="text-red-500 text-xs mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Transaction Reference <span class="text-red-500">*</span></label>
                    <input type="text" name="payment_reference" value="{{ old('payment_reference') }}" required placeholder="Gateway transaction reference" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    @error('payment_reference')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Application Number</label>
                    <input type="text" readonly value="{{ $application->application_number }}" class="w-full rounded-xl border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Notes</label>
                <textarea name="payment_notes" rows="4" placeholder="Optional notes for admin review or gateway payment remarks." class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">{{ old('payment_notes') }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ $dashboardRoute }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">
                    Confirm Service Charge Payment
                </button>
            </div>
        </form>
    </div>

    <div class="space-y-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-base font-bold text-[#0f2441] dark:text-white brand-font">Why This Matters</h2>
            <ul class="mt-4 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                <li>1. Confirms the admission processing stage after acceptance.</li>
                <li>2. Supports offer follow-up, documentation, and next-step handling.</li>
                <li>3. Keeps the application moving without avoidable admin delays.</li>
            </ul>
        </div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Fee Snapshot</p>
            <div class="mt-3 flex items-end gap-2">
                <p class="text-3xl font-black text-[#0f2441] dark:text-white brand-font">{{ $serviceCharge['currency'] }}</p>
                <p class="text-4xl font-black text-[#f15a24] brand-font">{{ number_format($serviceCharge['amount'], 2) }}</p>
            </div>
            <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">This amount comes from the selected program and can differ from other courses.</p>
        </div>
    </div>
</div>
@endsection
