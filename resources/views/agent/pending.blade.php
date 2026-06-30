<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Pending Approval') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-l-4 border-yellow-500">
                    <h3 class="text-lg font-medium text-yellow-800">Your agent account is currently under review.</h3>
                    <p class="mt-2">Thank you for registering. Our administration team is reviewing your application. You will be notified via email once approved and will gain access to your dashboard functionalities.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
