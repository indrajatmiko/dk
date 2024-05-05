@extends('layouts.page')

@section('content')
<main class="page-content space-top p-b40">
    <img src="{{asset('uploads/form-daftar-bidata.webp') }}" alt="">
    <div class="mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center mb-4">Terimakasih Anda sudah mengisi formulir Pendaftaran Reseller.</h4>
                <div class="box-blink-small blink mt-6">Kami akan segera menghubungi Anda via Whatsapp.</div>
                <h4 class="text-center mt-4">follow dulu instagram kami di <br>
                    <a href="https://www.instagram.com/distributorkauniyah" target="_blank">@distributorkauniyah</a>
                    <a href="https://www.instagram.com/testimonikauniyah" target="_blank">@testimonikauniyah</a></h4>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" href="{{ route('home.index') }}">Kembali ke Beranda</a>
</main>
@endsection
