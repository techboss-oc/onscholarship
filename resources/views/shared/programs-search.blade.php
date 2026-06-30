@extends($layoutName)

@section('content')
<style>
/* =============================================
   FIND PROGRAMS — DARK THEME, BRAND MATCHED
   Brand: #0f2441 navy | #f15a24 orange
   ============================================= */

.fp-wrap {
    background: #0b111e;
    color: #e2e8f0;
    margin: -1rem;
    min-height: calc(100vh - 64px);
    font-family: 'Inter', sans-serif;
}
@media(min-width:640px){ .fp-wrap { margin: -1.5rem; } }

/* Page header */
.fp-header {
    background: #0f2441;
    padding: 1.25rem 1.5rem 1rem;
    border-bottom: 3px solid #f15a24;
}
.fp-header-eyebrow {
    font-size:.65rem; font-weight:700; letter-spacing:.12em;
    text-transform:uppercase; color:#f15a24; margin-bottom:.25rem;
}
.fp-header h1 {
    font-size:1.35rem; font-weight:900; color:#fff;
    font-family:'Outfit',sans-serif; line-height:1.2; margin-bottom:.2rem;
}
.fp-header-sub { font-size:.78rem; color:rgba(255,255,255,0.4); }
.fp-header-stats {
    display:flex; gap:1.5rem; margin-top:.85rem; flex-wrap:wrap;
}
.fp-stat-val { font-size:1.05rem; font-weight:900; color:#fff; font-family:'Outfit',sans-serif; }
.fp-stat-lbl { font-size:.6rem; font-weight:600; letter-spacing:.07em; text-transform:uppercase; color:rgba(255,255,255,0.3); }
.fp-stat-sep { width:1px; background:rgba(255,255,255,0.08); }

/* Layout */
.fp-layout {
    display:flex; align-items:flex-start;
    min-height:calc(100vh - 200px);
}

/* Sidebar */
.fp-sidebar {
    width:230px; flex-shrink:0;
    background:#080e1a;
    min-height:calc(100vh - 200px);
    padding:1.1rem .9rem;
    border-right:1px solid rgba(255,255,255,0.05);
    position:sticky; top:64px;
    max-height:calc(100vh - 64px);
    overflow-y:auto;
}
@media(max-width:1023px){ .fp-sidebar{ display:none; } }
@media(max-width:1023px){ .fp-sidebar.fp-open{ display:block; position:fixed; left:0; top:64px; bottom:0; z-index:50; width:250px; box-shadow:8px 0 32px rgba(0,0,0,.5); } }

.fp-sidebar-head {
    font-size:.65rem; font-weight:800; letter-spacing:.1em; text-transform:uppercase;
    color:rgba(255,255,255,.3); margin-bottom:.9rem; padding-bottom:.65rem;
    border-bottom:1px solid rgba(255,255,255,.05);
    display:flex; align-items:center; gap:.4rem;
}
.fp-lbl {
    display:block; font-size:.62rem; font-weight:700; letter-spacing:.08em;
    text-transform:uppercase; color:rgba(255,255,255,.28);
    margin-top:.75rem; margin-bottom:.25rem;
}
.fp-sel, .fp-inp {
    width:100%;
    background:rgba(255,255,255,.04);
    border:1px solid rgba(255,255,255,.07);
    border-radius:7px;
    padding:.45rem .65rem;
    font-size:.78rem; color:rgba(255,255,255,.7);
    outline:none; transition:border-color .2s;
    appearance:none; cursor:pointer;
}
.fp-sel:focus, .fp-inp:focus { border-color:rgba(241,90,36,.45); }
.fp-sel option { background:#0f2441; color:#fff; }
.fp-inp::placeholder { color:rgba(255,255,255,.18); }
.fp-range { display:flex; gap:.35rem; }
.fp-range .fp-inp { width:50%; }

.fp-sidebar-div { height:1px; background:rgba(255,255,255,.05); margin:.85rem 0; }

.fp-btn-filter {
    display:flex; align-items:center; justify-content:center; gap:.35rem;
    width:100%; margin-top:.9rem; padding:.6rem;
    border-radius:7px; background:#f15a24;
    color:#fff; font-weight:800; font-size:.7rem;
    letter-spacing:.08em; text-transform:uppercase;
    border:none; cursor:pointer;
    transition:background .2s, transform .15s;
    box-shadow:0 4px 14px rgba(241,90,36,.28);
}
.fp-btn-filter:hover { background:#e04e18; transform:translateY(-1px); }
.fp-btn-clear {
    display:block; text-align:center; width:100%; margin-top:.4rem;
    padding:.5rem; border-radius:7px; background:transparent;
    border:1px solid rgba(255,255,255,.07); color:rgba(255,255,255,.28);
    font-size:.68rem; font-weight:600; text-decoration:none;
    transition:color .2s, border-color .2s;
}
.fp-btn-clear:hover { color:rgba(255,255,255,.55); border-color:rgba(255,255,255,.14); }

/* Mobile filter bar */
.fp-mobile-bar {
    display:none; align-items:center; justify-content:space-between;
    padding:.55rem 1rem; background:#0f2441;
    border-bottom:1px solid rgba(255,255,255,.06);
}
@media(max-width:1023px){ .fp-mobile-bar{ display:flex; } }
.fp-mob-btn {
    display:flex; align-items:center; gap:.35rem;
    padding:.4rem .85rem; border-radius:6px;
    background:rgba(241,90,36,.15); border:1px solid rgba(241,90,36,.25);
    color:#f15a24; font-size:.72rem; font-weight:700; cursor:pointer;
}

/* Overlay */
.fp-overlay { display:none; position:fixed; inset:0; z-index:49; background:rgba(0,0,0,.5); }
.fp-overlay.fp-on { display:block; }

/* Main */
.fp-main { flex:1; padding:1.1rem 1.25rem; min-width:0; }

/* Search bar */
.fp-searchbar { position:relative; margin-bottom:.9rem; }
.fp-searchbar input {
    width:100%;
    background:#111827;
    border:1.5px solid rgba(255,255,255,.07);
    border-radius:9px;
    padding:.7rem 3rem .7rem .9rem;
    font-size:.84rem; color:#e2e8f0;
    outline:none; font-family:'Inter',sans-serif;
    transition:border-color .2s, box-shadow .2s;
}
.fp-searchbar input:focus {
    border-color:rgba(241,90,36,.45);
    box-shadow:0 0 0 3px rgba(241,90,36,.08);
}
.fp-searchbar input::placeholder { color:#374151; }
.fp-searchbar button {
    position:absolute; right:.55rem; top:50%; transform:translateY(-50%);
    background:#f15a24; border:none; border-radius:6px;
    padding:.42rem .6rem; cursor:pointer; line-height:1;
    transition:background .2s;
}
.fp-searchbar button:hover { background:#e04e18; }
.fp-searchbar button svg { color:#fff; display:block; }

/* Meta bar */
.fp-metabar {
    display:flex; align-items:center; justify-content:space-between;
    flex-wrap:wrap; gap:.4rem; margin-bottom:.9rem;
}
.fp-metabar p { font-size:.76rem; color:#64748b; }
.fp-metabar strong { color:#e2e8f0; }
.fp-badge {
    display:inline-flex; align-items:center; gap:.25rem;
    font-size:.65rem; font-weight:700;
    padding:.18rem .5rem; border-radius:5px;
    background:rgba(241,90,36,.1); color:#f15a24;
    border:1px solid rgba(241,90,36,.2);
}

/* ============================
   PROGRAM CARD — compact dark
   ============================ */
.fp-card {
    background:#111827;
    border:1.5px solid rgba(255,255,255,.06);
    border-radius:12px;
    margin-bottom:.75rem;
    overflow:hidden;
    display:flex;
    flex-direction:column;
    transition:transform .2s, box-shadow .2s, border-color .2s;
}
.fp-card:hover {
    transform:translateY(-2px);
    box-shadow:0 8px 28px rgba(0,0,0,.45);
    border-color:rgba(241,90,36,.22);
}
@media(min-width:600px){ .fp-card { flex-direction:row; } }

/* Avatar — small square left side */
.fp-avatar {
    width:100%; height:72px;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0; position:relative; overflow:hidden;
}
@media(min-width:600px){ .fp-avatar { width:80px; height:auto; min-height:100%; } }

.fp-av-bachelor  { background:linear-gradient(135deg,#0d47a1,#1565c0); }
.fp-av-master    { background:linear-gradient(135deg,#4a148c,#6a1b9a); }
.fp-av-phd       { background:linear-gradient(135deg,#b71c1c,#c62828); }
.fp-av-diploma   { background:linear-gradient(135deg,#1a5e20,#2e7d32); }
.fp-av-associate { background:linear-gradient(135deg,#e65100,#f57c00); }
.fp-av-default   { background:linear-gradient(135deg,#0f2441,#1a3357); }

.fp-av-initial {
    font-size:1.6rem; font-weight:900;
    font-family:'Outfit',sans-serif;
    color:rgba(255,255,255,.85);
    text-shadow:0 2px 8px rgba(0,0,0,.3);
    position:relative; z-index:1;
}
.fp-av-dots {
    position:absolute; inset:0; opacity:.08;
    background-image:radial-gradient(rgba(255,255,255,1) 1px, transparent 1px);
    background-size:12px 12px;
}
.fp-avatar img {
    position:absolute; inset:0; width:100%; height:100%;
    object-fit:cover; z-index:2;
}

/* Card body */
.fp-card-body {
    flex:1; padding:.75rem .9rem;
    display:flex; flex-direction:column; justify-content:center;
    min-width:0;
    border-right:1px solid rgba(255,255,255,.05);
}
@media(max-width:599px){ .fp-card-body { border-right:none; border-top:1px solid rgba(255,255,255,.05); } }

.fp-c-univ {
    font-size:.62rem; font-weight:800; letter-spacing:.07em;
    text-transform:uppercase; color:#f15a24; margin-bottom:.1rem;
}
.fp-c-prog {
    font-size:.94rem; font-weight:700; color:#f1f5f9;
    font-family:'Outfit',sans-serif; line-height:1.25; margin-bottom:.18rem;
}
.fp-c-loc {
    font-size:.7rem; color:#4b5563;
    display:flex; align-items:center; gap:.22rem; margin-bottom:.5rem;
}
.fp-tags { display:flex; flex-wrap:wrap; gap:.3rem; margin-bottom:.5rem; }
.fp-tag {
    display:inline-flex; align-items:center; gap:.22rem;
    font-size:.58rem; font-weight:700; letter-spacing:.05em;
    text-transform:uppercase; padding:.16rem .45rem; border-radius:4px;
}
.fp-tg-lang { background:rgba(31,164,99,.14); color:#34d399; border:1px solid rgba(52,211,153,.18); }
.fp-tg-dur  { background:rgba(99,102,241,.13); color:#818cf8; border:1px solid rgba(165,180,252,.18); }
.fp-tg-deg  { background:rgba(241,90,36,.12); color:#fb923c; border:1px solid rgba(251,146,60,.18); }
.fp-tg-feat { background:rgba(245,158,11,.12); color:#fbbf24; border:1px solid rgba(251,191,36,.18); }

.fp-c-meta {
    font-size:.68rem; color:#374151;
    display:flex; align-items:center; gap:.65rem; flex-wrap:wrap;
}
.fp-c-meta span { display:flex; align-items:center; gap:.22rem; }

/* Price panel */
.fp-price {
    flex-shrink:0; padding:.75rem .9rem;
    display:flex; align-items:center; gap:.75rem;
    background:rgba(0,0,0,.15);
}
@media(min-width:600px){
    .fp-price {
        width:148px; flex-direction:column;
        align-items:stretch; gap:.5rem;
        padding:.85rem .9rem;
        border-top:none; border-left:1px solid rgba(255,255,255,.05);
    }
}
@media(max-width:599px){
    .fp-price { border-top:1px solid rgba(255,255,255,.05); justify-content:space-between; }
}

.fp-price-num {
    font-size:1.2rem; font-weight:900; color:#e2e8f0;
    font-family:'Outfit',sans-serif; line-height:1;
}
.fp-price-num sup { font-size:.6rem; vertical-align:super; font-weight:600; color:#9ca3af; }
.fp-price-unit { font-size:.6rem; color:#4b5563; text-transform:uppercase; letter-spacing:.06em; }
.fp-price-dl { font-size:.62rem; color:#374151; line-height:1.45; }
.fp-price-dl strong { display:block; color:#9ca3af; font-weight:700; }

.fp-apply {
    display:flex; align-items:center; justify-content:center; gap:.3rem;
    width:100%; padding:.55rem; border-radius:7px;
    background:#f15a24; color:#fff;
    font-weight:800; font-size:.67rem; letter-spacing:.08em; text-transform:uppercase;
    text-decoration:none;
    transition:background .2s, transform .15s, box-shadow .2s;
    box-shadow:0 3px 10px rgba(241,90,36,.25); white-space:nowrap;
}
.fp-apply:hover { background:#e04e18; transform:translateY(-1px); }

.fp-save {
    display:flex; align-items:center; justify-content:center; gap:.25rem;
    width:100%; padding:.45rem; border-radius:7px;
    background:transparent; border:1px solid rgba(255,255,255,.07);
    color:#374151; font-size:.64rem; font-weight:600;
    cursor:pointer; transition:color .2s, border-color .2s;
}
.fp-save:hover { color:#9ca3af; border-color:rgba(255,255,255,.14); }

/* Empty */
.fp-empty {
    text-align:center; padding:3rem 1.5rem;
    background:#111827; border:2px dashed rgba(255,255,255,.06);
    border-radius:12px;
}
.fp-empty-icon {
    width:48px; height:48px; border-radius:50%;
    background:rgba(241,90,36,.08);
    display:flex; align-items:center; justify-content:center;
    margin:0 auto .85rem; color:#f15a24;
}
.fp-empty h3 { font-size:.95rem; font-weight:700; color:#e2e8f0; margin-bottom:.25rem; }
.fp-empty p  { font-size:.8rem; color:#4b5563; margin-bottom:1rem; }
.fp-empty a  {
    display:inline-flex; align-items:center; gap:.3rem;
    padding:.5rem 1.1rem; border-radius:7px;
    background:#f15a24; color:#fff;
    font-size:.74rem; font-weight:700; text-decoration:none;
    transition:background .2s;
}
.fp-empty a:hover { background:#e04e18; }

@php
function degreeClass2($level){
    return match(strtolower($level??'')){
        'bachelor','undergraduate'=>'fp-av-bachelor',
        'master','masters','postgraduate'=>'fp-av-master',
        'phd','doctorate'=>'fp-av-phd',
        'diploma'=>'fp-av-diploma',
        'associate'=>'fp-av-associate',
        default=>'fp-av-default',
    };
}
@endphp
</style>

<div class="fp-wrap">

    {{-- HEADER --}}
    <div class="fp-header">
        <p class="fp-header-eyebrow">Program Explorer</p>
        <h1>Find Your Perfect Program</h1>
        <p class="fp-header-sub">Browse degrees, compare fees &amp; languages, and apply directly from your dashboard.</p>
        <div class="fp-header-stats">
            <div><div class="fp-stat-val">{{ $programs->total() }}</div><div class="fp-stat-lbl">Programs</div></div>
            <div class="fp-stat-sep"></div>
            <div><div class="fp-stat-val">50+</div><div class="fp-stat-lbl">Universities</div></div>
            <div class="fp-stat-sep"></div>
            <div><div class="fp-stat-val">{{ date('Y') }}</div><div class="fp-stat-lbl">Intake</div></div>
        </div>
    </div>

    {{-- MOBILE BAR --}}
    <div class="fp-mobile-bar">
        <button class="fp-mob-btn" onclick="fpToggle()">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18v2H3zm3 7h12v2H6zm3 7h6v2H9z"/></svg>
            Filters
        </button>
        <span style="font-size:.72rem;color:#4b5563;"><strong style="color:#e2e8f0;">{{ $programs->total() }}</strong> programs</span>
    </div>
    <div class="fp-overlay" id="fp-ov" onclick="fpToggle()"></div>

    {{-- LAYOUT --}}
    <div class="fp-layout">

        {{-- SIDEBAR --}}
        <div class="fp-sidebar" id="fp-sb">
            <div class="fp-sidebar-head">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 4h18v2H3zm3 7h12v2H6zm3 7h6v2H9z"/></svg>
                Filters
            </div>
            <form action="{{ url()->current() }}" method="GET">
                @if(request('keyword'))<input type="hidden" name="keyword" value="{{ request('keyword') }}">@endif

                <label class="fp-lbl">Country</label>
                <select name="country" class="fp-sel">
                    <option value="">All Countries</option>
                    <option value="China" {{ request('country')=='China'?'selected':'' }}>🇨🇳 China</option>
                </select>

                <label class="fp-lbl">City</label>
                <select name="city" class="fp-sel">
                    <option value="">All Cities</option>
                    @foreach(['Beijing','Shanghai','Haikou','Guangzhou','Chengdu','Wuhan','Nanjing'] as $c)
                    <option value="{{ $c }}" {{ request('city')==$c?'selected':'' }}>{{ $c }}</option>
                    @endforeach
                </select>

                <div class="fp-sidebar-div"></div>

                <label class="fp-lbl">Degree Level</label>
                <select name="degree_level" class="fp-sel">
                    <option value="">All Levels</option>
                    @foreach($degreeTypes as $t)
                    <option value="{{ $t }}" {{ request('degree_level')==$t?'selected':'' }}>{{ ucfirst($t) }}</option>
                    @endforeach
                </select>

                <label class="fp-lbl">Language</label>
                <select name="language" class="fp-sel">
                    <option value="">Any Language</option>
                    @foreach($languages as $l)
                    <option value="{{ $l }}" {{ request('language')==$l?'selected':'' }}>{{ ucfirst($l) }}</option>
                    @endforeach
                </select>

                <label class="fp-lbl">Duration</label>
                <select name="duration" class="fp-sel">
                    <option value="">Any Duration</option>
                    @foreach([1,2,3,4,5,6] as $d)
                    <option value="{{ $d }}" {{ request('duration')==$d?'selected':'' }}>{{ $d }} {{ $d==1?'Year':'Years' }}</option>
                    @endforeach
                </select>

                <div class="fp-sidebar-div"></div>

                <label class="fp-lbl">Annual Tuition (USD)</label>
                <div class="fp-range">
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min $" class="fp-inp">
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max $" class="fp-inp">
                </div>

                <button type="submit" class="fp-btn-filter">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Apply Filters
                </button>
                <a href="{{ url()->current() }}" class="fp-btn-clear">✕ Clear Filters</a>
            </form>
        </div>

        {{-- MAIN --}}
        <div class="fp-main">

            {{-- Search --}}
            <form action="{{ url()->current() }}" method="GET" class="fp-searchbar">
                @if(request('degree_level'))<input type="hidden" name="degree_level" value="{{ request('degree_level') }}">@endif
                @if(request('language'))<input type="hidden" name="language" value="{{ request('language') }}">@endif
                @if(request('min_price'))<input type="hidden" name="min_price" value="{{ request('min_price') }}">@endif
                @if(request('max_price'))<input type="hidden" name="max_price" value="{{ request('max_price') }}">@endif
                @if(request('duration'))<input type="hidden" name="duration" value="{{ request('duration') }}">@endif
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Search by university, program, or field of study…">
                <button type="submit">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
            </form>

            {{-- Meta --}}
            <div class="fp-metabar">
                <p>Showing <strong>{{ $programs->firstItem() ?? 0 }}–{{ $programs->lastItem() ?? 0 }}</strong> of <strong style="color:#f15a24;">{{ $programs->total() }}</strong> programs</p>
                @if(request()->hasAny(['keyword','degree_level','language','min_price','max_price','duration']))
                <span class="fp-badge">
                    <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 20 20"><path d="M5 4a1 1 0 011-1h8a1 1 0 011 1v2a1 1 0 01-.293.707L11 10.414V15a1 1 0 01-.553.894l-2 1A1 1 0 017 16v-5.586L5.293 6.707A1 1 0 015 6V4z"/></svg>
                    Filters Active
                </span>
                @endif
            </div>

            {{-- Cards --}}
            @forelse($programs as $program)
            @php $avClass = degreeClass2($program->degree_level); $init = strtoupper(substr($program->university->name??'U',0,1)); @endphp
            <div class="fp-card">

                {{-- Avatar --}}
                <div class="fp-avatar {{ $avClass }}">
                    <div class="fp-av-dots"></div>
                    @if($program->university->logo ?? false)
                        <img src="{{ Storage::url($program->university->logo) }}" alt="">
                    @else
                        <span class="fp-av-initial">{{ $init }}</span>
                    @endif
                </div>

                {{-- Body --}}
                <div class="fp-card-body">
                    <p class="fp-c-univ">{{ $program->university->name ?? 'University' }}</p>
                    <h3 class="fp-c-prog">{{ $program->name }}</h3>
                    <p class="fp-c-loc">
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><circle cx="12" cy="11" r="3" stroke-width="2"/></svg>
                        {{ $program->university->location ?? 'China' }}
                    </p>
                    <div class="fp-tags">
                        @if($program->language)<span class="fp-tag fp-tg-lang">{{ ucfirst($program->language) }}</span>@endif
                        @if($program->duration_years)<span class="fp-tag fp-tg-dur">{{ $program->duration_years }} {{ $program->duration_years==1?'yr':'yrs' }}</span>@endif
                        @if($program->degree_level)<span class="fp-tag fp-tg-deg">{{ Str::title($program->degree_level) }}</span>@endif
                        @if($program->is_featured ?? false)<span class="fp-tag fp-tg-feat">★ Featured</span>@endif
                    </div>
                    <div class="fp-c-meta">
                        @if($program->field_of_study)<span><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>{{ $program->field_of_study }}</span>@endif
                        <span><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>Fall {{date('Y')}} &amp; Spring {{date('Y')+1}}</span>
                    </div>
                </div>

                {{-- Price --}}
                <div class="fp-price">
                    <div>
                        <div class="fp-price-num">
                            @if($program->tuition_fee_usd)<sup>$</sup>{{ number_format($program->tuition_fee_usd,0) }}@else<span style="font-size:.8rem;color:#4b5563;">—</span>@endif
                        </div>
                        <div class="fp-price-unit">/ year</div>
                        <div class="fp-price-dl" style="margin-top:.4rem;">Deadline<strong>Nov 30, {{ date('Y') }}</strong></div>
                    </div>
                    <div style="display:flex;flex-direction:column;gap:.4rem;width:100%;">
                        <a href="{{ route(auth()->user()->hasRole('agent')?'agent.applications.index':'student.applications.create',['program_id'=>$program->id]) }}" class="fp-apply">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            Apply Now
                        </a>
                        @if(auth()->user()->hasRole('student'))
                            <form action="{{ route('student.wishlist.toggle') }}" method="POST" class="wishlist-form">
                                @csrf
                                <input type="hidden" name="program_id" value="{{ $program->id }}">
                                @php $isSaved = auth()->user()->wishlist()->where('program_id', $program->id)->exists(); @endphp
                                <button type="submit" class="fp-save {{ $isSaved ? 'text-red-500' : '' }}" title="{{ $isSaved ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                    <svg class="w-3 h-3 {{ $isSaved ? 'fill-current' : 'fill-none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    {{ $isSaved ? 'Saved' : 'Save' }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
            @empty
            <div class="fp-empty">
                <div class="fp-empty-icon"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg></div>
                <h3>No Programs Found</h3>
                <p>Try adjusting or clearing your filters to see more results.</p>
                <a href="{{ url()->current() }}">Clear All Filters</a>
            </div>
            @endforelse

            @if($programs->hasPages())
            <div style="margin-top:1.25rem;display:flex;justify-content:center;">{{ $programs->links() }}</div>
            @endif

        </div>
    </div>
</div>

<script>
function fpToggle(){
    document.getElementById('fp-sb').classList.toggle('fp-open');
    document.getElementById('fp-ov').classList.toggle('fp-on');
}
</script>
@endsection
