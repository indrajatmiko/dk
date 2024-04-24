@extends('layouts.master')

@section('content')

{{--  Reseller  --}}
@if(!empty($sesIdReseller))
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-12">
            <div class="dz-wishlist-bx">
                <div class="dz-media">
                    <a href="#"><img src="{!! theme_asset('img/avatar/1.jpg') !!}" alt=""></a>
                </div>
                <div class="dz-info">
                    <div class="dz-head">
                        <h6 class="title"><a class="text-primary" href="#">{{ $sesNamaReseller }}</a></h6>
                        <p>Saya akan membantu menjawab pertanyaan, konsultasi produk & pengiriman produk Anda.</p>
                    </div>
                    <div class="dz-status">
                        <span class="item-time"><i class="fa fa-location-dot"></i> {{ $sesKecamatan }}, {{ $sesKotaKab }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="alert alert-warning alert-dismissible fade show mb-2">
    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
    <strong>Peringatan!</strong> Silakan pilih Reseller terdekat.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    <span><i class="icon feather icon-x"></i></span>
    </button>
</div>
@endif
{{--  Reseller  --}}

<!-- Reseller Swiper -->
<div class="title-bar mb-0">
    <h5 class="title">Pilih Wilayah Reseller Terdekat</h5>
</div>
<div class="swiper categories-swiper dz-swiper m-b20">
    <div class="swiper-wrapper">
        @foreach($wilayahs  as $key => $wil)
        @php
            if(!empty($wilayahReseller[$key])){
                $linkWilayah = 'reseller/'.$wil->id;
                $countResel = count($wilayahReseller[$key]) . ' Reseller';
            }
            else {
                $linkWilayah = 'join-reseller';
                $countResel = 'Join Reseller Sekarang!';
            }
        @endphp
        <div class="swiper-slide">
            <div class="dz-categories-bx">
                <div class="dz-content">
                        <h6 class="title"><a class="text-primary" href="{{ $linkWilayah }}">{{ $wil->nama }}</a></h6>
                        <span class="menus ">{{ $countResel }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Reseller Swiper -->

<!-- Overlay Card -->
<div class="swiper overlay-swiper1">
    <div class="swiper-wrapper">
        @foreach($produks as $produk)
            @php
                $foto = App\Models\ProdukFoto::where('id', $produk->id)->first();
            @endphp
            <div class="swiper-slide">
                <div class="dz-card-overlay style-1">
                    <div class="dz-media">
                        <a href="produk/{{ $produk->id }}">
                            <img src="{{  env('DK_ADMIN') }}uploads/{{ $foto->foto_1 }}" alt="image">
                        </a>
                    </div>
                    <div class="dz-info">
                        <h6 class="title"><a href="{{ url('produk') }} {{ $produk->id }}">{{ $produk->nama }}</a></h6>
                        <ul class="dz-meta">
                            <li class="dz-price"><sup>Rp.</sup>{{ number_format($produk->harga_promo, 0, ".", ".") }}<br /><del>Rp.{{ number_format($produk->harga, 0, ",",".") }}</del></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Overlay Card -->

<!-- News -->
<div class="title-bar">
    <h5 class="title">Berita Terbaru</h5>
    {{-- <a href="{{ route('home.news') }}">More</a> --}}
</div>

{{-- <ul class="featured-list">
    <li>
        <div class="dz-card list">
            <div class="dz-media">
                <a href="product-detail.html"><img src="{!! theme_asset('img/products/product1.jpg') !!}" alt=""></a>
            </div>
            <div class="dz-content">
                <div class="dz-head">
                    <h6 class="title"><a href="product-detail.html">judul berita</a></h6>
                    <span class="dz-text">Deskripsi berita</span>
                </div>
                <ul class="dz-meta">
                    <li class="dz-price flex-1"><small>23 Maret 2024</small></li>
                    <li class="dz-pts">50 Pts</li>
                </ul>
            </div>
        </div>
    </li>
</ul> --}}
<!-- News -->
@endsection
