@extends('layouts.agent')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Student Applications</h1>
        <p class="text-sm text-gray-500 mt-1">Track the application status of your referred students.</p>
    </div>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">App ID</th>
                    <th class="p-4">Student</th>
                    <th class="p-4">Program & University</th>
                    <th class="p-4 text-center">Status</th>
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
                    </td>
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-900 dark:text-white max-w-[250px] truncate" title="{{ $app->program->name }}">{{ $app->program->name }}</p>
                        <p class="text-xs text-gray-500 max-w-[250px] truncate">{{ $app->program->university->name }}</p>
                    </td>
                    <td class="p-4 text-center">
                        @if($app->status === 'pending')
                            <span class="px-2.5 py-1 bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 text-xs font-bold rounded-full uppercase tracking-wider">Pending</span>
                        @elseif($app->status === 'processing')
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400 text-xs font-bold rounded-full uppercase tracking-wider">Processing</span>
                        @elseif($app->status === 'accepted' || $app->status === 'enrolled')
                            <span class="px-2.5 py-1 bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 text-xs font-bold rounded-full uppercase tracking-wider">{{ $app->status }}</span>
                        @else
                            <span class="px-2.5 py-1 bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 text-xs font-bold rounded-full uppercase tracking-wider">Rejected</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ $app->created_at->format('M d, Y') }}</td>
                    <td class="p-4 text-right">
                        <a href="{{ route('agent.applications.show', $app->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-xs font-medium transition">View</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-8 text-center text-gray-400">Your students have not submitted any applications yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $applications->links() }}</div>
@endsection
