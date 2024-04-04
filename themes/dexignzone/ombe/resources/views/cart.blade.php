@extends('layouts.page-cart')

@section('content')

<!-- Header -->
    <header class="header header-fixed border-bottom">
        <div class="header-content">
            <div class="left-content">
                <div class="dz-head-items">
                    <h5 class="title mb-0">Keranjang Belanja</h5>
                    <ul class="dz-meta">
                        {{-- <li class="dz-item"><b>8</b> items</li> --}}
                        <li class="dz-item">Kirim ke: <b>{{ $addrSend->kelurahan ?? ' alamat belum dipilih'}}, {{ $addrSend->city_name ?? ''}} {{ $addrSend->province ?? '' }}</b></li>
                    </ul>
                </div>
            </div>
            <div class="mid-content"></div>
            <div class="right-content">
                <a href="{{ route('custAddress.selectAddress') }}" class="icon btn btn-outline-danger btn-sm gap-1 p-2 rounded-xl">
                    <i class="icon feather icon-map-pin"></i>
                    <span>Pilih Alamat</span>
                </a>
            </div>
        </div>
    </header>
<!-- Header -->

<!-- Main Content Start -->
<main class="page-content space-top p-b40">
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
                            <h6 class="title"><a href="#">{{ $sesNamaReseller }}</a></h6>
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
    <!-- Most Ordered -->
    <div class="title-bar">
        <h5 class="title">Voucher</h5>
    </div>
    <div class="swiper overlay-swiper2">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="dz-card list style-4">
                    <img style="width: 32px" src="{!! theme_asset('img/discount-128.webp') !!}" alt="">
                    <div class="dz-content ms-2">
                        <h6 class="title"><a href="/cartCoupon">{{ $kupon['code'] }}</a></h6>
                        <ul class="dz-meta">
                            <li class="category flex-1">{{ $kupon['options']['description'] }}</li>
                            <li><a href="/cartCoupon">KLAIM</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-0">
        <div class="dz-flex-box p-b100">
            @php
                $hemat = 0;
                $totalQty = 0;
                $berat = 0;
            @endphp
            @foreach($items = LaraCart::getItems() as $item)
                @php
                    $produk = App\Models\Produk::where('id', $item->id)->first();
                    $foto = App\Models\ProdukFoto::where('id_sku', $item->id)->first();
                    $hemat += $item->hemat;
                    $totalQty += $item->qty;
                    $berat += $produk->berat * $item->qty;
                @endphp
                <form method="POST" action="{{ route('home.cartUpdate') }}">
                    @csrf
                    <div class="dz-cart-list">
                        <div class="dz-media">
                            <img src="{{  env('DK_ADMIN') }}uploads/{{ $foto->foto_1 }}" alt="">
                        </div>
                        <div class="dz-content">
                            <h6 class="title"><a href="#">{{ $item->name }}</a></h6>
                            <ul class="dz-meta">
                                <li class="dz-price">Rp. {{ number_format($item->price, 0, ".", ".") }}<del>Rp. {{ $produk->harga }}</del></li>
                                {{-- <li class="dz-review"><i class="feather icon-star-on"></i><span>(2k Review)</span></li> --}}
                            </ul>
                            <div class=" d-flex align-items-center">
                                <div class="dz-stepper style-2">
                                    <input readonly class="stepper" type="text" value="{{ $item->qty }}" name="qty">
                                </div>
                                <a href="javascript:void(0);" class="dz-remove ms-auto" onclick="$(this).closest('form').submit();"><i class="feather icon-edit"></i>Ubah</a>
                                <a href="{{ url('cartRemove').'/'.$item->getHash() }}" class="dz-remove ms-auto"><i class="feather icon-trash-2"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="productId" value="{{ $item->id }}">
                    <input type="hidden" name="itemHash" value="{{ $item->getHash() }}">
                </form>
            @endforeach
            <div class="dz-total-area">
                <ul class="total-prize">
                    <li class="name">Berat</li>
                    <li class="prize">: {{ $berat }} gram</li>
                </ul>
                <ul class="total-prize">
                    <li class="name">Subtotal</li>
                    <li class="prize">: {{ LaraCart::subTotal() }}</li>
                </ul>
                <ul class="total-prize">
                    <li class="name">Voucher</li>
                    <li class="prize">: {{ LaraCart::discountTotal() }}</li>
                </ul>
                <div class="dz-text"><i class="feather icon-check"></i>Hemat Rp. {{ number_format($hemat, 0, ".", ".") }} + {{ LaraCart::discountTotal() }}</div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content End -->

<!-- Footer Fixed Button -->
<div class="footer-fixed-btn border-bottom">
    @if(empty($items))
        <a href="#" class="btn btn-lg btn-thin btn-primary w-100 gap-1 rounded-xl disabled" >keranjang masih kosong :(</b></a>
    @elseif(empty($addrSend))
        <a href="#" class="btn btn-lg btn-thin btn-primary w-100 gap-1 rounded-xl disabled" >Belum pilih Alamat :(</b></a>
    @else
        <a href="{{ route('home.checkout') }}" class="btn btn-lg btn-thin btn-primary w-100 gap-1 rounded-xl">Checkout <b> ({{ $totalQty }} barang)</b></a>
    @endif
</div>
<!-- Main Content End -->
@endsection
