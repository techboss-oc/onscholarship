@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.programs.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Edit Program: {{ $program->name }}</h1>
</div>

<div class="max-w-3xl admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700 text-sm">
    <form action="{{ route('admin.programs.update', $program->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">University <span class="text-red-500">*</span></label>
                <select name="university_id" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    @foreach($universities as $uni)
                    <option value="{{ $uni->id }}" {{ (old('university_id', $program->university_id) == $uni->id) ? 'selected' : '' }}>{{ $uni->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Program Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]" value="{{ old('name', $program->name) }}">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Field of Study <span class="text-red-500">*</span></label>
                <input type="text" name="field_of_study" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" value="{{ old('field_of_study', $program->field_of_study) }}" placeholder="e.g. Computer Science">
                @error('field_of_study')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Degree Level <span class="text-red-500">*</span></label>
                <select name="degree_level" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                    <option value="foundation" {{ old('degree_level', $program->degree_level) == 'foundation' ? 'selected' : '' }}>Foundation</option>
                    <option value="diploma" {{ old('degree_level', $program->degree_level) == 'diploma' ? 'selected' : '' }}>Diploma</option>
                    <option value="bachelor" {{ old('degree_level', $program->degree_level) == 'bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                    <option value="master" {{ old('degree_level', $program->degree_level) == 'master' ? 'selected' : '' }}>Master's Degree</option>
                    <option value="phd" {{ old('degree_level', $program->degree_level) == 'phd' ? 'selected' : '' }}>PhD / Doctorate</option>
                </select>
                @error('degree_level')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Duration (Years) <span class="text-red-500">*</span></label>
                <input type="number" step="1" min="1" max="10" name="duration_years" required value="{{ old('duration_years', $program->duration_years) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                @error('duration_years')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Language of Instruction</label>
                <input type="text" name="language" value="{{ old('language', $program->language ?: 'English') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" placeholder="English">
                @error('language')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Intake Months</label>
                <input type="text" name="intake_months" value="{{ old('intake_months', $program->intake_months) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" placeholder="e.g. March, September">
                @error('intake_months')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Tuition Fee ($/Year) <span class="text-red-500">*</span></label>
                <input type="number" step="0.01" name="tuition_fee" required value="{{ old('tuition_fee', $program->tuition_fee) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                @error('tuition_fee')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Service Charge ($) <span class="text-red-500">*</span></label>
                <input type="number" step="0.01" name="service_charge_usd" required value="{{ old('service_charge_usd', $program->service_charge_usd) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Charged after the application is accepted and ready for admission processing.</p>
                @error('service_charge_usd')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Description / Highlights <span class="text-red-500">*</span></label>
                <textarea name="description" rows="4" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] border">{{ old('description', $program->description) }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Admission Requirements</label>
                <textarea name="requirements" rows="4" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] border">{{ old('requirements', $program->requirements) }}</textarea>
                @error('requirements')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Career Prospects</label>
                <textarea name="career_prospects" rows="4" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] border">{{ old('career_prospects', $program->career_prospects) }}</textarea>
                @error('career_prospects')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2 flex items-center gap-2 mt-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $program->is_active) ? 'checked' : '' }} class="rounded shadow-sm text-[#f15a24] focus:ring focus:ring-[#f15a24] focus:ring-opacity-50">
                <label class="font-medium text-gray-700 dark:text-gray-300">Active</label>
            </div>
            <div class="col-span-2 flex items-center gap-2">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $program->is_featured) ? 'checked' : '' }} class="rounded shadow-sm text-[#f15a24] focus:ring focus:ring-[#f15a24] focus:ring-opacity-50">
                <label class="font-medium text-gray-700 dark:text-gray-300">Featured Program</label>
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-4">
            <a href="{{ route('admin.programs.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 transition">Cancel</a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition">Update Program</button>
        </div>
    </form>
</div>
@endsection