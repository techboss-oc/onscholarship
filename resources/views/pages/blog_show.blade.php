@extends('layouts.guest')

@section('title', $post->meta_title ?? $post->title . ' | Onscholarship')
@section('meta_description', $post->meta_description ?? Str::limit(strip_tags($post->content), 150))
@if(!empty($post->tags))
    @section('meta_keywords', implode(', ', collect($post->tags)->toArray()))
@endif
@if($post->featured_image)
    @section('og_image', Storage::url($post->featured_image))
@endif

@section('content')

<!-- Blog Header -->
<div class="relative pt-32 pb-24 lg:pt-40 lg:pb-32 bg-[#0f2441]">
    @if($post->featured_image)
        <div class="absolute inset-0 z-0">
            <img src="{{ Storage::url($post->featured_image) }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-[#0f2441]/80 backdrop-blur-sm"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f2441] to-transparent"></div>
        </div>
    @endif
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="inline-block px-4 py-1.5 bg-[#f15a24] text-white text-sm font-bold rounded-full uppercase tracking-wider mb-6 hover:bg-[#d94a1c] transition">
                {{ $post->category->name }}
            </a>
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight brand-font">
                {{ $post->title }}
            </h1>
            <div class="flex items-center justify-center gap-6 text-blue-100/80 text-sm font-medium">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    {{ optional($post->author)->name ?? 'Onscholarship' }}
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $post->published_at->format('M d, Y') }}
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    {{ $post->views }} Views
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300 relative -mt-10 rounded-t-[40px] z-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            @if($post->excerpt)
            <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl mb-12 shadow-sm border border-gray-100 dark:border-gray-700 text-lg font-medium text-gray-700 dark:text-gray-300 leading-relaxed border-l-4 border-l-[#f15a24]" data-aos="fade-up">
                {{ $post->excerpt }}
            </div>
            @endif

            <article class="prose prose-lg dark:prose-invert prose-headings:font-black prose-headings:brand-font prose-a:text-[#f15a24] prose-img:rounded-3xl prose-img:shadow-md max-w-none mb-16" data-aos="fade-up">
                {!! $post->content !!}
            </article>

            @if(!empty($post->tags))
            <div class="flex items-center gap-2 flex-wrap mb-12 border-t border-gray-200 dark:border-gray-800 pt-8" data-aos="fade-up">
                <span class="font-bold text-gray-800 dark:text-gray-200 mr-2">Tags:</span>
                @foreach($post->tags as $tag)
                    <span class="px-4 py-1.5 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 transition cursor-default">#{{ $tag }}</span>
                @endforeach
            </div>
            @endif

            <!-- Back to Blog -->
            <div class="text-center" data-aos="fade-up">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white dark:bg-gray-800 text-[#0f2441] dark:text-white font-bold rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to all articles
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->count() > 0)
<section class="py-20 bg-white dark:bg-gray-950 transition-colors duration-300 border-t border-gray-100 dark:border-gray-900">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-black text-[#0f2441] dark:text-white mb-10 text-center brand-font" data-aos="fade-up">Related <span class="text-[#f15a24]">Articles</span></h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedPosts as $related)
                <article class="bg-gray-50 dark:bg-gray-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 dark:border-gray-800 flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('blog.show', $related->slug) }}" class="block aspect-video relative overflow-hidden group">
                        @if($related->featured_image)
                            <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center transform group-hover:scale-105 transition-transform duration-500">
                                <svg class="w-10 h-10 text-[#0f2441] dark:text-blue-300 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-[#0f2441] dark:text-white mb-3 line-clamp-2 brand-font">
                            <a href="{{ route('blog.show', $related->slug) }}" class="hover:text-[#f15a24] transition-colors">{{ $related->title }}</a>
                        </h3>
                        <div class="mt-auto flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>{{ $related->published_at->format('M d, Y') }}</span>
                            <span class="text-[#f15a24] font-bold">Read More &rarr;</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
