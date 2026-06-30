@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.scholarships.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Edit Scholarship</h1>
</div>
<div class="max-w-3xl admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700">
    <form action="{{ route('admin.scholarships.update', $scholarship->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                <input type="text" name="name" required value="{{ old('name', $scholarship->name) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Funding Type</label>
                <select name="funding_type" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    @foreach(['full_scholarship','partial_scholarship','government','university'] as $ft)
                    <option value="{{ $ft }}" {{ $scholarship->funding_type === $ft ? 'selected' : '' }}>{{ ucfirst(str_replace('_',' ',$ft)) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Deadline</label>
                <input type="date" name="deadline" required value="{{ old('deadline', $scholarship->deadline ? \Carbon\Carbon::parse($scholarship->deadline)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('description', $scholarship->description) }}</textarea>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active_e" value="1" {{ $scholarship->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-[#f15a24] focus:ring-[#f15a24]">
                <label for="is_active_e" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</label>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.scholarships.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">Cancel</a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">Update</button>
        </div>
    </form>
</div>
@endsection
