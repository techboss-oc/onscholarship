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
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Scholarship Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" required value="{{ old('name', $scholarship->name) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">University</label>
                <select name="university_id" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="">General / Multiple Universities</option>
                    @foreach($universities as $university)
                    <option value="{{ $university->id }}" {{ old('university_id', $scholarship->university_id) == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                    @endforeach
                </select>
                @error('university_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Scholarship Type <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    @foreach(['government' => 'Government', 'university' => 'University', 'private' => 'Private', 'csc' => 'CSC'] as $value => $label)
                    <option value="{{ $value }}" {{ old('type', $scholarship->type) === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('type')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Coverage <span class="text-red-500">*</span></label>
                <select name="coverage" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    @foreach(['full' => 'Full', 'partial' => 'Partial', 'tuition only' => 'Tuition Only'] as $value => $label)
                    <option value="{{ $value }}" {{ old('coverage', $scholarship->coverage) === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('coverage')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Amount (USD)</label>
                <input type="number" step="0.01" min="0" name="amount_usd" value="{{ old('amount_usd', $scholarship->amount_usd) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('amount_usd')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Duration</label>
                <input type="text" name="duration" value="{{ old('duration', $scholarship->duration) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" placeholder="e.g. 4 years">
                @error('duration')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Deadline</label>
                <input type="date" name="deadline" value="{{ old('deadline', $scholarship->deadline ? $scholarship->deadline->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('deadline')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Intake Date</label>
                <input type="date" name="intake_date" value="{{ old('intake_date', $scholarship->intake_date ? $scholarship->intake_date->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('intake_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Available Slots</label>
                <input type="number" min="0" name="available_slots" value="{{ old('available_slots', $scholarship->available_slots) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('available_slots')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="3" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('description', $scholarship->description) }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Eligibility <span class="text-red-500">*</span></label>
                <textarea name="eligibility" rows="3" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('eligibility', $scholarship->eligibility) }}</textarea>
                @error('eligibility')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active_e" value="1" {{ old('is_active', $scholarship->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-[#f15a24] focus:ring-[#f15a24]">
                <label for="is_active_e" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</label>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_featured" id="is_featured_e" value="1" {{ old('is_featured', $scholarship->is_featured) ? 'checked' : '' }} class="rounded border-gray-300 text-[#f15a24] focus:ring-[#f15a24]">
                <label for="is_featured_e" class="text-sm font-medium text-gray-700 dark:text-gray-300">Featured Scholarship</label>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.scholarships.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">Cancel</a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">Update</button>
        </div>
    </form>
</div>
@endsection
