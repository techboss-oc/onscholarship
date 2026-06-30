@extends('layouts.student')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">My Applications</h1>
    <a href="{{ route('student.applications.create') }}" class="px-5 py-2.5 bg-[#f15a24] text-white font-bold rounded-xl hover:bg-[#d94a1c] transition shadow-sm text-sm">
        + New Application
    </a>
</div>

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
    @forelse($applications as $app)
    <div class="p-5 border-b border-gray-100 dark:border-gray-700 last:border-0 hover:bg-gray-50 dark:hover:bg-gray-700/50">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h4 class="font-bold text-gray-900 dark:text-white">{{ $app->program->name ?? 'Program N/A' }}</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $app->program->university->name ?? '' }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ ucfirst($app->intake_semester) }} {{ $app->intake_year }} • Applied {{ $app->created_at->format('M d, Y') }}</p>
            </div>
            @php
                $colors = ['draft'=>'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300','submitted'=>'bg-blue-100 text-blue-700','processing'=>'bg-yellow-100 text-yellow-700','accepted'=>'bg-green-100 text-green-700','rejected'=>'bg-red-100 text-red-700'];
                $c = $colors[$app->status] ?? 'bg-gray-100 text-gray-600';
            @endphp
            <span class="shrink-0 px-3 py-1 text-xs font-bold rounded-lg {{ $c }} uppercase">{{ $app->status }}</span>
        </div>
    </div>
    @empty
    <div class="p-12 text-center text-gray-400">
        <p class="text-lg font-medium mb-3">No applications yet</p>
        <a href="{{ route('student.applications.create') }}" class="text-[#f15a24] font-bold hover:underline">Start your first application →</a>
    </div>
    @endforelse
</div>
@if($applications->hasPages())
<div class="mt-6 flex justify-center">{{ $applications->links() }}</div>
@endif
@endsection
