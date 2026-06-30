@extends('layouts.agent')

@section('content')
<!-- Sidebar-Matched Dashboard Context -->
<div class="bg-[#0f2441] -m-4 sm:-m-6 p-4 sm:p-8 min-h-screen text-white">
    
    <!-- Top Header Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Potential Commission -->
        <div class="relative overflow-hidden bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl group transition-all hover:bg-white/10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.407 2.641 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.407-2.641-1M12 16v1m-7-4a4 4 0 118 0 4 4 0 01-8 0zM17 11a3 3 0 110 6 3 3 0 010-6z"/></svg>
                </div>
                <div class="text-white/40 group-hover:text-white/60 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
            </div>
            <div>
                <p class="text-white/60 text-sm font-medium uppercase tracking-wider">Potential Commission</p>
                <p class="text-4xl font-black mt-1">$ {{ number_format($commissions['potential'], 2) }}</p>
            </div>
            <div class="h-1 w-full bg-blue-500/10 mt-6 rounded-full overflow-hidden">
                <div class="h-full bg-blue-500 w-1/3"></div>
            </div>
        </div>

        <!-- Earned Commission -->
        <div class="relative overflow-hidden bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl group transition-all hover:bg-white/10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-[#f15a24]/20 flex items-center justify-center text-[#f15a24] group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.407 2.641 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.407-2.641-1M12 16v1m-7-4a4 4 0 118 0 4 4 0 01-8 0zM17 11a3 3 0 110 6 3 3 0 010-6z"/></svg>
                </div>
                <div class="text-white/40 group-hover:text-white/60 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
            </div>
            <div>
                <p class="text-white/60 text-sm font-medium uppercase tracking-wider">Earned Commission</p>
                <p class="text-4xl font-black mt-1">$ {{ number_format($commissions['earned'], 2) }}</p>
            </div>
            <div class="h-1 w-full bg-[#f15a24]/10 mt-6 rounded-full overflow-hidden">
                <div class="h-full bg-[#f15a24] w-2/3"></div>
            </div>
        </div>

        <!-- Withdrawn -->
        <div class="relative overflow-hidden bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl group transition-all hover:bg-white/10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center text-green-400 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div class="text-white/40 group-hover:text-white/60 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
            </div>
            <div>
                <p class="text-white/60 text-sm font-medium uppercase tracking-wider">Withdrawn</p>
                <p class="text-4xl font-black mt-1">$ {{ number_format($commissions['withdrawn'], 2) }}</p>
            </div>
            <div class="h-1 w-full bg-green-500/10 mt-6 rounded-full overflow-hidden">
                <div class="h-full bg-green-500 w-1/4"></div>
            </div>
        </div>
    </div>

    <!-- Analytics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white/5 border border-white/5 rounded-xl p-4 transition hover:bg-white/10">
            <div class="flex items-center justify-between mb-2 text-blue-400">
                <div class="font-black text-2xl">{{ $stats['total_apps'] }} / {{ $myStudentsCount }}</div>
                <div class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
            </div>
            <p class="text-white/60 text-xs font-bold">Applications</p>
        </div>
        <div class="bg-white/5 border border-white/5 rounded-xl p-4 transition hover:bg-white/10">
            <div class="flex items-center justify-between mb-2 text-cyan-400">
                <div class="font-black text-2xl">{{ $stats['offers_sent'] }}</div>
                <div class="w-8 h-8 rounded-lg bg-cyan-500/10 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-white/60 text-xs font-bold">Offer Letters</p>
        </div>
        <div class="bg-white/5 border border-white/5 rounded-xl p-4 transition hover:bg-white/10">
            <div class="flex items-center justify-between mb-2 text-[#f15a24]">
                <div class="font-black text-2xl">{{ $stats['accepted'] }}</div>
                <div class="w-8 h-8 rounded-lg bg-[#f15a24]/10 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-white/60 text-xs font-bold">Accepted</p>
        </div>
        <div class="bg-white/5 border border-white/5 rounded-xl p-4 transition hover:bg-white/10">
            <div class="flex items-center justify-between mb-2 text-green-400">
                <div class="font-black text-2xl">{{ $stats['registered'] }}</div>
                <div class="w-8 h-8 rounded-lg bg-green-500/10 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
            </div>
            <p class="text-white/60 text-xs font-bold">Registered</p>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm">
            <p class="text-white font-bold mb-1">Daily Applications</p>
            <p class="text-white/40 text-xs mb-4">Last 7 days performance</p>
            <div class="h-48">
                <canvas id="appsChart"></canvas>
            </div>
        </div>
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm">
            <p class="text-white font-bold mb-1">Daily Acceptance</p>
            <p class="text-white/40 text-xs mb-4">Last 7 days performance</p>
            <div class="h-48">
                <canvas id="acceptanceChart"></canvas>
            </div>
        </div>
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm">
            <p class="text-white font-bold mb-1">Daily Registered</p>
            <p class="text-white/40 text-xs mb-4">Last 7 days performance</p>
            <div class="h-48">
                <canvas id="registeredChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Announcements Table -->
    <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden shadow-2xl backdrop-blur-md">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h3 class="font-bold text-xl text-white brand-font">Recent Announcements</h3>
            <div class="flex items-center gap-2">
                <button class="p-2 hover:bg-white/10 rounded-lg text-white/60 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-white/40 text-[10px] uppercase tracking-wider border-b border-white/10">
                        <th class="p-4 pl-6 font-bold">University / Org</th>
                        <th class="p-4 font-bold">Announcement Topic</th>
                        <th class="p-4 font-bold">Date Published</th>
                        <th class="p-4 pr-6 text-right font-bold">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-white/5">
                    @forelse($announcements as $ann)
                    <tr class="hover:bg-white/[0.03] transition">
                        <td class="p-4 pl-6 text-white/80 font-medium">{{ $ann->university_name ?? 'Global' }}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <span class="text-[#f15a24]">📢</span>
                                <span class="text-white group-hover:text-[#f15a24] transition">{{ $ann->title }}</span>
                            </div>
                        </td>
                        <td class="p-4 text-white/60">{{ $ann->published_at->format('M d, Y') }}</td>
                        <td class="p-4 pr-6 text-right">
                            <button class="text-[#f15a24] hover:underline font-bold text-xs">View Details</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-10 text-center text-white/40 italic">No announcements found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { display: false, beginAtZero: true },
            x: { grid: { display: false }, ticks: { color: 'rgba(255,255,255,0.3)', font: { size: 10 } } }
        },
        plugins: { legend: { display: false } },
        elements: { point: { radius: 0 }, line: { tension: 0.4, borderWidth: 3 } }
    };

    new Chart(document.getElementById('appsChart'), {
        type: 'line',
        options: commonOptions,
        data: {
            labels: @json($chartData['labels']),
            datasets: [{ data: @json($chartData['apps']), borderColor: '#60a5fa', backgroundColor: 'rgba(96, 165, 250, 0.1)', fill: true }]
        }
    });

    new Chart(document.getElementById('acceptanceChart'), {
        type: 'line',
        options: commonOptions,
        data: {
            labels: @json($chartData['labels']),
            datasets: [{ data: @json($chartData['acceptance']), borderColor: '#4ade80', backgroundColor: 'rgba(74, 222, 128, 0.1)', fill: true }]
        }
    });

    new Chart(document.getElementById('registeredChart'), {
        type: 'line',
        options: commonOptions,
        data: {
            labels: @json($chartData['labels']),
            datasets: [{ data: @json($chartData['registered']), borderColor: '#fbbf24', backgroundColor: 'rgba(251, 191, 36, 0.1)', fill: true }]
        }
    });
</script>
@endsection
