@extends('layouts.agent')

@section('content')
<div class="bg-[#0f2441] -m-4 sm:-m-6 p-4 sm:p-8 min-h-screen text-white font-sans">
    <div class="mb-8">
        <h1 class="text-3xl font-black brand-font mb-2">Partner Commissions</h1>
        <p class="text-white/60">Track your earnings, payouts, and commission rates.</p>
    </div>

    <!-- Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
             <p class="text-white/40 text-xs font-bold uppercase">Pending Payment</p>
             <p class="text-3xl font-black text-blue-400 mt-1">$ 0.00</p>
        </div>
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
             <p class="text-white/40 text-xs font-bold uppercase">Verified Earned</p>
             <p class="text-3xl font-black text-[#f15a24] mt-1">$ 0.00</p>
        </div>
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
             <p class="text-white/40 text-xs font-bold uppercase">Total Paid Out</p>
             <p class="text-3xl font-black text-green-400 mt-1">$ 0.00</p>
        </div>
    </div>

    <!-- Empty State -->
    <div class="bg-white/5 border border-white/10 rounded-2xl p-12 text-center shadow-2xl backdrop-blur-md">
        <div class="w-20 h-20 bg-[#f15a24]/20 text-[#f15a24] rounded-2xl flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <h3 class="text-xl font-bold mb-2">No Commission Data</h3>
        <p class="text-white/40 max-w-md mx-auto">Commission payments are processed once students successfully register and complete their intake. Keep tracking your students to see updates here.</p>
    </div>
</div>
@endsection
