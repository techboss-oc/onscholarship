@extends('layouts.admin')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-[#0f2441] dark:text-white brand-font">Agent Directory & Approvals</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Review, approve, and manage B2B educational partners on the platform.</p>
    </div>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-800/50 text-gray-600 dark:text-gray-300 text-xs uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">
                    <th class="p-4 font-semibold">Agent Info</th>
                    <th class="p-4 font-semibold">Company / Ref</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold">Joined</th>
                    <th class="p-4 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($agents as $agentProfile)
                @php
                    $agentUser = $agentProfile->user;
                    $agentName = $agentUser?->name ?? 'Unknown Agent';
                    $agentEmail = $agentUser?->email ?? 'No email available';
                @endphp
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#0f2441] text-white flex items-center justify-center font-bold shadow-sm shrink-0">
                                {{ strtoupper(substr($agentName, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 dark:text-white">{{ $agentName }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $agentEmail }}</p>
                                <p class="text-xs text-gray-400">{{ $agentProfile->phone_number }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <p class="font-medium text-gray-800 dark:text-gray-200">{{ $agentProfile->company_name ?? 'Individual Agent' }}</p>
                        <p class="text-xs text-gray-400 font-mono mt-1">REF: {{ $agentProfile->agent_reference }}</p>
                    </td>
                    <td class="p-4">
                        @if($agentProfile->approval_status === 'approved')
                            <span class="px-2.5 py-1 bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 text-xs font-bold rounded-md uppercase tracking-wide">Approved</span>
                        @elseif($agentProfile->approval_status === 'suspended')
                            <span class="px-2.5 py-1 bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 text-xs font-bold rounded-md uppercase tracking-wide">Suspended</span>
                        @else
                            <span class="px-2.5 py-1 bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-400 text-xs font-bold rounded-md uppercase tracking-wide">Pending</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm text-gray-500 dark:text-gray-400">
                        {{ $agentProfile->created_at->format('M d, Y') }}<br>
                        <span class="text-xs">{{ $agentProfile->created_at->diffForHumans() }}</span>
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <!-- Approve Button -->
                            @if($agentProfile->approval_status !== 'approved')
                            <form action="{{ route('admin.agents.approve', $agentProfile->id) }}" method="POST" onsubmit="return confirm('Ensure you have vetted this agent. Proceed to approve?');">
                                @csrf
                                <button type="submit" class="px-3 py-1.5 bg-green-500 text-white hover:bg-green-600 rounded-lg text-sm font-medium shadow-sm transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Approve
                                </button>
                            </form>
                            @endif

                            <!-- Suspend Button -->
                            @if($agentProfile->approval_status === 'approved' || $agentProfile->approval_status === 'pending')
                            <form action="{{ route('admin.agents.suspend', $agentProfile->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to suspend this agent\'s access?');">
                                @csrf
                                <button type="submit" class="px-3 py-1.5 bg-red-500 text-white hover:bg-red-600 rounded-lg text-sm font-medium shadow-sm transition flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                    Suspend
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500 dark:text-gray-400">
                        <svg class="w-12 h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <p class="font-medium text-lg">No agents found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6 flex justify-center">
    {{ $agents->links() }}
</div>

@endsection
