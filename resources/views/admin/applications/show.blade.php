@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.applications.index') }}" class="text-sm text-[#f15a24] hover:underline">&larr; Back to Applications</a>
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font mt-2">Process Application #{{ str_pad($application->id, 5, '0', STR_PAD_LEFT) }}</h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left Column: Application Context -->
    <div class="lg:col-span-2 space-y-6">
        
        <div class="admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700">
            <div class="flex items-start justify-between mb-6 pb-6 border-b border-gray-100 dark:border-gray-700">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">{{ $application->program->name }}</h2>
                    <p class="text-[#f15a24] font-medium">{{ $application->program->university->name }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-1">Current Status</p>
                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-sm font-black rounded-lg uppercase tracking-wider text-gray-700 dark:text-gray-300">{{ $application->status }}</span>
                </div>
            </div>
            
            <div class="mb-6">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Applicant Overview</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                    <div><p class="text-xs text-gray-500">Name</p><p class="text-sm font-bold dark:text-white">{{ $application->student->user->name }}</p></div>
                    <div><p class="text-xs text-gray-500">Nationality</p><p class="text-sm font-bold dark:text-white">{{ $application->student->nationality ?? 'N/A' }}</p></div>
                    <div><p class="text-xs text-gray-500">Phone</p><p class="text-sm font-bold dark:text-white">{{ $application->student->phone ?? 'N/A' }}</p></div>
                    <div><p class="text-xs text-gray-500">Referral</p><p class="text-sm font-bold text-[#f15a24]">{{ $application->student->agent ? 'Agent' : 'Direct' }}</p></div>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-3">Cover Letter / Statement</h3>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm leading-relaxed prose dark:prose-invert">
                    {!! nl2br(e($application->cover_letter ?? 'No cover letter submitted.')) !!}
                </div>
            </div>
        </div>

        <div class="admin-glass p-8 rounded-3xl border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Required Documents</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @forelse($application->documents as $doc)
                    <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold dark:text-white">{{ ucfirst($doc->type) }}</p>
                                <p class="text-xs text-gray-500">App-specific doc</p>
                            </div>
                        </div>
                        <a href="{{ Storage::url($doc->file_path) }}" target="_blank" class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-xs font-bold rounded transition">Review</a>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">No application-specific documents uploaded.</p>
                @endforelse
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                <a href="{{ route('admin.students.show', $application->student_id) }}" class="text-sm text-blue-600 hover:underline">View All Student Master Documents (Passports, Transcripts) &rarr;</a>
            </div>
        </div>

    </div>

    <!-- Right Column: Status Update -->
    <div>
        <div class="admin-glass p-6 rounded-3xl border border-gray-200 dark:border-gray-700 sticky top-28">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Official Decision</h3>
            <form action="{{ route('admin.applications.status', $application->id) }}" method="POST">
                @csrf @method('PATCH')
                
                <div class="space-y-4 mb-6">
                    <label class="flex items-center p-3 border rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 transition {{ $application->status == 'pending' ? 'bg-yellow-50 dark:bg-yellow-900/10 border-yellow-200 dark:border-yellow-800' : 'border-gray-200 dark:border-gray-700' }}">
                        <input type="radio" name="status" value="pending" {{ $application->status == 'pending' ? 'checked' : '' }} class="text-yellow-500 focus:ring-yellow-500">
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900 dark:text-white">Pending</p>
                            <p class="text-xs text-gray-500">Awaiting initial review</p>
                        </div>
                    </label>
                    <label class="flex items-center p-3 border rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 transition {{ $application->status == 'processing' ? 'bg-blue-50 dark:bg-blue-900/10 border-blue-200 dark:border-blue-800' : 'border-gray-200 dark:border-gray-700' }}">
                        <input type="radio" name="status" value="processing" {{ $application->status == 'processing' ? 'checked' : '' }} class="text-blue-500 focus:ring-blue-500">
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900 dark:text-white">Processing</p>
                            <p class="text-xs text-gray-500">Sent to university for review</p>
                        </div>
                    </label>
                    <label class="flex items-center p-3 border rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 transition {{ $application->status == 'accepted' ? 'bg-green-50 dark:bg-green-900/10 border-green-200 dark:border-green-800' : 'border-gray-200 dark:border-gray-700' }}">
                        <input type="radio" name="status" value="accepted" {{ $application->status == 'accepted' ? 'checked' : '' }} class="text-green-500 focus:ring-green-500">
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900 dark:text-white">Accepted</p>
                            <p class="text-xs text-gray-500">University has approved</p>
                        </div>
                    </label>
                    <label class="flex items-center p-3 border rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 transition {{ $application->status == 'rejected' ? 'bg-red-50 dark:bg-red-900/10 border-red-200 dark:border-red-800' : 'border-gray-200 dark:border-gray-700' }}">
                        <input type="radio" name="status" value="rejected" {{ $application->status == 'rejected' ? 'checked' : '' }} class="text-red-500 focus:ring-red-500">
                        <div class="ml-3">
                            <p class="text-sm font-bold text-gray-900 dark:text-white">Rejected</p>
                            <p class="text-xs text-gray-500">Application was denied</p>
                        </div>
                    </label>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Admin Notes (Visible to Student/Agent)</label>
                    <textarea name="admin_notes" rows="4" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f15a24]" placeholder="E.g., Missing passport scan...">{{ old('admin_notes', $application->admin_notes) }}</textarea>
                </div>

                <button type="submit" class="w-full py-3 bg-[#0f2441] text-white font-bold rounded-xl hover:bg-black transition shadow-lg">Save Decision</button>
            </form>
        </div>
    </div>
</div>
@endsection
