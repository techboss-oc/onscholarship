@extends('layouts.agent')

@section('content')
<div class="mb-6">
    <a href="{{ route('agent.applications.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back to Applications</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Application #{{ str_pad($application->id, 5, '0', STR_PAD_LEFT) }}</h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700">
            <div class="flex items-start justify-between mb-6 pb-6 border-b border-gray-100 dark:border-gray-700">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">{{ $application->program->name }}</h2>
                    <p class="text-[#f15a24] font-medium">{{ $application->program->university->name }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-1">Status</p>
                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-sm font-black rounded-lg uppercase tracking-wider text-gray-700 dark:text-gray-300">{{ $application->status }}</span>
                </div>
            </div>
            
            <div class="mb-6">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Applicant Overview</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                    <div><p class="text-xs text-gray-500">Student</p><p class="text-sm font-bold dark:text-white">{{ $application->student->user->name }}</p></div>
                    <div><p class="text-xs text-gray-500">Nationality</p><p class="text-sm font-bold dark:text-white">{{ $application->student->nationality ?? 'N/A' }}</p></div>
                    <div><p class="text-xs text-gray-500">Passport Number</p><p class="text-sm font-bold dark:text-white">{{ $application->student->passport_number ?? 'N/A' }}</p></div>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Cover Letter / Statement</h3>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm leading-relaxed prose dark:prose-invert">
                    {!! nl2br(e($application->cover_letter ?? 'No cover letter submitted.')) !!}
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="admin-glass p-6 rounded-3xl border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Admin Notes / Feedback</h3>
            @if($application->admin_notes)
                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 text-blue-800 dark:text-blue-300 rounded-xl text-sm leading-relaxed border border-blue-200 dark:border-blue-800">
                    {!! nl2br(e($application->admin_notes)) !!}
                </div>
            @else
                <p class="text-sm text-gray-500 italic">No notes provided by administration yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
