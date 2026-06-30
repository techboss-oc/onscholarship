@extends('layouts.guest')

@section('title', 'Blog & Updates | Onscholarship')
@section('meta_description', 'Read the latest news, guides, and tips about studying in China, university admissions, and scholarships.')

@section('content')
<!-- Hero Section -->
<section class="pt-32 pb-20 bg-gradient-to-br from-[#0f2441] to-blue-900 relative overflow-hidden" data-aos="fade-in">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight brand-font" data-aos="fade-up">Our Blog & <span class="text-[#f15a24]">Updates</span></h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto mb-10" data-aos="fade-up" data-aos-delay="100">
            Insights, guides, and news for international students planning their educational journey in China.
        </p>
    </div>
</section>

<!-- Blog Content -->
<section class="py-20 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="container mx-auto px-4">
        
        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4">
                @if($posts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($posts as $post)
                            <article class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                <a href="{{ route('blog.show', $post->slug) }}" class="block aspect-video relative overflow-hidden group">
                                    <div class="absolute top-4 left-4 z-10 px-3 py-1 bg-[#f15a24] text-white text-xs font-bold rounded-full uppercase tracking-wider backdrop-blur-md">
                                        {{ $post->category->name }}
                                    </div>
                                    @if($post->featured_image)
                                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center transform group-hover:scale-105 transition-transform duration-500">
                                            <svg class="w-12 h-12 text-[#0f2441] dark:text-blue-300 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        </div>
                                    @endif
                                </a>
                                <div class="p-6 flex flex-col flex-grow">
                                    <h3 class="text-xl font-bold text-[#0f2441] dark:text-white mb-3 line-clamp-2 brand-font">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-[#f15a24] transition-colors">{{ $post->title }}</a>
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-5 line-clamp-3">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                    </p>
                                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center font-bold text-[#0f2441] dark:text-white text-xs">
                                                {{ substr(optional($post->author)->name ?? 'S', 0, 1) }}
                                            </div>
                                            <span class="text-xs text-gray-500 dark:text-gray-400 font-medium">{{ $post->published_at->format('M d, Y') }}</span>
                                        </div>
                                        <div class="text-xs text-gray-400 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            {{ $post->views }}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-12 flex justify-center">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-12 text-center border border-gray-100 dark:border-gray-700 shadow-sm">
                        <svg class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">No articles found</h3>
                        <p class="text-gray-500">Try adjusting your category filter, or check back later for new updates.</p>
                        @if(request('category'))
                            <a href="{{ route('blog.index') }}" class="mt-4 inline-block px-6 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition">Clear Filters</a>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <aside class="w-full lg:w-1/4 space-y-8">
                <!-- Categories Widget -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm" data-aos="fade-left">
                    <h3 class="font-bold text-lg text-[#0f2441] dark:text-white mb-4 border-b border-gray-100 dark:border-gray-700 pb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#f15a24]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        Categories
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('blog.index') }}" class="flex items-center justify-between text-sm font-medium {{ !request('category') ? 'text-[#f15a24]' : 'text-gray-600 dark:text-gray-400 hover:text-[#f15a24] transition-colors' }}">
                                <span>All Topics</span>
                            </a>
                        </li>
                        @foreach($categories as $category)
                            @if($category->posts_count > 0)
                                <li>
                                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="flex items-center justify-between text-sm font-medium {{ request('category') == $category->slug ? 'text-[#f15a24]' : 'text-gray-600 dark:text-gray-400 hover:text-[#f15a24] transition-colors' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-300 text-xs px-2 py-0.5 rounded-full">{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Call to Action Widget -->
                <div class="bg-[#0f2441] rounded-3xl p-6 text-center shadow-lg relative overflow-hidden" data-aos="fade-left" data-aos-delay="100">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#f15a24] rounded-full filter blur-[50px] opacity-30 pointer-events-none"></div>
                    <h3 class="font-bold text-xl text-white mb-3 relative z-10 brand-font">Start Your Journey Today</h3>
                    <p class="text-blue-200 text-sm mb-6 relative z-10">Apply to top universities and secure your scholarship through Onscholarship.</p>
                    <a href="{{ route('register') }}" class="block w-full py-3 bg-[#f15a24] hover:bg-[#d94a1c] text-white font-bold rounded-xl transition relative z-10 shadow-md text-sm">
                        Apply Now
                    </a>
                </div>
            </aside>
        </div>

    </div>
</section>
@endsection
