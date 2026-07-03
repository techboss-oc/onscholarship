@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.universities.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Edit: {{ $university->name }}</h1>
</div>

<div class="max-w-3xl admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700">
    <form action="{{ route('admin.universities.update', $university->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">University Name</label>
                <input type="text" name="name" required value="{{ old('name', $university->name) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">City</label>
                <input type="text" name="city" required value="{{ old('city', $university->city) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Province</label>
                <input type="text" name="province" required value="{{ old('province', $university->province) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('description', $university->description) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Logo (leave blank to keep current)</label>
                <input type="file" name="logo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[#f15a24] file:text-white">
                @if($university->logo)
                    <div class="mt-3 w-20 h-20 overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-700 bg-white flex items-center justify-center p-2">
                        <img src="{{ Storage::url($university->logo) }}" alt="{{ $university->name }} logo" class="max-h-full w-auto object-contain">
                    </div>
                @endif
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Image (leave blank to keep current)</label>
                <input type="file" name="cover_image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[#0f2441] file:text-white">
                @if($university->cover_image)
                    <div class="mt-3 h-24 overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-700">
                        <img src="{{ Storage::url($university->cover_image) }}" alt="{{ $university->name }} cover image" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ $university->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-[#f15a24] focus:ring-[#f15a24]">
                <label for="is_active" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</label>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.universities.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">Cancel</a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">Update University</button>
        </div>
    </form>
</div>
@endsection
