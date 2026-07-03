<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = StudentProfile::query()
            ->with(['user', 'agent.user'])
            ->whereHas('user')
            ->latest()
            ->paginate(20);

        return view('admin.students.index', compact('students'));
    }

    public function show($id)
    {
        $student = StudentProfile::with(['user', 'agent.user', 'applications.program', 'documents'])->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    public function viewDocument($id, $documentId)
    {
        [$student, $document, $resolvedMimeType] = $this->resolveStudentDocument($id, $documentId);

        $previewType = str_starts_with((string) $resolvedMimeType, 'image/')
            ? 'image'
            : (str_contains((string) $resolvedMimeType, 'pdf') ? 'pdf' : 'unsupported');

        return view('admin.students.document-preview', compact('student', 'document', 'resolvedMimeType', 'previewType'));
    }

    public function streamDocument($id, $documentId)
    {
        [, $document, $resolvedMimeType] = $this->resolveStudentDocument($id, $documentId);

        return response()->file(
            Storage::disk('private')->path($document->file_path),
            [
                'Content-Type' => $resolvedMimeType ?: 'application/pdf',
                'Content-Disposition' => 'inline',
            ]
        );
    }

    protected function resolveStudentDocument($id, $documentId): array
    {
        $student = StudentProfile::query()
            ->with(['user', 'agent.user'])
            ->whereHas('user')
            ->findOrFail($id);

        $document = Document::query()
            ->where('id', $documentId)
            ->where('user_id', $student->user_id)
            ->firstOrFail();

        $disk = Storage::disk('private');

        if (! $disk->exists($document->file_path)) {
            abort(404, 'Document file could not be found.');
        }

        $resolvedMimeType = $document->mime_type ?: $disk->mimeType($document->file_path);

        return [$student, $document, $resolvedMimeType];
    }

    // For now, no direct edit/delete from admin, just view
}
