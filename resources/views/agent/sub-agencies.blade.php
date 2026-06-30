@extends('layouts.agent')

@section('content')
<div class="bg-[#0f2441] -m-4 sm:-m-6 p-4 sm:p-8 min-h-screen text-white font-sans">
    <div class="mb-8">
        <h1 class="text-3xl font-black brand-font mb-2">Sub Agencies</h1>
        <p class="text-white/60">Manage and track your sub-agency network performance.</p>
    </div>

    <!-- Empty State / Placeholder -->
    <div class="bg-white/5 border border-white/10 rounded-2xl p-12 text-center shadow-2xl backdrop-blur-md">
        <div class="w-20 h-20 bg-blue-500/20 rounded-2xl flex items-center justify-center text-blue-400 mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <h3 class="text-xl font-bold mb-2">Build Your Network</h3>
        <p class="text-white/40 max-w-md mx-auto mb-8">You haven't added any sub-agencies yet. Start expanding your reach by inviting partners to join your network.</p>
        <button class="px-8 py-3.5 bg-[#f15a24] hover:bg-orange-600 text-white font-bold rounded-xl transition shadow-lg shadow-orange-900/20">
            Invite Sub-Agency
        </button>
    </div>
</div>
@endsection
