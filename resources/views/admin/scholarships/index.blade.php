@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Scholarship Management</h1>
        <p class="text-sm text-gray-500 mt-1">Create and manage scholarship funding opportunities.</p>
    </div>
    <a href="{{ route('admin.scholarships.create') }}" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + Add Scholarship
    </a>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">Scholarship</th>
                    <th class="p-4">Type</th>
                    <th class="p-4">Degree</th>
                    <th class="p-4">Deadline</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($scholarships as $s)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="p-4 font-semibold text-gray-900 dark:text-white text-sm max-w-xs truncate">{{ $s->name }}</td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ ucfirst(str_replace('_',' ',$s->funding_type)) }}</td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ ucfirst($s->degree_type) }}</td>
                    <td class="p-4 text-sm {{ \Carbon\Carbon::parse($s->deadline)->isPast() ? 'text-red-500' : 'text-gray-600 dark:text-gray-400' }}">{{ \Carbon\Carbon::parse($s->deadline)->format('M d, Y') }}</td>
                    <td class="p-4">
                        @if($s->is_active)
                            <span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-md">Active</span>
                        @else
                            <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-md">Inactive</span>
                        @endif
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.scholarships.edit', $s->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-xs font-medium transition">Edit</a>
                            <form action="{{ route('admin.scholarships.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Delete scholarship?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg text-xs font-medium transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-8 text-center text-gray-400">No scholarships yet. <a href="{{ route('admin.scholarships.create') }}" class="text-[#f15a24] font-bold">Create one →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $scholarships->links() }}</div>
@endsection
