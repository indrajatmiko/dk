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
                        <li class="dz-item">Kirim ke: <b>London</b></li>
                    </ul>
                </div>
            </div>
            <div class="mid-content"></div>
            <div class="right-content">
                <a href="addAddress" class="icon btn btn-outline-primary btn-sm gap-1 p-2 rounded-xl">
                    <i class="icon feather icon-map-pin"></i>
                    <span>Ubah Alamat</span>
                </a>
            </div>
        </div>
    </header>
<!-- Header -->

<!-- Main Content Start -->
<main class="page-content space-top p-b40">
    <!-- Most Ordered -->
    <div class="title-bar">
        <h5 class="title">Voucher</h5>
    </div>
    <div class="swiper overlay-swiper2">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="dz-card list style-4">
                    {{-- <div class="dz-media" >
                        <img style="width: 64px" src="{!! theme_asset('img/discount-128.webp') !!}" alt="">
                    </div> --}}
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
                $hemat = $kupon['value'];
                $totalQty = 0;
            @endphp
            @foreach($items = LaraCart::getItems() as $item)
                @php
                    $produk = App\Models\Produk::where('id', $item->id)->first();
                    $foto = App\Models\ProdukFoto::where('id_sku', $item->id)->first();
                    $hemat += $item->hemat;
                    $totalQty += $item->qty;
                @endphp
                <form method="POST" action="{{ route('home.cartUpdate') }}">
                    @csrf
                    <div class="dz-cart-list">
                        <div class="dz-media">
                            <img src="{{  env('DK_ADMIN') }}uploads/{{ $foto->foto_1 }}" alt="">
                        </div>
                        <div class="dz-content">
                            <h6 class="title"><a href="product-detail.html">{{ $item->name }}</a></h6>
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
                    <li class="name">Subtotal</li>
                    <li class="prize">: {{ LaraCart::subTotal() }}</li>
                </ul>
                <ul class="total-prize">
                    <li class="name">Voucher</li>
                    <li class="prize">: {{ LaraCart::discountTotal() }} ( {{ $kupon['code'] }})</li>
                </ul>
                <div class="dz-text"><i class="feather icon-check"></i>Kamu telah berhemat Rp. {{ number_format($hemat, 0, ".", ".") }}</div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content End -->

<!-- Footer Fixed Button -->
<div class="footer-fixed-btn border-bottom">
    <a href="checkout.html" class="btn btn-lg btn-thin btn-primary w-100 gap-1 rounded-xl">Bayar <b> ({{ $totalQty }} barang)</b></a>
</div>
<!-- Main Content End -->
@endsection
