@extends('layouts.agent')

@section('content')
<div x-data="{ 
    isAddingAgencyUser: false, 
    step: 1,
    form: {
        first_name: '',
        last_name: '',
        email: '',
        title: '',
        gender: '',
        country: '',
        mobile_phone: '',
        agency_name: '',
        permissions: {
            agency: { view: false, create: false, update: false, delete: false },
            manager_user: { view: false, create: false, update: false, delete: false },
            sub_agency_user: { view: false, create: false, update: false, delete: false },
            student_user: { view: false, create: false, update: false, delete: false },
            application: { view: false, create: false, update: false, delete: false }
        }
    }
}">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-white flex items-center gap-3">
                Agency Users
                <span class="text-white/20 text-sm font-normal">|</span>
                <nav class="flex text-sm text-white/40 font-normal" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1">
                        <li class="inline-flex items-center"><a href="#" class="hover:text-white transition">Home</a></li>
                        <li><div class="flex items-center"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg> <span class="ml-1">Users</span></div></li>
                        <li aria-current="page"><div class="flex items-center"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg> <span class="ml-1 text-white/60">Agency User</span></div></li>
                    </ol>
                </nav>
            </h1>
        </div>
        <div class="flex items-center gap-3">
            <button class="p-2 rounded-xl bg-white/5 text-white/40 hover:bg-white/10 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
            </button>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white/5 rounded-2xl border border-white/10 mb-8 overflow-hidden">
        <div class="px-6 py-4 flex items-center justify-between border-b border-white/10">
            <div class="flex items-center gap-3 text-white">
                <svg class="w-5 h-5 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                <span class="font-bold">Filters</span>
            </div>
            <svg class="w-5 h-5 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-[#0f2441] rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
        <div class="p-4 border-b border-white/10 flex justify-end">
            <button @click="isAddingAgencyUser = true; step = 1" class="flex items-center gap-2 bg-[#00C9FF] hover:bg-[#00D2FF] text-white px-6 py-2 rounded-xl font-bold transition shadow-lg shadow-[#00C9FF]/20 uppercase text-xs tracking-wider">
                Add Agency User
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-white/40 text-[11px] font-bold uppercase tracking-widest border-b border-white/5">
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Gender</th>
                        <th class="px-6 py-4">Phone</th>
                        <th class="px-6 py-4">Agency</th>
                        <th class="px-6 py-4">Country</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Is Verified</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($agencyUsers as $agencyUser)
                    <tr class="group hover:bg-white/[0.02] transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#00C9FF]/20 flex items-center justify-center text-[#00C9FF] font-bold text-xs">
                                    {{ strtoupper(substr($agencyUser->first_name, 0, 1)) }}{{ strtoupper(substr($agencyUser->last_name, 0, 1)) }}
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-white group-hover:text-[#00C9FF] transition">{{ $agencyUser->first_name }} {{ $agencyUser->last_name }}</span>
                                    <span class="text-[10px] text-white/40">{{ $agencyUser->user->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs text-white/60">{{ $agencyUser->title ?? 'Mr' }}</td>
                        <td class="px-6 py-4 text-xs text-white/60">{{ ucfirst($agencyUser->gender) }}</td>
                        <td class="px-6 py-4 text-xs text-white/60">{{ $agencyUser->mobile_phone }}</td>
                        <td class="px-6 py-4 text-xs text-white/60">{{ $agencyUser->agency_name }}</td>
                        <td class="px-6 py-4 text-xs text-white/60">{{ $agencyUser->country }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded bg-green-500/10 text-green-500 text-[9px] font-bold uppercase">Active</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded bg-white/5 text-white/20 text-[9px] font-bold uppercase">No</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-white/20 hover:text-white transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-12 text-center">
                            <p class="text-white/20 text-sm italic">No agency users found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Multi-step Mini Popup -->
    <div x-show="isAddingAgencyUser" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/80 backdrop-blur-md p-4 overflow-y-auto">
        <div @click.away="isAddingAgencyUser = false" class="bg-[#0f2441] w-full max-w-md rounded-2xl border border-white/20 shadow-2xl overflow-hidden relative">
            
            <button @click="isAddingAgencyUser = false" class="absolute top-4 right-4 z-20 text-white/40 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="p-4 md:p-6 max-h-[85vh] overflow-y-auto custom-scrollbar">
                <div class="text-center mb-6">
                    <h2 class="text-lg font-bold text-white uppercase tracking-tight">Add Sub-Agency User</h2>
                    <div class="w-10 h-1 bg-[#00C9FF] mx-auto mt-1 rounded-full opacity-50"></div>
                    <p class="text-[10px] text-white/40 mt-2">Enter user information.</p>
                </div>

                <!-- Dots Progress -->
                <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="w-2 h-2 rounded-full transition-all" :class="step === 1 ? 'bg-[#00C9FF] w-6' : 'bg-green-500'"></div>
                    <div class="w-2 h-2 rounded-full transition-all" :class="step === 2 ? 'bg-[#00C9FF] w-6' : 'bg-white/20'"></div>
                </div>

                <form action="{{ route('agent.agency.store') }}" method="POST">
                    @csrf
                    <!-- Step 1 -->
                    <div x-show="step === 1" x-transition class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">First Name</label>
                                <input type="text" name="first_name" x-model="form.first_name" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition" placeholder="First Name">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Last Name</label>
                                <input type="text" name="last_name" x-model="form.last_name" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Email</label>
                                <input type="email" name="email" x-model="form.email" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition" placeholder="Email">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Title</label>
                                <input type="text" name="title" x-model="form.title" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition" placeholder="Mr, Mrs">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Gender</label>
                                <select name="gender" x-model="form.gender" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition appearance-none">
                                    <option value="" class="bg-[#0f2441]">Select</option>
                                    <option value="male" class="bg-[#0f2441]">Male</option>
                                    <option value="female" class="bg-[#0f2441]">Female</option>
                                </select>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Mobile</label>
                                <div class="flex items-center gap-1.5">
                                    <div class="flex items-center gap-1 bg-white/5 border border-white/10 rounded-lg px-2 py-2 text-[10px] text-white">
                                        <span>🇳🇬</span><span>+234</span>
                                    </div>
                                    <input type="text" name="mobile_phone" x-model="form.mobile_phone" class="flex-1 bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition" placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Country</label>
                                <select name="country" x-model="form.country" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition appearance-none">
                                    <option value="" class="bg-[#0f2441]">Select</option>
                                    <option value="Nigeria" class="bg-[#0f2441]">Nigeria</option>
                                    <option value="Ghana" class="bg-[#0f2441]">Ghana</option>
                                </select>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Agency</label>
                                <select name="agency_name" x-model="form.agency_name" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition appearance-none">
                                    <option value="" class="bg-[#0f2441]">Select Agency</option>
                                    <option value="Agency One" class="bg-[#0f2441]">Agency One</option>
                                    <option value="Agency Two" class="bg-[#0f2441]">Agency Two</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div x-show="step === 2" x-transition>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="text-[9px] font-bold text-white/40 uppercase tracking-widest">
                                    <tr>
                                        <th class="pb-3">Module</th>
                                        <th class="pb-3 text-center">V</th>
                                        <th class="pb-3 text-center">C</th>
                                        <th class="pb-3 text-center">U</th>
                                        <th class="pb-3 text-center">D</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5 text-[11px]">
                                    @php
                                        $modules = [
                                            'agency' => 'Agency',
                                            'manager_user' => 'Manager',
                                            'sub_agency_user' => 'Sub Agency',
                                            'student_user' => 'Student',
                                            'application' => 'App'
                                        ];
                                    @endphp
                                    @foreach($modules as $key => $label)
                                    <tr>
                                        <td class="py-2 font-bold text-white/80">{{ $label }}</td>
                                        @foreach(['view', 'create', 'update', 'delete'] as $action)
                                        <td class="py-2">
                                            <div class="flex justify-center">
                                                <input type="checkbox" name="permissions[{{ $key }}][{{ $action }}]" x-model="form.permissions.{{ $key }}.{{ $action }}" class="w-4 h-4 rounded border-white/10 bg-white/5 text-[#00C9FF] focus:ring-[#00C9FF] transition">
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-8 pt-4 border-t border-white/10">
                        <button type="button" @click="step === 1 ? isAddingAgencyUser = false : step = 1" class="px-6 py-2 rounded-lg border border-white/10 text-white/40 font-bold hover:text-white transition uppercase text-[10px] tracking-widest">
                            Back
                        </button>
                        <button type="button" x-show="step === 1" @click="step = 2" class="px-8 py-2 rounded-lg bg-[#00C9FF] hover:bg-[#00D2FF] text-white font-bold transition shadow-lg shadow-[#00C9FF]/20 uppercase text-[10px] tracking-widest">
                            Next
                        </button>
                        <button type="submit" x-show="step === 2" class="px-8 py-2 rounded-lg bg-[#00C9FF] hover:bg-[#00D2FF] text-white font-bold transition shadow-lg shadow-[#00C9FF]/20 uppercase text-[10px] tracking-widest">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
[x-cloak] { display: none !important; }
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.05); }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 10px; }
</style>
@endsection
