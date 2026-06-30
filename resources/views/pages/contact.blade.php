@extends('layouts.guest')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with Onscholarship for any questions about studying in China, admissions, or scholarships.')
@section('meta_keywords', 'Contact Us, Onscholarship, Study in China, Admissions')

@section('content')
<div class="pt-28 pb-24 relative overflow-hidden bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <!-- Form Side -->
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-5xl font-black text-[#0f2441] dark:text-white brand-font mb-4">Get In Touch</h2>
                <p class="text-gray-500 dark:text-gray-400 mb-8">We're here to answer any questions you may have about studying in China. Reach out to us, and we'll respond as soon as we can.</p>

                <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f15a24] focus:ring-[#f15a24] dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f15a24] focus:ring-[#f15a24] dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                            <input type="text" name="subject" id="subject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f15a24] focus:ring-[#f15a24] dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                            <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f15a24] focus:ring-[#f15a24] dark:bg-gray-900 dark:border-gray-700 dark:text-white"></textarea>
                        </div>
                        <button type="submit" class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-md text-base font-medium rounded-md text-white bg-[#f15a24] hover:bg-[#d94a1c] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f15a24] transition">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Information Side -->
            <div data-aos="fade-left" class="flex flex-col justify-center">
                <div class="glass p-10 rounded-[2rem] bg-[#0f2441] text-white shadow-xl relative overflow-hidden">
                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-[#f15a24] rounded-full filter blur-[80px] opacity-40"></div>

                    <h3 class="text-2xl font-bold mb-8 brand-font relative z-10">Contact Information</h3>

                    <ul class="space-y-8 relative z-10">
                        <li class="flex items-start">
                            <div class="shrink-0">
                                <svg class="h-6 w-6 text-[#f15a24]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-4 text-base text-gray-300">
                                <p>Headquarters</p>
                                <p class="font-medium text-white">Haikou, Hainan, China</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="shrink-0">
                                <svg class="h-6 w-6 text-[#f15a24]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4 text-base text-gray-300">
                                <p>Email Support</p>
                                <p class="font-medium text-white">info@onscholarship.com</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="shrink-0">
                                <svg class="h-6 w-6 text-[#f15a24]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-4 text-base text-gray-300">
                                <p>Phone (WhatsApp / WeChat)</p>
                                <p class="font-medium text-white">+86 123 4567 8900</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection