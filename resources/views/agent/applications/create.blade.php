@extends('layouts.agent')

@section('content')
<div class="mb-6">
    <a href="{{ route('agent.applications.index') }}" class="text-sm text-[#f15a24] font-semibold hover:underline">&larr; Back to Applications</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-3">Create Student Application</h1>
</div>

<div class="max-w-3xl bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
    <form action="{{ route('agent.applications.store') }}" method="POST">
        @csrf

        <div class="mb-6 rounded-2xl border border-[#f15a24]/20 bg-[#f15a24]/10 px-4 py-4 text-sm text-[#0f2441] dark:text-white">
            <p class="font-bold">Global Application Fee: {{ $applicationFee['currency'] }} {{ number_format($applicationFee['amount'], 2) }}</p>
            <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">After this form, you will continue to the fee payment step before the student application can enter processing.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Managed Student <span class="text-red-500">*</span></label>
                <select name="student_profile_id" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="">-- Select Student --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ (string) old('student_profile_id', $selectedStudentId) === (string) $student->id ? 'selected' : '' }}>
                            {{ $student->user?->name ?? 'Unnamed Student' }} ({{ $student->user?->email ?? 'No email' }})
                        </option>
                    @endforeach
                </select>
                @error('student_profile_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">University & Program <span class="text-red-500">*</span></label>
                <select name="program_id" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="">-- Select Program --</option>
                    @foreach($universities as $uni)
                        @if($uni->programs->count())
                            <optgroup label="{{ $uni->name }}">
                                @foreach($uni->programs as $prog)
                                    <option value="{{ $prog->id }}" {{ (string) old('program_id', $selectedProgramId) === (string) $prog->id ? 'selected' : '' }}>
                                        {{ $prog->name }} ({{ ucfirst($prog->degree_level) }}, {{ $prog->duration_years }}yr)
                                    </option>
                                @endforeach
                            </optgroup>
                        @endif
                    @endforeach
                </select>
                @error('program_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-5 mb-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Intake Year <span class="text-red-500">*</span></label>
                <input type="number" name="intake_year" value="{{ old('intake_year', date('Y')) }}" min="2024" max="2035" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                @error('intake_year')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Semester <span class="text-red-500">*</span></label>
                <select name="intake_semester" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24]">
                    <option value="fall" {{ old('intake_semester') === 'fall' ? 'selected' : '' }}>Fall (September)</option>
                    <option value="spring" {{ old('intake_semester') === 'spring' ? 'selected' : '' }}>Spring (March)</option>
                </select>
                @error('intake_semester')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Application Notes / Cover Letter</label>
            <textarea name="cover_letter" rows="5" placeholder="Add the student's motivation or any important notes for processing..." class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24] focus:border-[#f15a24] text-sm">{{ old('cover_letter') }}</textarea>
            @error('cover_letter')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('agent.applications.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                Cancel
            </a>
            <button type="submit" class="px-8 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">
                Continue to Fee Payment
            </button>
        </div>
    </form>
</div>
@endsection
