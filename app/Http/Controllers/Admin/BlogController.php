<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['category', 'author'])->latest()->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:5120',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->except(['featured_image']);
        $data['slug'] = Str::slug($request->title);
        $data['author_id'] = auth()->id();
        
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        if ($request->status === 'published' && !isset($data['published_at'])) {
            $data['published_at'] = now();
        }

        // Auto tags array
        if ($request->has('tags_string')) {
            $data['tags'] = array_map('trim', explode(',', $request->tags_string));
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:5120',
            'status' => 'required|in:draft,published',
        ]);

        $post = BlogPost::findOrFail($id);
        
        $data = $request->except(['featured_image']);
        
        if ($post->title !== $request->title) {
            $data['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        if ($request->status === 'published' && !$post->published_at) {
            $data['published_at'] = now();
        }

        if ($request->has('tags_string')) {
            $data['tags'] = array_map('trim', explode(',', $request->tags_string));
        } else {
            $data['tags'] = [];
        }

        $post->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully.');
    }
}
