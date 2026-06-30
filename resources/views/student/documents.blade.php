@extends('layouts.student')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">My Documents</h1>
</div>

<!-- Upload Section -->
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 mb-8">
    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-5">Upload Document</h3>
    <form action="{{ route('student.documents.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Document Type</label>
                <select name="document_type" required class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm">
                    <option value="">-- Select Type --</option>
                    <option value="passport">International Passport</option>
                    <option value="academic_transcript">Academic Transcript</option>
                    <option value="degree_certificate">Degree / O-Level Certificate</option>
                    <option value="medical_examination">Medical Examination Form</option>
                    <option value="police_clearance">Police Clearance Certificate</option>
                    <option value="recommendation_letter">Recommendation Letter</option>
                    <option value="study_plan">Study Plan</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">File (PDF/JPG/PNG, max 5MB)</label>
                <input type="file" name="file" required accept=".pdf,.jpg,.jpeg,.png"
                       class="w-full rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 text-sm">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="px-6 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition text-sm">
                Upload Document
            </button>
        </div>
    </form>
</div>

<!-- Documents List -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    <div class="p-5 border-b border-gray-100 dark:border-gray-700">
        <h3 class="font-bold text-lg brand-font text-gray-900 dark:text-white">Uploaded Documents</h3>
    </div>
    @forelse($documents as $doc)
    <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 border-b border-gray-50 dark:border-gray-700 last:border-0">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-orange-50 text-[#f15a24] flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ ucwords(str_replace('_', ' ', $doc->document_type)) }}</p>
                <p class="text-xs text-gray-400">{{ $doc->original_name }} • {{ $doc->created_at->format('M d, Y') }}</p>
            </div>
        </div>
        @php $statusColors = ['pending'=>'bg-yellow-100 text-yellow-700','approved'=>'bg-green-100 text-green-700','rejected'=>'bg-red-100 text-red-700']; @endphp
        <span class="px-2.5 py-1 text-xs font-bold rounded-md {{ $statusColors[$doc->status] ?? 'bg-gray-100 text-gray-600' }} uppercase">{{ $doc->status }}</span>
    </div>
    @empty
    <div class="p-8 text-center text-gray-400 text-sm">No documents uploaded yet.</div>
    @endforelse
</div>
@endsection
