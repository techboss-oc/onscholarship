@extends('layouts.agent')

@section('content')
<div x-data="{ 
    isAddingManager: false, 
    step: 1,
    form: {
        first_name: '',
        last_name: '',
        email: '',
        title: '',
        gender: '',
        country: '',
        mobile_phone: '',
        permissions: {
            agency: { view: false, create: false, update: false, delete: false },
            manager_user: { view: false, create: false, update: false, delete: false },
            sub_agency_user: { view: false, create: false, update: false, delete: false },
            student_user: { view: false, create: false, update: false, delete: false },
            sub_agency_student_user: { view: false, create: false, update: false, delete: false },
            application: { view: false, create: false, update: false, delete: false }
        }
    }
}">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-white flex items-center gap-3">
                Manager Users
                <span class="text-white/20 text-sm font-normal">|</span>
                <nav class="flex text-sm text-white/40 font-normal" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1">
                        <li class="inline-flex items-center"><a href="#" class="hover:text-white transition">Home</a></li>
                        <li><div class="flex items-center"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg> <span class="ml-1">Users</span></div></li>
                        <li aria-current="page"><div class="flex items-center"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg> <span class="ml-1 text-white/60">Manager User</span></div></li>
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
        <div class="p-6 border-b border-white/10 flex justify-end">
            <button @click="isAddingManager = true; step = 1" class="flex items-center gap-2 bg-[#00C9FF] hover:bg-[#00D2FF] text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-[#00C9FF]/20 uppercase text-xs tracking-wider">
                Add Manager User
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
                        <th class="px-6 py-4">Country</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Is Verified</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($managers as $manager)
                    <tr class="group hover:bg-white/[0.02] transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-[#00C9FF]/20 flex items-center justify-center text-[#00C9FF] font-bold text-sm">
                                    {{ strtoupper(substr($manager->first_name, 0, 1)) }}{{ strtoupper(substr($manager->last_name, 0, 1)) }}
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-white group-hover:text-[#00C9FF] transition">{{ $manager->first_name }} {{ $manager->last_name }}</span>
                                    <span class="text-[11px] text-white/40">{{ $manager->user->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-white/60">{{ $manager->title ?? 'Mr' }}</td>
                        <td class="px-6 py-4 text-sm text-white/60">{{ ucfirst($manager->gender) }}</td>
                        <td class="px-6 py-4 text-sm text-white/60">{{ $manager->mobile_phone }}</td>
                        <td class="px-6 py-4 text-sm text-white/60">{{ $manager->country }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-lg bg-green-500/10 text-green-500 text-[10px] font-bold uppercase tracking-wider">Active</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <span class="px-3 py-1 rounded-lg bg-white/5 text-white/20 text-[10px] font-bold uppercase tracking-wider">Inactive</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-white/20 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center opacity-20">
                                <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                <p class="text-lg font-bold">No managers found</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-white/5 flex items-center justify-between text-white/40 text-xs">
            <div class="flex items-center gap-4">
                <span>Rows per page:</span>
                <div class="flex items-center gap-1 text-white/60">
                    10 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <span>1-{{ $managers->count() }} of {{ $managers->total() }}</span>
                <div class="flex items-center gap-4">
                    <button class="hover:text-white transition opacity-30"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></button>
                    <button class="hover:text-white transition opacity-30"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Multi-step Modal -->
    <div x-show="isAddingManager" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/80 backdrop-blur-md p-4 overflow-y-auto">
        <div @click.away="isAddingManager = false" 
             class="bg-[#0f2441] w-full max-w-md rounded-2xl border border-white/20 shadow-2xl overflow-hidden relative">
            
            <!-- Modal Close -->
            <button @click="isAddingManager = false" class="absolute top-4 right-4 z-20 text-white/40 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Modal Content (Super Compact) -->
            <div class="p-4 md:p-6 max-h-[85vh] overflow-y-auto custom-scrollbar">
                <div class="text-center mb-6">
                    <h2 class="text-lg font-bold text-white uppercase tracking-tight">Add Manager</h2>
                    <div class="w-10 h-1 bg-[#00C9FF] mx-auto mt-1 rounded-full opacity-50"></div>
                </div>

                <!-- Simple Step Dots -->
                <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="w-2 h-2 rounded-full transition-all" :class="step === 1 ? 'bg-[#00C9FF] w-6' : 'bg-green-500'"></div>
                    <div class="w-2 h-2 rounded-full transition-all" :class="step === 2 ? 'bg-[#00C9FF] w-6' : 'bg-white/20'"></div>
                </div>

                <form action="{{ route('agent.managers.store') }}" method="POST">
                    @csrf
                    <!-- Step 1: Form Fields -->
                    <div x-show="step === 1" x-transition class="space-y-4">
                        <h3 class="text-xs font-bold text-white border-b border-white/5 pb-2 mb-4 uppercase tracking-widest opacity-50">Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">First Name</label>
                                <input type="text" name="first_name" x-model="form.first_name" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] focus:ring-1 focus:ring-[#00C9FF] transition" placeholder="First Name">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Last Name</label>
                                <input type="text" name="last_name" x-model="form.last_name" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] focus:ring-1 focus:ring-[#00C9FF] transition" placeholder="Last Name">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Email</label>
                                <input type="email" name="email" x-model="form.email" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] focus:ring-1 focus:ring-[#00C9FF] transition" placeholder="Email Address">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Title</label>
                                <input type="text" name="title" x-model="form.title" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] focus:ring-1 focus:ring-[#00C9FF] transition" placeholder="Mr, Mrs">
                            </div>
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
                                    <div class="flex items-center gap-1 bg-white/5 border border-white/10 rounded-lg px-2 py-2 text-xs text-white">
                                        <span>🇳🇬</span><span>+234</span>
                                    </div>
                                    <input type="text" name="mobile_phone" x-model="form.mobile_phone" class="flex-1 bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition" placeholder="Number">
                                </div>
                            </div>
                            <div class="space-y-1 md:col-span-2">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-wider">Country</label>
                                <select name="country" x-model="country" class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:border-[#00C9FF] transition appearance-none">
                                    <option value="" class="bg-[#0f2441]">Select Country</option>
                                    <option value="Nigeria" class="bg-[#0f2441]">Nigeria</option>
                                    <option value="Ghana" class="bg-[#0f2441]">Ghana</option>
                                    <option value="Kenya" class="bg-[#0f2441]">Kenya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Permissions -->
                    <div x-show="step === 2" x-transition>
                        <div class="flex items-center gap-4 border-b border-white/10 mb-4 overflow-x-auto pb-px">
                            <button type="button" class="pb-2 text-[10px] font-bold text-[#00C9FF] border-b-2 border-[#00C9FF] whitespace-nowrap uppercase tracking-widest">Modules</button>
                            <button type="button" class="pb-2 text-[10px] font-bold text-white/20 hover:text-white transition whitespace-nowrap uppercase tracking-widest">Other</button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="text-[9px] font-bold text-white/40 uppercase tracking-widest">
                                    <tr>
                                        <th class="pb-3 text-left">Module</th>
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
                                            'sub_agency_student_user' => 'SA Student',
                                            'application' => 'App'
                                        ];
                                    @endphp
                                    @foreach($modules as $key => $label)
                                    <tr>
                                        <td class="py-2 font-bold text-white/80">{{ $label }}</td>
                                        @foreach(['view', 'create', 'update', 'delete'] as $action)
                                        <td class="py-2">
                                            <div class="flex justify-center">
                                                <input type="checkbox" name="permissions[{{ $key }}][{{ $action }}]" x-model="form.permissions.{{ $key }}.{{ $action }}" class="w-4 h-4 rounded border-white/10 bg-white/5 text-[#00C9FF] focus:ring-offset-[#0f2441] focus:ring-[#00C9FF] transition">
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="flex items-center justify-between mt-8 pt-4 border-t border-white/10">
                        <button type="button" 
                                @click="step === 1 ? isAddingManager = false : step = 1"
                                class="px-6 py-2 rounded-lg border border-white/10 text-white/40 font-bold hover:bg-white/5 hover:text-white transition uppercase text-[10px] tracking-widest">
                            Back
                        </button>
                        
                        <button type="button" 
                                x-show="step === 1"
                                @click="step = 2"
                                class="px-8 py-2 rounded-lg bg-[#00C9FF] hover:bg-[#00D2FF] text-white font-bold transition shadow-lg shadow-[#00C9FF]/20 uppercase text-[10px] tracking-widest">
                            Next
                        </button>

                        <button type="submit" 
                                x-show="step === 2"
                                class="px-8 py-2 rounded-lg bg-[#00C9FF] hover:bg-[#00D2FF] text-white font-bold transition shadow-lg shadow-[#00C9FF]/20 uppercase text-[10px] tracking-widest">
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
</style>
@endsection
