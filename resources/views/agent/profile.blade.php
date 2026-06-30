@extends('layouts.agent')

@section('content')
<div class="mb-6"><h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">My Agent Profile</h1></div>
<div class="max-w-2xl bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100 dark:border-gray-700">
        <div class="w-16 h-16 rounded-2xl bg-[#f15a24] text-white flex items-center justify-center text-3xl font-black shadow">
            {{ substr(auth()->user()->name, 0, 1) }}
        </div>
        <div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->name }}</h3>
            <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
            <div class="flex items-center gap-2 mt-1">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold {{ $agentProfile->approval_status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ ucfirst($agentProfile->approval_status) }}
                </span>
                <span class="text-xs font-mono text-gray-400">REF: {{ $agentProfile->agent_reference }}</span>
            </div>
        </div>
    </div>
    <dl class="space-y-4 text-sm text-gray-700 dark:text-gray-300">
        <div class="flex justify-between"><dt class="text-gray-400">Company</dt><dd class="font-medium">{{ $agentProfile->company_name ?? 'N/A' }}</dd></div>
        <div class="flex justify-between"><dt class="text-gray-400">Phone</dt><dd class="font-medium">{{ $agentProfile->phone_number ?? 'N/A' }}</dd></div>
        <div class="flex justify-between"><dt class="text-gray-400">Country</dt><dd class="font-medium">{{ $agentProfile->country ?? 'N/A' }}</dd></div>
        <div class="flex justify-between"><dt class="text-gray-400">Agent Since</dt><dd class="font-medium">{{ $agentProfile->created_at->format('F Y') }}</dd></div>
    </dl>
</div>
@endsection
