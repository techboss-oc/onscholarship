@extends('layouts.student')

@section('title', 'Complete Your Profile | Onscholarship')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center p-4 sm:p-6" x-data="onboardingForm()">
    
    <!-- Onboarding Container -->
    <div class="w-full max-w-4xl bg-[#0b111e] border border-white/5 rounded-3xl shadow-2xl overflow-hidden relative">
        <div class="absolute inset-0 bg-gradient-to-br from-[#0f2441] to-transparent opacity-20 pointer-events-none"></div>
        
        <!-- Header -->
        <div class="p-8 pb-4 text-center relative z-10">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white mb-2 leading-tight">
                Complete Your Profile And Start Your Adventure 🚀
            </h1>
            <p class="text-white/40 text-sm font-medium">Refinement your information.</p>
        </div>

        <!-- Progress Stepper -->
        <div class="px-8 py-6 relative z-10">
            <div class="flex items-center justify-between max-w-2xl mx-auto relative">
                <!-- Progress Line -->
                <div class="absolute top-1/2 left-0 w-full h-[2px] bg-white/10 -translate-y-1/2"></div>
                <div class="absolute top-1/2 left-0 h-[2px] bg-[#f15a24] -translate-y-1/2 transition-all duration-500" :style="'width: ' + ((step - 1) * 50) + '%'"></div>

                <!-- Step 1 -->
                <div class="relative flex flex-col items-center gap-2">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 border-2" 
                         :class="step >= 1 ? 'bg-[#f15a24] border-[#f15a24] text-white' : 'bg-[#0b111e] border-white/10 text-white/40'">
                        <template x-if="step > 1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </template>
                        <template x-if="step <= 1"><span>01</span></template>
                    </div>
                    <div class="text-[10px] font-black uppercase tracking-widest" :class="step >= 1 ? 'text-white' : 'text-white/20'">Account Details</div>
                </div>

                <!-- Step 2 -->
                <div class="relative flex flex-col items-center gap-2">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 border-2"
                         :class="step >= 2 ? 'bg-[#f15a24] border-[#f15a24] text-white' : 'bg-[#0b111e] border-white/10 text-white/40'">
                        <template x-if="step > 2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </template>
                        <template x-if="step <= 2"><span>02</span></template>
                    </div>
                    <div class="text-[10px] font-black uppercase tracking-widest" :class="step >= 2 ? 'text-white' : 'text-white/20'">Student Information</div>
                </div>

                <!-- Step 3 -->
                <div class="relative flex flex-col items-center gap-2">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 border-2"
                         :class="step >= 3 ? 'bg-[#f15a24] border-[#f15a24] text-white' : 'bg-[#0b111e] border-white/10 text-white/40'">
                        <span>03</span>
                    </div>
                    <div class="text-[10px] font-black uppercase tracking-widest" :class="step >= 3 ? 'text-white' : 'text-white/20'">Documents</div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="px-8 py-8 relative z-10 min-h-[400px]">
            
            <!-- STEP 1: Account Details -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0">
                <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-[#f15a24] rounded-full"></span>
                    Basic Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">First Name</label>
                        <input type="text" x-model="formData.first_name" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#f15a24] placeholder-white/20 transition" placeholder="Enter first name">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">Last Name</label>
                        <input type="text" x-model="formData.last_name" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#f15a24] placeholder-white/20 transition" placeholder="Enter last name">
                    </div>
                    <div class="col-span-1 md:col-span-2 space-y-2 opacity-50">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">Email Address (Read-only)</label>
                        <input type="email" value="{{ $user->email }}" readonly class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none cursor-not-allowed">
                    </div>
                </div>
            </div>

            <!-- STEP 2: Student Information -->
            <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-[#f15a24] rounded-full"></span>
                    Personal Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">Passport Number</label>
                        <input type="text" x-model="formData.passport_number" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#f15a24] transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">Nationality</label>
                        <select x-model="formData.nationality" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#f15a24] transition appearance-none">
                            <option value="">Select Nationality</option>
                            @include('partials.countries-options')
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">Gender</label>
                        <select x-model="formData.gender" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#f15a24] transition appearance-none">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">Date of Birth</label>
                        <input type="date" x-model="formData.date_of_birth" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#f15a24] transition">
                    </div>
                    <div class="col-span-1 md:col-span-2 space-y-2">
                        <label class="text-xs font-bold text-white/60 uppercase tracking-tighter">Current Address</label>
                        <textarea x-model="formData.address" rows="3" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#f15a24] transition"></textarea>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Documents -->
            <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                <h2 class="text-xl font-bold text-white mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-[#f15a24] rounded-full"></span>
                    Essential Documents
                </h2>
                <p class="text-white/40 text-xs mb-8">Please upload clear copies of your documents.</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <template x-for="type in ['Passport', 'Diploma', 'Transcript']">
                        <div class="p-6 bg-white/5 border-2 border-dashed rounded-2xl flex flex-col items-center justify-center gap-4 transition-all duration-300"
                             :class="isUploaded(type) ? 'border-green-500/30 bg-green-500/5' : 'border-white/10 bg-white/5 hover:bg-white/10'">
                            
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center transition-colors"
                                 :class="isUploaded(type) ? 'bg-green-500/20 text-green-500' : 'bg-[#f15a24]/10 text-[#f15a24]'">
                                <svg x-show="!isUploaded(type)" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                <svg x-show="isUploaded(type)" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            
                            <div class="text-center">
                                <h3 class="text-sm font-bold text-white" x-text="type"></h3>
                                <p class="text-[10px] text-white/20 uppercase tracking-widest mt-1" x-text="isUploaded(type) ? 'Verified' : 'Required'"></p>
                            </div>

                            <input type="file" :id="'file-' + type" @change="uploadFile($event, type)" class="hidden">
                            <button @click="document.getElementById('file-' + type).click()" 
                                    class="px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-wider transition shadow-lg"
                                    :class="isUploaded(type) ? 'bg-green-500 text-white' : 'bg-white/10 text-white hover:bg-[#f15a24]'">
                                <span x-text="isUploaded(type) ? 'Replace' : 'Upload'"></span>
                            </button>
                        </div>
                    </template>
                </div>
                
                <!-- Final Finish Button -->
                <div class="mt-12 flex justify-center" x-show="allDocsUploaded()">
                    <button @click="finish()" class="px-12 py-4 bg-gradient-to-r from-[#f15a24] to-[#ff8c37] text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-[0_10px_30px_rgba(241,90,36,0.4)] hover:scale-105 transition duration-300">
                        Finish Profile Registration
                    </button>
                </div>
            </div>

        </div>

        <!-- Sticky Footer -->
        <div class="p-8 border-t border-white/5 flex items-center justify-between relative z-10">
            <button x-show="step > 1" @click="step--" class="flex items-center gap-2 text-white/40 hover:text-white text-xs font-bold uppercase transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </button>
            <div x-show="step === 1" class="w-4 h-4"></div> <!-- Spacer -->

            <button x-show="step < 3" @click="nextStep()" class="px-8 py-3 bg-[#f15a24] text-white rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-[#d94e1c] transition shadow-lg shadow-[#f15a24]/20 flex items-center gap-2">
                Continue
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>

    </div>

    <!-- Background Elements -->
    <div class="fixed top-[-10%] right-[-10%] w-[50%] h-[50%] bg-[#f15a24]/10 blur-[120px] rounded-full -z-10 animate-pulse"></div>
    <div class="fixed bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-600/10 blur-[100px] rounded-full -z-10"></div>
</div>

<script>
function onboardingForm() {
    return {
        step: 1,
        formData: {
            first_name: '{{ $profile->first_name ?? "" }}',
            last_name: '{{ $profile->last_name ?? "" }}',
            gender: '{{ $profile->gender ?? "" }}',
            nationality: '{{ $profile->nationality ?? "" }}',
            date_of_birth: '{{ $profile->date_of_birth ? $profile->date_of_birth->format("Y-m-d") : "" }}',
            passport_number: '{{ $profile->passport_number ?? "" }}',
            passport_expiry: '{{ $profile->passport_expiry ? $profile->passport_expiry->format("Y-m-d") : "" }}',
            address: '{{ $profile->address ?? "" }}',
        },
        uploadedDocs: {
            @foreach($documents as $doc)
                @if(in_array($doc->document_type, ['Passport', 'Diploma', 'Transcript']))
                    '{{ $doc->document_type }}': true,
                @endif
            @endforeach
        },

        nextStep() {
            // Validate & Save current step
            fetch('{{ route("student.onboarding.save") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    step: this.step,
                    ...this.formData
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    this.step++;
                } else {
                    alert(data.message || 'Validation failed. Please check your inputs.');
                }
            });
        },

        uploadFile(event, type) {
            const file = event.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('document_type', type);
            formData.append('file', file);

            fetch('{{ route("student.documents.upload") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                this.uploadedDocs[type] = true;
            });
        },

        isUploaded(type) {
            return !!this.uploadedDocs[type];
        },

        allDocsUploaded() {
            return this.uploadedDocs['Passport'] && this.uploadedDocs['Diploma'] && this.uploadedDocs['Transcript'];
        },

        finish() {
            window.location.href = '{{ route("student.applications.create") }}';
        }
    }
}
</script>

<style>
[x-cloak] { display: none !important; }
.sidebar-active { color: #f15a24; background: rgba(241,90,36,0.1); }
</style>
@endsection
