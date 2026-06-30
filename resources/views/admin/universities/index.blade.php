@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">University Management</h1>
        <p class="text-sm text-gray-500 mt-1">Manage all partner universities and their programs.</p>
    </div>
    <a href="{{ route('admin.universities.create') }}" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + Add University
    </a>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">University</th>
                    <th class="p-4">Location</th>
                    <th class="p-4">Programs</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($universities as $uni)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#0f2441] text-white font-black flex items-center justify-center text-sm shadow-sm">
                                {{ substr($uni->name, 0, 1) }}
                            </div>
                            <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ $uni->name }}</p>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ $uni->city }}, {{ $uni->province }}</td>
                    <td class="p-4 text-sm font-bold text-gray-800 dark:text-gray-200">{{ $uni->programs_count }}</td>
                    <td class="p-4">
                        @if($uni->is_active)
                            <span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-md">Active</span>
                        @else
                            <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-md">Inactive</span>
                        @endif
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.universities.edit', $uni->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-xs font-medium transition">Edit</a>
                            <form action="{{ route('admin.universities.destroy', $uni->id) }}" method="POST" onsubmit="return confirm('Delete this university?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg text-xs font-medium transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="p-8 text-center text-gray-400">No universities found. <a href="{{ route('admin.universities.create') }}" class="text-[#f15a24] font-bold">Add one now →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $universities->links() }}</div>
@endsection
