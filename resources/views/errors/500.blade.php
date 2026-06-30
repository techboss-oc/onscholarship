@extends('layouts.guest')

@section('title', 'Server Error')
@section('meta_description', 'Oops! Something went wrong on our end.')

@section('content')
    <div class="pt-28 pb-24 bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-8">
                <span class="text-9xl font-black text-[#f15a24]/20">500</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-black text-[#0f2441] dark:text-white brand-font mb-4">Server Error</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">Sorry, something went wrong on our end. We're working to fix it!</p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-4 bg-[#1FA463] text-white font-bold rounded-xl hover:bg-[#147a47] transition shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
@endsection
