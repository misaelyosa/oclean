@extends('base.homebase')

@section('content')
    <header>
        <div>O-Clean</div>
        <div>O-Clean</div>
        @if (Auth::check())
            <div><a>Welcome,  {{ Auth::user()->name }}</a></div>
        @else
            <div><a href="/login">Login</a></div>
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

