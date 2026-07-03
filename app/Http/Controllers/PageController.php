<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactRequest::create($request->only(['name', 'email', 'subject', 'message']));

        // TODO: Add email notification later

        $redirectTo = $request->headers->get('referer') ?: route('contact');

        return redirect()->to($redirectTo)
            ->with('success', 'Thank you for your message! We will get back to you soon.')
            ->with('contact_success_popup', [
                'title' => 'Message Sent Successfully',
                'message' => 'Thank you for reaching out to Onscholarship. Our team has received your message and will respond as soon as possible.',
            ]);
    }

    public function universities()
    {
        $universities = \App\Models\University::where('is_active', true)->withCount('programs')->paginate(12);
        return view('pages.universities', compact('universities'));
    }

    public function universityShow($id)
    {
        $university = \App\Models\University::with('programs')->findOrFail($id);
        return view('pages.university_show', compact('university'));
    }

    public function scholarships()
    {
        $scholarships = \App\Models\Scholarship::where('is_active', true)->paginate(12);
        return view('pages.scholarships', compact('scholarships'));
    }

    public function scholarshipShow($id)
    {
        $scholarship = \App\Models\Scholarship::findOrFail($id);
        return view('pages.scholarship_show', compact('scholarship'));
    }

    public function programs(\Illuminate\Http\Request $request)
    {
        $query = \App\Models\Program::where('is_active', true)->with('university');

        if ($request->filled('degree')) {
            $query->where('degree_level', $request->degree);
        }

        if ($request->filled('q')) {
            $term = trim((string) $request->input('q'));
            $escaped = str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $term);
            $like = '%' . $escaped . '%';

            $query->where(function ($q) use ($like) {
                $q->where('name', 'like', $like)
                    ->orWhereHas('university', function ($uq) use ($like) {
                        $uq->where('name', 'like', $like);
                    });
            });
        }

        $programs = $query->paginate(12)->appends($request->query());
        return view('pages.programs', compact('programs'));
    }

    public function programShow($id)
    {
        $program = \App\Models\Program::with('university')->findOrFail($id);
        return view('pages.program_show', compact('program'));
    }

    public function blog(\Illuminate\Http\Request $request)
    {
        $query = \App\Models\BlogPost::published()->with(['category', 'author'])->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->paginate(9);
        $categories = \App\Models\BlogCategory::withCount('posts')->get();

        return view('pages.blog', compact('posts', 'categories'));
    }

    public function blogShow($slug)
    {
        $post = \App\Models\BlogPost::published()->with(['category', 'author'])->where('slug', $slug)->firstOrFail();

        // Increment views
        $post->increment('views');

        $relatedPosts = \App\Models\BlogPost::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog_show', compact('post', 'relatedPosts'));
    }

    public function sitemap()
    {
        $universities = \App\Models\University::where('is_active', true)->get();
        $scholarships = \App\Models\Scholarship::where('is_active', true)->get();
        $programs = \App\Models\Program::where('is_active', true)->get();
        $posts = \App\Models\BlogPost::published()->get();

        return response()->view('pages.sitemap', compact('universities', 'scholarships', 'programs', 'posts'))
            ->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /student/\n";
        $content .= "Disallow: /agent/\n\n";
        $content .= "Sitemap: " . route('sitemap') . "\n";

        return response($content, 200)->header('Content-Type', 'text/plain');
    }
}
