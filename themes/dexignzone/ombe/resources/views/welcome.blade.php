@extends('layouts.welcome')

@section('content')
<div class="welcome-area row">
    <div class="welcome-inner-2 col" style="background-image: url('{!! theme_asset('img/background/bg3.png') !!}'); background-size: cover; background-repeat: no-repeat;">
        <div class="main-wrapper">
            <div class="main-logo">
                <div class="logo-icon">
                    <img src="{!! theme_asset('img/coffe-cup.png') !!}" alt="logo">
                </div>
            </div>
        </div>
        <div class="dz-button-group">
            <h3 class="title">Dari Alam <br> untuk Kesehatan & Kecantikan Anda</h3>
            <a href="{{ route('redirect') }}" class="btn btn-white btn-social btn-thin rounded-xl btn-lg w-100"><img src="{!! theme_asset('img/social/google-mail.png') !!}" alt=""><span class="text-dark">Masuk dengan Google</span></a>
        </div>
    </div>
</div>
@endsection
