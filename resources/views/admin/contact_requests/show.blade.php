@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="admin-page-title">Contact Message</h1>
            <p class="admin-page-subtitle">Read the full enquiry and update the status.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.contact_requests.index') }}" class="px-5 py-3 rounded-xl font-bold text-sm border transition hover:bg-gray-50 dark:hover:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                Back to Messages
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="admin-card p-6 lg:col-span-2">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h2 class="text-xl font-black brand-font" style="color: var(--text-primary);">{{ $contactRequest->subject }}</h2>
                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide
                            {{ $contactRequest->status === 'new' ? 'bg-[#f15a24]/10 text-[#f15a24]' : '' }}
                            {{ $contactRequest->status === 'read' ? 'bg-blue-500/10 text-blue-500' : '' }}
                            {{ $contactRequest->status === 'replied' ? 'bg-emerald-500/10 text-emerald-500' : '' }}
                            {{ $contactRequest->status === 'closed' ? 'bg-gray-500/10 text-gray-500' : '' }}
                        ">
                            {{ $contactRequest->status }}
                        </span>
                    </div>
                    <p class="mt-2 text-sm" style="color: var(--text-muted);">
                        Received {{ $contactRequest->created_at->format('M j, Y g:i A') }} • {{ $contactRequest->created_at->diffForHumans() }}
                    </p>
                </div>

                <div class="flex flex-wrap gap-2">
                    <form method="POST" action="{{ route('admin.contact_requests.status', $contactRequest->id) }}">
                        @csrf
                        <input type="hidden" name="status" value="read">
                        <button type="submit" class="px-5 py-3 rounded-xl font-bold text-sm border transition hover:bg-gray-50 dark:hover:bg-white/5" style="border-color: var(--border); color: var(--text-primary);">
                            Mark Read
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.contact_requests.status', $contactRequest->id) }}">
                        @csrf
                        <input type="hidden" name="status" value="replied">
                        <button type="submit" class="px-5 py-3 rounded-xl font-bold text-sm text-white transition hover:opacity-95" style="background: var(--accent);">
                            Mark Replied
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-6 rounded-2xl border p-5" style="border-color: var(--border);">
                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Message</p>
                <div class="mt-3 text-sm leading-7 whitespace-pre-line" style="color: var(--text-secondary);">
                    {{ $contactRequest->message }}
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <h3 class="brand-font font-bold text-base" style="color: var(--text-primary);">Sender Details</h3>

            <div class="mt-5 space-y-4">
                <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                    <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Name</p>
                    <p class="mt-2 text-sm font-semibold" style="color: var(--text-primary);">{{ $contactRequest->name }}</p>
                </div>

                <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                    <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Email</p>
                    <a href="mailto:{{ $contactRequest->email }}" class="mt-2 inline-flex text-sm font-semibold break-all hover:underline" style="color: var(--accent);">
                        {{ $contactRequest->email }}
                    </a>
                </div>

                @if(!empty($contactRequest->phone))
                    <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                        <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Phone</p>
                        <p class="mt-2 text-sm font-semibold" style="color: var(--text-primary);">{{ $contactRequest->phone }}</p>
                    </div>
                @endif

                @if(!empty($contactRequest->country))
                    <div class="rounded-2xl border p-4" style="border-color: var(--border);">
                        <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Country</p>
                        <p class="mt-2 text-sm font-semibold" style="color: var(--text-primary);">{{ $contactRequest->country }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

