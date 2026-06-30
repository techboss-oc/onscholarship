@extends('layouts.student')

@section('content')
<div class="mb-6">
    <a href="{{ route('student.applications.index') }}" class="text-sm text-[#f15a24] font-semibold hover:underline">&larr; Back to Applications</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-3">Create New Application</h1>
</div>

<div class="max-w-2xl bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
    <form action="{{ route('student.applications.store') }}" method="POST">
        @csrf

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">University & Program <span class="text-red-500">*</span></label>
            <select name="program_id" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]" x-data x-select>
                <option value="">-- Select a Program --</option>
                @foreach($universities as $uni)
                    @if($uni->programs->count())
                        <optgroup label="{{ $uni->name }}">
                            @foreach($uni->programs as $prog)
                                <option value="{{ $prog->id }}" {{ (isset($selectedProgramId) && $selectedProgramId == $prog->id) ? 'selected' : '' }}>{{ $prog->name }} ({{ ucfirst($prog->degree_level) }}, {{ $prog->duration_years }}yr)</option>
                            @endforeach
                        </optgroup>
                    @endif
                @endforeach
            </select>
            @error('program_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-2 gap-5 mb-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Intake Year <span class="text-red-500">*</span></label>
                <input type="number" name="intake_year" value="{{ date('Y') }}" min="2024" max="2030" required
                       class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('intake_year')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Semester <span class="text-red-500">*</span></label>
                <select name="intake_semester" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="fall">Fall (September)</option>
                    <option value="spring">Spring (March)</option>
                </select>
                @error('intake_semester')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Letter / Personal Statement</label>
            <textarea name="cover_letter" rows="5" placeholder="Briefly explain your motivation and suitability for this program..."
                      class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm"></textarea>
        </div>

        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 mb-6 text-sm text-blue-800 dark:text-blue-300">
            <strong>Note:</strong> Make sure you have uploaded all required documents before submitting. Your application will be reviewed by our team.
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('student.applications.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                Cancel
            </a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">
                Submit Application
            </button>
        </div>
    </form>
</div>
@endsection
