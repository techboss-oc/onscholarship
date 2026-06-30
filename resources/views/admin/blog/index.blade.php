@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Blog Posts</h1>
        <p class="text-sm text-gray-500 mt-1">Manage articles published on the website.</p>
    </div>
    <a href="{{ route('admin.blog.create') }}" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + Add Post
    </a>
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/80 dark:bg-gray-800/80 text-xs uppercase text-gray-500 tracking-wider border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="p-4">Post Title</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Author</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Published At</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($posts as $post)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shadow-sm shrink-0">
                                @if($post->featured_image)
                                    <img src="{{ Storage::url($post->featured_image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 font-bold bg-gray-100">?</div>
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white text-sm line-clamp-1 break-all">{{ $post->title }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $post->views }} views</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ $post->category->name }}</td>
                    <td class="p-4 text-sm text-gray-600 dark:text-gray-400">{{ optional($post->author)->name ?? 'System' }}</td>
                    <td class="p-4">
                        @if($post->status == 'published')
                            <span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-md">Published</span>
                        @else
                            <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-md capitalize">{{ $post->status }}</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm text-gray-500">{{ $post->published_at ? $post->published_at->format('M d, Y') : '-' }}</td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.blog.edit', $post->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-xs font-medium transition">Edit</a>
                            <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg text-xs font-medium transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-8 text-center text-gray-400">No blog posts found. <a href="{{ route('admin.blog.create') }}" class="text-[#f15a24] font-bold">Write one now →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $posts->links() }}</div>
@endsection
