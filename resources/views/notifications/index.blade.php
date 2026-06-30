@php
    $user = auth()->user();
    $layout = $user?->hasRole('admin')
        ? 'layouts.admin'
        : ($user?->hasRole('agent') ? 'layouts.agent' : 'layouts.student');

    $pageTitle = $user?->hasRole('admin')
        ? 'Notifications'
        : ($user?->hasRole('agent') ? 'Agent Notifications' : 'Student Notifications');

    $pageDescription = $user?->hasRole('admin')
        ? 'Updates on your system, applications, and account.'
        : ($user?->hasRole('agent')
            ? 'Stay updated on account reviews, applications, and agent activity.'
            : 'Stay updated on your applications, scholarships, and account activity.');
@endphp

@extends($layout)

@section('content')
<div class="space-y-6">
    <div class="rounded-[28px] border border-[#0f2441]/10 bg-gradient-to-br from-[#0f2441] via-[#12315b] to-[#0d47a1] p-6 sm:p-8 text-white shadow-[0_24px_60px_rgba(15,36,65,0.22)] overflow-hidden relative">
        <div class="absolute -top-16 -right-10 h-48 w-48 rounded-full bg-white/10 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 left-10 h-44 w-44 rounded-full blur-3xl pointer-events-none" style="background: rgba(31, 164, 99, 0.18);"></div>

        <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.22em] text-white/85">
                    <span class="h-2.5 w-2.5 rounded-full bg-[#1FA463]"></span>
                    Notification Center
                </div>
                <h1 class="mt-5 text-3xl sm:text-4xl font-black brand-font leading-tight">{{ $pageTitle }}</h1>
                <p class="mt-3 max-w-2xl text-sm sm:text-base leading-7 text-blue-100/90">
                    {{ $pageDescription }}
                </p>
            </div>

            @if($user->unreadNotifications->count() > 0)
                <form action="{{ route('notifications.readAll') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-2xl border border-white/15 bg-white/10 px-5 py-3 text-sm font-bold text-white transition hover:bg-white/15"
                    >
                        Mark All Read
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="rounded-[28px] border border-gray-200 bg-white shadow-sm overflow-hidden dark:border-gray-800 dark:bg-gray-900">
        <div class="divide-y divide-gray-100 dark:divide-gray-800">
            @forelse($notifications as $n)
                <div class="p-5 sm:p-6 transition {{ is_null($n->read_at) ? 'bg-blue-50/60 dark:bg-blue-900/10' : 'hover:bg-gray-50 dark:hover:bg-white/5' }}">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
                        <div class="w-12 h-12 rounded-2xl {{ is_null($n->read_at) ? 'bg-[#0D47A1]/10 text-[#0D47A1] dark:bg-blue-500/15 dark:text-blue-300' : 'bg-gray-100 text-gray-500 dark:bg-white/5 dark:text-gray-400' }} flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                                <div class="min-w-0">
                                    <h4 class="font-bold text-[#0f2441] dark:text-white {{ is_null($n->read_at) ? '' : 'opacity-80' }}">
                                        {{ $n->data['title'] ?? 'System Notification' }}
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 leading-6 {{ is_null($n->read_at) ? '' : 'opacity-80' }}">
                                        {{ $n->data['message'] ?? 'You have a new update regarding your account.' }}
                                    </p>
                                </div>

                                <div class="flex items-center gap-3 shrink-0">
                                    <span class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                        {{ $n->created_at->diffForHumans() }}
                                    </span>

                                    @if(is_null($n->read_at))
                                        <form action="{{ route('notifications.read', $n->id) }}" method="POST">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="inline-flex items-center justify-center rounded-full bg-[#f15a24] px-3 py-1.5 text-[11px] font-bold uppercase tracking-wide text-white transition hover:opacity-90"
                                                title="Mark as read"
                                            >
                                                Read
                                            </button>
                                        </form>
                                    @else
                                        <span class="inline-flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wide text-gray-500 dark:bg-white/5 dark:text-gray-400">
                                            <span class="w-2 h-2 rounded-full bg-[#1FA463]"></span>
                                            Read
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if(!empty($n->data['action_url']))
                                <div class="mt-4">
                                    <a
                                        href="{{ $n->data['action_url'] }}"
                                        class="inline-flex items-center gap-2 rounded-xl border border-[#0D47A1]/15 bg-[#0D47A1]/5 px-4 py-2 text-sm font-semibold text-[#0D47A1] transition hover:bg-[#0D47A1]/10 dark:border-blue-400/20 dark:bg-blue-500/10 dark:text-blue-300"
                                    >
                                        Open Notification
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-10 sm:p-14 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 text-gray-400 dark:bg-white/5 dark:text-gray-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <h3 class="mt-5 text-xl font-black brand-font text-[#0f2441] dark:text-white">All caught up!</h3>
                    <p class="mt-2 text-sm sm:text-base text-gray-500 dark:text-gray-400">
                        You don't have any notifications right now.
                    </p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="flex justify-center">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
