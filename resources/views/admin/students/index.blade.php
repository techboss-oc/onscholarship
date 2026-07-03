@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Student Roster</h1>
        <p class="text-sm text-gray-500 mt-1">View all registered students in the system.</p>
    </div>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email / Phone</th>
                    <th class="p-4">Nationality</th>
                    <th class="p-4">Agent</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($students as $s)
                @php
                    $studentUser = $s->user;
                    $studentName = $studentUser?->name ?? ($s->full_name ?: 'Unknown Student');
                    $studentEmail = $studentUser?->email ?? 'No email available';
                    $agentName = $s->agent?->company_name ?? $s->agent?->user?->name;
                @endphp
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                    <td class="p-4 text-sm font-bold text-gray-900 dark:text-white">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                                {{ strtoupper(substr($studentName, 0, 1)) }}
                            </div>
                            {{ $studentName }}
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ $studentEmail }}<br>
                        <span class="text-xs text-gray-500">{{ $s->phone ?? 'No Phone' }}</span>
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ $s->nationality ?? 'N/A' }}
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">
                        @if($s->agent)
                            <span class="px-2.5 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-md">{{ $agentName ?? 'Assigned Agent' }}</span>
                        @else
                            <span class="text-gray-400 italic">Direct</span>
                        @endif
                    </td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.students.show', $s->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-xs font-medium transition">View Profile</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="p-8 text-center text-gray-400">No students registered yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $students->links() }}</div>
@endsection
