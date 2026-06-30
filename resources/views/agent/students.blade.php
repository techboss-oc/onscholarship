@extends('layouts.agent')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">My Students</h1>
    <p class="text-sm text-gray-500 mt-1">Students who registered using your agent code: <strong class="text-[#f15a24]">{{ $agentProfile->agent_reference }}</strong></p>
</div>

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase text-gray-500 dark:text-gray-300 tracking-wider border-b border-gray-200 dark:border-gray-600">
                <tr>
                    <th class="p-4">Student</th>
                    <th class="p-4">Contact</th>
                    <th class="p-4">Joined</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($students as $sp)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-[#0f2441] text-white text-sm font-bold flex items-center justify-center">{{ substr($sp->user->name, 0, 1) }}</div>
                            <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ $sp->user->name }}</p>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-300">{{ $sp->user->email }}</td>
                    <td class="p-4 text-sm text-gray-400">{{ $sp->created_at->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="3" class="p-8 text-center text-gray-400">No students found with your agent code.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $students->links() }}</div>
@endsection
