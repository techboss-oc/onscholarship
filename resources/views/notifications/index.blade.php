@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-black text-[#0f2441] dark:text-white brand-font">Notifications</h1>
        <p class="text-sm text-gray-500 mt-1">Updates on your system, applications, and account.</p>
    </div>
    @if(auth()->user()->unreadNotifications->count() > 0)
        <form action="{{ route('notifications.readAll') }}" method="POST">
            @csrf
            <button type="submit" class="px-5 py-2.5 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-white font-bold rounded-xl hover:bg-gray-50 transition shadow-sm text-sm">
                Mark All Read
            </button>
        </form>
    @endif
</div>

<div class="admin-glass rounded-3xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
    <div class="divide-y divide-gray-100 dark:divide-gray-700">
        @forelse($notifications as $n)
        <div class="p-6 transition {{ is_null($n->read_at) ? 'bg-blue-50/50 dark:bg-blue-900/10' : 'hover:bg-gray-50 dark:hover:bg-gray-800/50' }}">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-full {{ is_null($n->read_at) ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-500' }} flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </div>
                <div class="flex-grow">
                    <h4 class="font-bold text-gray-900 dark:text-white {{ is_null($n->read_at) ? '' : 'opacity-80' }}">{{ $n->data['title'] ?? 'System Notification' }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 {{ is_null($n->read_at) ? '' : 'opacity-80' }}">{{ $n->data['message'] ?? 'You have a new update regarding your account.' }}</p>
                    <p class="text-xs text-gray-400 mt-2">{{ $n->created_at->diffForHumans() }}</p>
                </div>
                <div>
                    @if(is_null($n->read_at))
                        <form action="{{ route('notifications.read', $n->id) }}" method="POST">
                            @csrf
                            <button class="w-3 h-3 bg-[#f15a24] rounded-full hover:scale-125 transition-transform" title="Mark as read"></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">All caught up!</h3>
            <p class="text-gray-500">You don't have any notifications right now.</p>
        </div>
        @endforelse
    </div>
</div>
<div class="mt-6 flex justify-center">{{ $notifications->links() }}</div>
@endsection
