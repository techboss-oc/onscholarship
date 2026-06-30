@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.blog.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back to Posts</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Edit Post</h1>
</div>

<div class="max-w-4xl admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700">
    <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-5">
            <div class="md:col-span-2 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Post Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" value="{{ old('title', $post->title) }}">
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Excerpt</label>
                    <textarea name="excerpt" rows="2" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="15" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('content', $post->content) }}</textarea>
                    @error('content')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="space-y-5">
                <div class="bg-gray-50 dark:bg-gray-800 p-5 rounded-2xl border border-gray-200 dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200 mb-3 text-sm">Publish Settings</h3>
                    
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">Category <span class="text-red-500">*</span></label>
                        <select name="category_id" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] text-sm">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">Status</label>
                        <select name="status" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] text-sm">
                            <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">Cover Image</label>
                        @if($post->featured_image)
                            <div class="w-full h-32 rounded-lg mb-2 overflow-hidden border border-gray-200">
                                <img src="{{ Storage::url($post->featured_image) }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <input type="file" name="featured_image" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#0f2441] file:text-white hover:file:bg-blue-900">
                        <p class="text-xs text-gray-400 mt-1">Leave empty to keep existing image</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">Tags (comma separated)</label>
                        <input type="text" name="tags_string" placeholder="Guide, Tips" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] text-sm" value="{{ old('tags_string', $post->tags ? implode(', ', collect($post->tags)->toArray()) : '') }}">
                    </div>
                </div>
                
                <div class="bg-gray-50 dark:bg-gray-800 p-5 rounded-2xl border border-gray-200 dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200 mb-3 text-sm">SEO Meta</h3>
                    <div class="mb-3">
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">Meta Title</label>
                        <input type="text" name="meta_title" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] text-sm" value="{{ old('meta_title', $post->meta_title) }}">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] text-sm">{{ old('meta_description', $post->meta_description) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700 pt-5 flex justify-end gap-3">
            <a href="{{ route('admin.blog.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">Cancel</a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">Update Post</button>
        </div>
    </form>
</div>
@endsection
