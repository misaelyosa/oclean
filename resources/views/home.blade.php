@extends('base.homebase')

@section('content')
    <header>
        @if (Auth::check())
        @if (Auth::user()->role)
            @php
                $role = Auth::user()->roles; // Get the role record
            @endphp

            @if ($role[0])
                @switch($role[0]->role) {{-- Assuming `role` is the field that contains the role name --}}
                    @case('superadmin')
                        <div><a href="/superadmin">Go to Superadmin Dashboard </a></div>
                        @break
                    @case('admin_bank_sampah')
                        <div><a href="{{ route('bankSampah.index') }}">Go to Admin Bank Sampah Dashboard </a></div>
                        @break
                    @case('peternak_maggot')
                        <div><a href="{{ route('peternakmaggot.index') }}">Go to Peternak Maggot Dashboard </a></div>
                        @break
                    @case('user')
                        <div><a href="{{ route('user.index') }}">Go to User Page </a></div>
                        @break
                @endswitch
            @endif
        @endif

            <div style="display: flex; align-items: center; gap: 10px;">
                <span>Welcome, {{ Auth::user()->name }}</span>
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px; height: 20px;">
                            <path fill="#ffffff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 224c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z"/>
                        </svg>
                    </button>
                </form>
            </div>
        @else
            <div>O-Clean</div>
            <div><a href="/login">Login or Register</a></div>
        @endif
    </header>
    <section class="first">
        <div class="outer">
            <div class="inner">
                <div class="bg-home">
                    <h2 class="section-heading">Scroll down</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="second">
        <div class="outer">
            <div class="inner">
                <div class="bg-home">
                    <h2 class="section-heading">Animated with GSAP</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="third">
        <div class="outer">
            <div class="inner">
                <div class="bg-home">
                    <h2 class="section-heading">GreenSock</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="fourth">
        <div class="outer">
            <div class="inner">
                <div class="bg-home">
                    <h2 class="section-heading">Animation platform</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="fifth">
        <div class="outer">
            <div class="inner">
                <div class="bg-home">
                    <h2 class="section-heading">Keep scrolling</h2>
                </div>
            </div>
        </div>
    </section>
@endsection

