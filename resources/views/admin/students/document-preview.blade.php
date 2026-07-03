@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
    <div>
        <a href="{{ route('admin.students.show', $student->id) }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back to Student</a>
        <h1 class="mt-2 text-2xl font-black text-[#0f2441] dark:text-white brand-font">Document Preview</h1>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            {{ $student->user->name }} · {{ ucfirst(str_replace('_', ' ', $document->type ?? $document->document_type ?? 'document')) }}
        </p>
    </div>

    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.students.documents.stream', ['id' => $student->id, 'documentId' => $document->id]) }}"
           target="_blank"
           class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition hover:opacity-95"
           style="background: var(--accent);">
            Open Raw File
        </a>
    </div>
</div>

<div class="grid grid-cols-1 gap-6 xl:grid-cols-[320px_minmax(0,1fr)]">
    <div class="admin-card p-6">
        <h2 class="brand-font text-base font-bold" style="color: var(--text-primary);">Document Details</h2>

        <div class="mt-5 space-y-4">
            <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">File Name</p>
                <p class="mt-2 text-sm font-semibold break-all" style="color: var(--text-primary);">{{ $document->name ?? basename($document->file_path) }}</p>
            </div>

            <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Type</p>
                <p class="mt-2 text-sm font-semibold" style="color: var(--text-primary);">{{ ucfirst(str_replace('_', ' ', $document->type ?? $document->document_type ?? 'Document')) }}</p>
            </div>

            <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Format</p>
                <p class="mt-2 text-sm font-semibold" style="color: var(--text-primary);">{{ $resolvedMimeType ?? 'Unknown' }}</p>
            </div>

            <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Uploaded</p>
                <p class="mt-2 text-sm font-semibold" style="color: var(--text-primary);">{{ $document->created_at->format('M d, Y g:i A') }}</p>
                <p class="mt-1 text-xs" style="color: var(--text-muted);">{{ $document->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="border-b px-5 py-4" style="border-color: var(--border);">
            <h2 class="brand-font text-base font-bold" style="color: var(--text-primary);">Preview</h2>
            <p class="mt-1 text-xs" style="color: var(--text-muted);">The document is shown inside the admin panel for easier review.</p>
        </div>

        <div class="p-4 sm:p-5">
            @if($previewType === 'image')
                <div class="overflow-hidden rounded-3xl border bg-black/5 p-3 dark:bg-white/5" style="border-color: var(--border);">
                    <img
                        src="{{ route('admin.students.documents.stream', ['id' => $student->id, 'documentId' => $document->id]) }}"
                        alt="{{ $document->name ?? 'Student document' }}"
                        class="w-full rounded-2xl object-contain"
                        style="max-height: 78vh;"
                    >
                </div>
            @elseif($previewType === 'pdf')
                <div class="overflow-hidden rounded-3xl border" style="border-color: var(--border);">
                    <iframe
                        src="{{ route('admin.students.documents.stream', ['id' => $student->id, 'documentId' => $document->id]) }}"
                        class="h-[78vh] w-full bg-white"
                        title="Document Preview"></iframe>
                </div>
            @else
                <div class="flex min-h-[420px] flex-col items-center justify-center rounded-3xl border border-dashed px-6 text-center" style="border-color: var(--border);">
                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl" style="background: rgba(241,90,36,0.12);">
                        <svg class="w-8 h-8 text-[#f15a24]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold brand-font" style="color: var(--text-primary);">Preview Not Available</h3>
                    <p class="mt-2 max-w-md text-sm leading-6" style="color: var(--text-muted);">
                        This file format cannot be embedded directly in the browser. Use the raw file button above to open it separately.
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
