@extends('layouts.student')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">My Profile</h1>
        <p class="text-gray-500 text-sm mt-1">Keep your information accurate for a smooth application process.</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Avatar Card -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 text-center">
        <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-[#0f2441] to-blue-700 text-white flex items-center justify-center text-4xl font-black shadow-xl mb-4">
            {{ substr(auth()->user()->name, 0, 1) }}
        </div>
        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->name }}</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
        <span class="inline-block mt-2 px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">Student</span>
    </div>

    <!-- Profile Form -->
    <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-5 brand-font">Personal Information</h3>
        <form action="{{ route('student.profile.update') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ $profile->date_of_birth ?? '' }}"
                           class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f15a24] focus:border-[#f15a24]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Gender</label>
                    <select name="gender" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f15a24] focus:border-[#f15a24]">
                        <option value="">-- Select --</option>
                        <option value="male" {{ ($profile->gender??'') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ ($profile->gender??'') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ ($profile->gender??'') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nationality</label>
                    <input type="text" name="nationality" value="{{ $profile->nationality ?? '' }}" placeholder="e.g. Nigerian"
                           class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f15a24] focus:border-[#f15a24]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone Number</label>
                    <input type="text" name="phone" value="{{ $profile->phone ?? '' }}" placeholder="+234..."
                           class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f15a24] focus:border-[#f15a24]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Passport Number</label>
                    <input type="text" name="passport_number" value="{{ $profile->passport_number ?? '' }}"
                           class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f15a24] focus:border-[#f15a24]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Home Address</label>
                    <input type="text" name="address" value="{{ $profile->address ?? '' }}"
                           class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f15a24] focus:border-[#f15a24]">
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-8 py-3 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
