@extends('layouts.agent')

@section('content')
<div class="bg-[#0f2441] -m-4 sm:-m-6 p-4 sm:p-8 min-h-screen text-white font-sans">
    <div class="mb-8">
        <h1 class="text-3xl font-black brand-font mb-2">Student Invitations</h1>
        <p class="text-white/60">Invite students to register using your unique referral link.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Referral Link Card -->
        <div class="lg:col-span-2">
            <div class="bg-white/5 border border-white/10 rounded-2xl p-8 shadow-2xl backdrop-blur-md">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-[#f15a24]/20 rounded-2xl flex items-center justify-center text-[#f15a24]">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold uppercase tracking-widest text-[#f15a24]">Your Referral Link</h3>
                        <p class="text-white/40 text-sm">Copy and share this link with potential students.</p>
                    </div>
                </div>

                <div class="relative group">
                    <input type="text" readonly id="referralLink" value="{{ url('/register?role=student&ref=' . $agentProfile->agent_reference) }}"
                        class="w-full bg-white/5 border border-white/20 rounded-xl px-4 py-4 pr-32 text-white font-mono text-sm focus:outline-none focus:border-[#f15a24] transition">
                    <button onclick="copyLink()" class="absolute right-2 top-2 bottom-2 px-6 bg-[#f15a24] hover:bg-orange-600 rounded-lg text-xs font-black uppercase tracking-widest transition">
                        Copy Link
                    </button>
                </div>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-white/5 rounded-xl border border-white/5 text-center">
                        <p class="text-white/40 text-[10px] uppercase font-black mb-1">Status</p>
                        <p class="text-green-400 font-bold">Active</p>
                    </div>
                    <div class="p-4 bg-white/5 rounded-xl border border-white/5 text-center">
                        <p class="text-white/40 text-[10px] uppercase font-black mb-1">Your Code</p>
                        <p class="text-white font-bold">{{ $agentProfile->agent_reference }}</p>
                    </div>
                    <div class="p-4 bg-white/5 rounded-xl border border-white/5 text-center">
                        <p class="text-white/40 text-[10px] uppercase font-black mb-1">Commission Type</p>
                        <p class="text-white font-bold">Performance</p>
                    </div>
                </div>
            </div>

            <!-- How it works -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex flex-col items-center text-center p-6 bg-white/3 border border-white/5 rounded-2xl">
                    <div class="w-10 h-10 bg-blue-500/10 rounded-full flex items-center justify-center text-blue-400 mb-4 font-black">1</div>
                    <p class="text-sm font-bold mb-2">Share Link</p>
                    <p class="text-xs text-white/40">Student clicks your link and registers on the platform.</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 bg-white/3 border border-white/5 rounded-2xl">
                    <div class="w-10 h-10 bg-blue-500/10 rounded-full flex items-center justify-center text-blue-400 mb-4 font-black">2</div>
                    <p class="text-sm font-bold mb-2">Apply</p>
                    <p class="text-xs text-white/40">Student applies to their preferred university programs.</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 bg-white/3 border border-white/5 rounded-2xl">
                    <div class="w-10 h-10 bg-blue-500/10 rounded-full flex items-center justify-center text-blue-400 mb-4 font-black">3</div>
                    <p class="text-sm font-bold mb-2">Earn</p>
                    <p class="text-xs text-white/40">Receive commissions once the student successfully registers.</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            <div class="bg-[#f15a24]/10 border border-[#f15a24]/20 rounded-2xl p-6">
                <h4 class="text-[#f15a24] font-black uppercase text-xs mb-4 tracking-widest">Share via</h4>
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-2 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition text-xs font-bold">
                        <span>WhatsApp</span>
                    </button>
                    <button class="flex items-center justify-center gap-2 p-3 bg-white/5 hover:bg-white/10 rounded-xl transition text-xs font-bold">
                        <span>Email</span>
                    </button>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                <h4 class="text-white/60 font-black uppercase text-xs mb-4 tracking-widest">Important Note</h4>
                <p class="text-xs text-white/40 leading-relaxed">Ensure students register directly through your link. Students registered without a referral link cannot be retroactively linked to your agency except through manual admin intervention.</p>
            </div>
        </div>
    </div>
</div>

<script>
function copyLink() {
    var copyText = document.getElementById("referralLink");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    
    // Optional: Toast or feedback
    alert("Referral link copied to clipboard!");
}
</script>
@endsection
