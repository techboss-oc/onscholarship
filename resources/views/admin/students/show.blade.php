@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.students.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back to Students</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Student: {{ $student->user->name }}</h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="admin-glass p-6 rounded-3xl border border-gray-200 dark:border-gray-700">
        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Profile Information</h2>
        <div class="space-y-4">
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Email</p>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ $student->user->email }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Phone</p>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ $student->phone ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Nationality</p>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ $student->nationality ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Passport Number</p>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ $student->passport_number ?? 'N/A' }}</p>
            </div>
            <div class="pt-4 border-t border-gray-100 dark:border-gray-700">
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Agent Reference</p>
                @if($student->agent)
                <p class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ $student->agent->company_name ?? $student->agent->user->name }}</p>
                @else
                <p class="text-sm font-medium text-gray-500 italic">None (Direct Registration)</p>
                @endif
            </div>
        </div>
    </div>

    <div class="lg:col-span-2 space-y-6">
        <div class="admin-glass p-6 rounded-3xl border border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Applications</h2>
            <div class="space-y-4">
                @forelse($student->applications as $app)
                <div class="p-4 border border-gray-100 dark:border-gray-700 rounded-2xl flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">{{ $app->program->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $app->program->university->name }}</p>
                    </div>
                    <div class="text-right">
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-md uppercase tracking-wider">{{ $app->status }}</span>
                        <div class="mt-2 text-xs text-gray-400">{{ $app->created_at->format('M d, Y') }}</div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500">This student has not submitted any applications yet.</p>
                @endforelse
            </div>
        </div>

        <div class="admin-glass p-6 rounded-3xl border border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Uploaded Documents</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($student->documents as $doc)
                <div class="p-4 border border-gray-100 dark:border-gray-700 rounded-2xl flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-500 justify-center items-center flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white">{{ ucfirst(str_replace('_', ' ', $doc->type)) }}</h4>
                        <p class="text-xs text-gray-500">Uploaded {{ $doc->created_at->format('M d') }}</p>
                    </div>
                    <a href="{{ route('admin.students.documents.view', ['id' => $student->id, 'documentId' => $doc->id]) }}" target="_blank" class="inline-flex items-center rounded-xl px-3.5 py-2 text-xs font-bold text-white shadow-sm transition hover:opacity-95" style="background: linear-gradient(135deg, #0f2441 0%, #1f4e8c 100%);">
                        View
                    </a>
                </div>
                @empty
                <p class="text-sm text-gray-500">No documents uploaded.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection