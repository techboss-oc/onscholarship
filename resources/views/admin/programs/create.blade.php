@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.programs.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Add New Program</h1>
</div>

<div class="max-w-3xl admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700 text-sm">
    <form action="{{ route('admin.programs.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">University <span class="text-red-500">*</span></label>
                <select name="university_id" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="">-- Select University --</option>
                    @foreach($universities as $uni)
                        <option value="{{ $uni->id }}" {{ old('university_id') == $uni->id ? 'selected' : '' }}>{{ $uni->name }}</option>
                    @endforeach
                </select>
                @error('university_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Program Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" value="{{ old('name') }}">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Degree Level <span class="text-red-500">*</span></label>
                <select name="degree_level" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="bachelor">Bachelor's Degree</option>
                    <option value="master">Master's Degree</option>
                    <option value="phd">PhD / Doctorate</option>
                    <option value="non-degree">Non-Degree / Language Study</option>
                </select>
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Duration (Years) <span class="text-red-500">*</span></label>
                <input type="number" step="0.5" name="duration_years" required value="{{ old('duration_years', 4) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Tuition Fee ($/Year) <span class="text-red-500">*</span></label>
                <input type="number" step="0.01" name="tuition_fee" required value="{{ old('tuition_fee') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
            </div>
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Service Charge ($) <span class="text-red-500">*</span></label>
                <input type="number" step="0.01" name="service_charge_usd" required value="{{ old('service_charge_usd', 0) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">This is the admission processing service charge students or agents pay after the application is accepted.</p>
            </div>
            <div class="col-span-2">
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Description / Highlights</label>
                <textarea name="description" rows="4" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] border">{{ old('description') }}</textarea>
            </div>
            <div class="col-span-2 flex items-center gap-2 mt-2">
                <input type="checkbox" name="is_active" value="1" checked class="rounded shadow-sm text-[#f15a24] focus:ring focus:ring-[#f15a24] focus:ring-opacity-50">
                <label class="font-medium text-gray-700 dark:text-gray-300">Active</label>
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-4">
            <a href="{{ route('admin.programs.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 transition">Cancel</a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition">Save Program</button>
        </div>
    </form>
</div>
@endsection
