@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Application Management</h1>
        <p class="text-sm text-gray-500 mt-1">Review and update student university applications.</p>
    </div>
    
    <div class="flex gap-2">
        <a href="{{ route('admin.applications.index') }}" class="px-3 py-1.5 {{ !request('status') ? 'bg-[#f15a24] text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200' }} rounded-lg text-sm font-medium transition">All</a>
        <a href="{{ route('admin.applications.index', ['status' => 'pending']) }}" class="px-3 py-1.5 {{ request('status') == 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200' }} rounded-lg text-sm font-medium transition">Pending</a>
        <a href="{{ route('admin.applications.index', ['status' => 'processing']) }}" class="px-3 py-1.5 {{ request('status') == 'processing' ? 'bg-blue-500 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200' }} rounded-lg text-sm font-medium transition">Processing</a>
        <a href="{{ route('admin.applications.index', ['status' => 'accepted']) }}" class="px-3 py-1.5 {{ request('status') == 'accepted' ? 'bg-green-500 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200' }} rounded-lg text-sm font-medium transition">Accepted</a>
    </div>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Student</th>
                    <th class="p-4">Program & University</th>
                    <th class="p-4 flex justify-center">Status</th>
                    <th class="p-4">Date</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($applications as $app)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                    <td class="p-4 text-sm font-medium text-gray-500">#{{ str_pad($app->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $app->student->user->name }}</p>
                        <p class="text-xs text-gray-500">{{ $app->student->nationality ?? 'No Nationality' }}</p>
                    </td>
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-900 dark:text-white max-w-[250px] truncate" title="{{ $app->program->name }}">{{ $app->program->name }}</p>
                        <p class="text-xs text-gray-500 max-w-[250px] truncate">{{ $app->program->university->name }}</p>
                    </td>
                    <td class="p-4 flex justify-center">
                        @if($app->status === 'pending')
                            <span class="px-2.5 py-1 bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-800 text-xs font-bold rounded-full uppercase tracking-widest">Pending</span>
                        @elseif($app->status === 'processing')
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400 border border-blue-200 dark:border-blue-800 text-xs font-bold rounded-full uppercase tracking-widest">Processing</span>
                        @elseif($app->status === 'accepted' || $app->status === 'enrolled')
                            <span class="px-2.5 py-1 bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800 text-xs font-bold rounded-full uppercase tracking-widest">{{ $app->status }}</span>
                        @else
                            <span class="px-2.5 py-1 bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800 text-xs font-bold rounded-full uppercase tracking-widest">Rejected</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ $app->created_at->format('M d, Y') }}</td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.applications.show', $app->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 bg-[#f15a24]/10 text-[#f15a24] hover:bg-[#f15a24]/20 rounded-lg text-xs font-bold transition">
                            Process &rarr;
                        </a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-8 text-center text-gray-400">No applications found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $applications->links() }}</div>
@endsection
