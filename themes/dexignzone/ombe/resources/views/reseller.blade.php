@extends('layouts.page')

@section('content')
    <!-- Reseller Swiper -->
    <main class="page-content space-top p-b40">
		<div class="container pt-0">
            <div class="title-bar mb-2">
                <h5 class="title">Silakan Pilih Reseller terdekat</h5>
            </div>
			<div class="chat-list">
				<ul id="myList">
                    @foreach($resellers as $resel)
                        <li>
                            <a href="{{ route('home.resellerSet', $resel->id) }}" class="list-items">
                                <div class="dz-media">
                                    <img src="{!! theme_asset('img/avatar/1.jpg') !!}" alt="">
                                </div>
                                <div class="list-content">
                                    <h6 class="title"><span class="text-primary">{{ $resel->nama }}</span></h6>
                                    <span class="dz-text">ID Reseller : {{ $resel->idReseller }}</span>
                                    <div class="dz-status">
                                        <span class="item-time"><i class="fa fa-location-dot"></i> {{ $resel->kotaKab }}, {{ $resel->kecamatan }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
				</ul>
			</div>
        </div>

        <!-- Join Reseller -->
        <div class="title-bar mt-4">
            <h5 class="title">Join Reseller</h5>
        </div>

        <ul class="featured-list">
            <li>
                <div class="dz-card list">
                    <div class="dz-media">
                        <a href="{{ route('reseller.index') }}"><img src="{{asset('uploads/produk-laris-manis.webp') }}" alt=""></a>
                    </div>
                    <div class="dz-content">
                        <div class="dz-head">
                            <h6 class="title"><a href="{{ route('reseller.index') }}">Buka Rezeki Baru dari Berjualan Produk Premium Ummu Balqis </a></h6>
                            <span class="dz-text">Eits, sabar dulu...
                                Mungkin dulu (atau sekarang) kamu juga lagi mencari ataupun mencoba jualan dengan jadi reseller, tapi oh ternyata… kok banyak banget ya masalahnya !?</span>
                        </div>
                        <ul class="dz-meta mt-2">
                            <li class="dz-price flex-1"><small>23 Maret 2024</small></li>
                            <li class="dz-pts">Terbatas!</li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Join Reseller -->
    </main>
    <!-- Reseller Swiper -->
@endsection
