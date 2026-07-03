@extends($layoutName)

@section('content')
<div class="mb-6">
    <a href="{{ $backRoute }}" class="text-sm text-[#f15a24] font-semibold hover:underline">&larr; Back to Application Form</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-3">{{ $flowLabel }}</h1>
    <p class="text-sm text-gray-500 mt-2">Complete the application fee so the application can move into admission processing.</p>
</div>

<div class="grid grid-cols-1 xl:grid-cols-[minmax(0,1.2fr)_380px] gap-6">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="mb-6 rounded-2xl border border-[#0D47A1]/20 bg-[#0D47A1]/10 px-5 py-4">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#0D47A1] dark:text-blue-300">Processing Notice</p>
            <p class="mt-2 text-sm text-[#0f2441] dark:text-white">{{ $applicationFee['instructions'] }}</p>
        </div>

        <form action="{{ $submitRoute }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ $payerLabel }}</label>
                    <input type="text" value="{{ $studentName }}" readonly class="w-full rounded-xl border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Program</label>
                    <input type="text" value="{{ $program->name }} - {{ $program->university->name }}" readonly class="w-full rounded-xl border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            @if($showStudentContext)
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 dark:border-emerald-800/60 dark:bg-emerald-900/20 dark:text-emerald-300">
                    This payment is being recorded by the agent on behalf of the selected student.
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Method <span class="text-red-500">*</span></label>
                    <select name="payment_method" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                        <option value="">-- Select method --</option>
                        <option value="card" {{ old('payment_method') === 'card' ? 'selected' : '' }}>Card Payment</option>
                        <option value="bank_transfer" {{ old('payment_method') === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                        <option value="mobile_money" {{ old('payment_method') === 'mobile_money' ? 'selected' : '' }}>Mobile Money</option>
                    </select>
                    @error('payment_method')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Reference <span class="text-red-500">*</span></label>
                    <input type="text" name="payment_reference" value="{{ old('payment_reference') }}" placeholder="Transaction ID / receipt reference" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    @error('payment_reference')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Notes</label>
                <textarea name="payment_notes" rows="4" placeholder="Optional notes for the admin team, such as payer name, transfer details, or receipt remarks." class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('payment_notes') }}</textarea>
                @error('payment_notes')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ $dashboardRoute }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">
                    Confirm Fee Payment
                </button>
            </div>
        </form>
    </div>

    <div class="space-y-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Application Fee</p>
            <div class="mt-3 flex items-end gap-2">
                <p class="text-3xl font-black text-[#0f2441] dark:text-white brand-font">{{ $applicationFee['currency'] }}</p>
                <p class="text-4xl font-black text-[#f15a24] brand-font">{{ number_format($applicationFee['amount'], 2) }}</p>
            </div>
            <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">This fee is fixed globally for every university, program, and scholarship application on the platform.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-base font-bold text-[#0f2441] dark:text-white brand-font">What Happens Next</h2>
            <ul class="mt-4 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                <li>1. Your payment reference is recorded on the application.</li>
                <li>2. The application is submitted for admin review.</li>
                <li>3. Document verification and admission processing can begin.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
