@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.universities.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back to Universities</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Add New University</h1>
</div>

<div class="max-w-3xl admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700">
    <form action="{{ route('admin.universities.store') }}" method="POST" enctype="multipart/form-data" novalidate data-admin-validate="true">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">University Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" required data-field-label="University Name" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" value="{{ old('name') }}">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">City <span class="text-red-500">*</span></label>
                <input type="text" name="city" required data-field-label="City" value="{{ old('city') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('city')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Province <span class="text-red-500">*</span></label>
                <input type="text" name="province" required data-field-label="Province" value="{{ old('province') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('province')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Type <span class="text-red-500">*</span></label>
                <select name="type" required data-field-label="University Type" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="">Select type</option>
                    <option value="public" {{ old('type') == 'public' ? 'selected' : '' }}>Public</option>
                    <option value="private" {{ old('type') == 'private' ? 'selected' : '' }}>Private</option>
                </select>
                @error('type')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Website</label>
                <input type="url" name="website" value="{{ old('website') }}" placeholder="https://..." class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('website')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="3" required data-field-label="Description" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Logo</label>
                <input type="file" name="logo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[#f15a24] file:text-white hover:file:bg-[#d94a1c]">
                @error('logo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Image</label>
                <input type="file" name="cover_image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[#0f2441] file:text-white hover:file:bg-blue-900">
                @error('cover_image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2 flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded border-gray-300 text-[#f15a24] focus:ring-[#f15a24]">
                <label for="is_active" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active (visible on public site)</label>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.universities.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">Cancel</a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">Create University</button>
        </div>
    </form>
</div>
@endsection
