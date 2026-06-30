@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Blog Categories</h1>
        <p class="text-sm text-gray-500 mt-1">Manage article categories for your blog.</p>
    </div>
    <a href="{{ route('admin.blog_categories.create') }}" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + Add Category
    </a>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Slug</th>
                    <th class="p-4">Total Posts</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                    <td class="p-4 font-semibold text-gray-900 dark:text-white text-sm">{{ $category->name }}</td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ $category->slug }}</td>
                    <td class="p-4 text-sm font-bold text-gray-800 dark:text-gray-200">{{ $category->posts_count }}</td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.blog_categories.edit', $category->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-xs font-medium transition">Edit</a>
                            @if($category->posts_count == 0)
                            <form action="{{ route('admin.blog_categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg text-xs font-medium transition">Delete</button>
                            </form>
                            @else
                                <span class="px-3 py-1.5 text-gray-400 text-xs" title="Cannot delete category with posts">In Use</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="p-8 text-center text-gray-400">No categories found. <a href="{{ route('admin.blog_categories.create') }}" class="text-[#f15a24] font-bold">Add one now →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $categories->links() }}</div>
@endsection
