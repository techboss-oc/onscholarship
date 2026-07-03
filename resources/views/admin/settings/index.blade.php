@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Website Settings</h1>
        <p class="text-sm text-gray-500 mt-1">Configure global application parameters, contact details, and SMTP connections.</p>
    </div>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm max-w-4xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="p-8">
        @csrf @method('PUT')
        
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 pb-2 border-b border-gray-100 dark:border-gray-700">General Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Company Name</label>
                <input type="text" name="company_name" value="{{ $settings['company_name'] ?? 'Onscholarship' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Contact Email</label>
                <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'info@onscholarship.com' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Contact Phone</label>
                <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+86 123 456 7890' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Office Address</label>
                <input type="text" name="office_address" value="{{ $settings['office_address'] ?? 'Haikou, Hainan Province, China' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
        </div>

        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 pb-2 border-b border-gray-100 dark:border-gray-700">SMTP Settings</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8 bg-blue-50/50 dark:bg-blue-900/10 p-5 rounded-2xl border border-blue-100 dark:border-blue-800/50">
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Mail Host</label>
                <input type="text" name="mail_host" value="{{ $settings['mail_host'] ?? env('MAIL_HOST', 'smtp.mailtrap.io') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Mail Port</label>
                    <input type="number" name="mail_port" value="{{ $settings['mail_port'] ?? env('MAIL_PORT', 2525) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Encryption</label>
                    <input type="text" name="mail_encryption" value="{{ $settings['mail_encryption'] ?? env('MAIL_ENCRYPTION', 'tls') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]" placeholder="tls / ssl">
                </div>
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Mail Username</label>
                <input type="text" name="mail_username" value="{{ $settings['mail_username'] ?? env('MAIL_USERNAME', '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Mail Password</label>
                <input type="password" name="mail_password" value="{{ $settings['mail_password'] ?? env('MAIL_PASSWORD', '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
        </div>

        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 pb-2 border-b border-gray-100 dark:border-gray-700">Payment Gateway Settings</h3>
        <div class="space-y-6 mb-8">
            <div class="bg-emerald-50/50 dark:bg-emerald-900/10 p-5 rounded-2xl border border-emerald-100 dark:border-emerald-800/50">
                <div class="flex items-center justify-between gap-4 mb-4">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">Paystack</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Configure Paystack for service charge and application fee collections.</p>
                    </div>
                    <label class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        <input type="hidden" name="paystack_enabled" value="0">
                        <input type="checkbox" name="paystack_enabled" value="1" {{ ($settings['paystack_enabled'] ?? '0') == '1' ? 'checked' : '' }} class="rounded border-gray-300 text-[#f15a24] focus:ring-[#f15a24]">
                        Enable
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Public Key</label>
                        <input type="text" name="paystack_public_key" value="{{ $settings['paystack_public_key'] ?? '' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Secret Key</label>
                        <input type="password" name="paystack_secret_key" value="{{ $settings['paystack_secret_key'] ?? '' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Currency</label>
                        <input type="text" name="paystack_currency" value="{{ $settings['paystack_currency'] ?? 'USD' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Webhook Secret</label>
                        <input type="password" name="paystack_webhook_secret" value="{{ $settings['paystack_webhook_secret'] ?? '' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                </div>
            </div>

            <div class="bg-blue-50/50 dark:bg-blue-900/10 p-5 rounded-2xl border border-blue-100 dark:border-blue-800/50">
                <div class="flex items-center justify-between gap-4 mb-4">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">Flutterwave</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Configure Flutterwave as an additional payment processing option.</p>
                    </div>
                    <label class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        <input type="hidden" name="flutterwave_enabled" value="0">
                        <input type="checkbox" name="flutterwave_enabled" value="1" {{ ($settings['flutterwave_enabled'] ?? '0') == '1' ? 'checked' : '' }} class="rounded border-gray-300 text-[#f15a24] focus:ring-[#f15a24]">
                        Enable
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Public Key</label>
                        <input type="text" name="flutterwave_public_key" value="{{ $settings['flutterwave_public_key'] ?? '' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Secret Key</label>
                        <input type="password" name="flutterwave_secret_key" value="{{ $settings['flutterwave_secret_key'] ?? '' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Encryption Key</label>
                        <input type="password" name="flutterwave_encryption_key" value="{{ $settings['flutterwave_encryption_key'] ?? '' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Currency</label>
                        <input type="text" name="flutterwave_currency" value="{{ $settings['flutterwave_currency'] ?? 'USD' }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">Save Settings</button>
        </div>
    </form>
</div>
@endsection
