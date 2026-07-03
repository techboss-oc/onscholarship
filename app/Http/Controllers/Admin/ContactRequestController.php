<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactRequest::query()->latest();
        $stats = [
            'total' => ContactRequest::count(),
            'new' => ContactRequest::where('status', 'new')->count(),
            'read' => ContactRequest::where('status', 'read')->count(),
            'replied' => ContactRequest::where('status', 'replied')->count(),
        ];

        if ($request->filled('status')) {
            $query->where('status', $request->string('status')->toString());
        }

        if ($request->filled('q')) {
            $term = trim((string) $request->input('q'));
            $escaped = str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $term);
            $like = '%' . $escaped . '%';

            $query->where(function ($q) use ($like) {
                $q->where('name', 'like', $like)
                    ->orWhere('email', 'like', $like)
                    ->orWhere('subject', 'like', $like);
            });
        }

        $contactRequests = $query->paginate(15)->appends($request->query());

        return view('admin.contact_requests.index', compact('contactRequests', 'stats'));
    }

    public function show($id)
    {
        $contactRequest = ContactRequest::findOrFail($id);

        return view('admin.contact_requests.show', compact('contactRequest'));
    }

    public function updateStatus(Request $request, $id)
    {
        $contactRequest = ContactRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => ['required', 'in:read,replied'],
        ]);

        $contactRequest->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Message updated successfully.');
    }
}
