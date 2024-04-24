<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Title -->
	<title>{{$pageTitle}} - Distributor Resmi Kauniyah Oil & Kauniyah Natural Skincare</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DistributorKauniyah">
	<meta name="robots" content="index, follow">

	<meta name="keywords" content="kauniyah, kauniyah oil, kauniyah natural, kauniyah natural skincare, kauniyah skincare, kauniyah natural tsubaki hydrofirm facial wash, kauniyah natural bright glow 2 in 1 face mist toner, kauniyah natural tsubaki glow face ampoule, kauniyah natural tsubaki anti aging face oil, kauniyah natural sunscreen brightmoist daily lotion, kauniyah natural brightsilk natural deodorant, kauniyah facial wash, kauniyah toner, kauniyah ampoule, kauniyah face oil, kauniyah sunscreen, kauniyah deodorant, distributor kauniyah, reseller resmi, testimoni kauniyah">

	<meta name="description" content="DK atau Distributor Kauniyah adalah Distributor Resmi dari Produk Kauniyah Oil dan Kauniyah Natural Skincare, menerima pendaftaran Reseller dan penjualan langsung ke customer. Jaminan Produk Original, Asli serta transaksi yang aman dan pengiriman yang cepat.">

	<meta property="og:title" content="DK -Distributor Resmi Kauniyah Oil dan Kauniyah Natural Skincare">
	<meta property="og:description" content="DK atau Distributor Kauniyah adalah Distributor Resmi dari Produk Kauniyah Oil dan Kauniyah Natural Skincare, menerima pendaftaran Reseller dan penjualan langsung ke customer di seluruh indonesia. Jaminan Produk Original, Asli serta transaksi yang aman dan pengiriman yang cepat.">

	<meta property="og:image" content="{!! theme_asset('img/social-image.png') !!}">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="DK -Distributor Resmi Kauniyah Oil dan Kauniyah Natural Skincare">
	<meta name="twitter:description" content="DK atau Distributor Kauniyah adalah Distributor Resmi dari Produk Kauniyah Oil dan Kauniyah Natural Skincare, menerima pendaftaran Reseller dan penjualan langsung ke customer di seluruh indonesia. Jaminan Produk Original, Asli serta transaksi yang aman dan pengiriman yang cepat.">

	<meta name="twitter:image" content="{!! theme_asset('img/social-image.png') !!}">
	<meta name="twitter:card" content="summary_large_image">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">

	@include('partials.styles')

</head>
<body>
<div class="page-wrapper">

    {{-- @include('partials.header-top') --}}

    <!-- Main Content Start -->
    <main class="page-content bg-white p-b60">
        <div class="container">

            {{-- @include('partials.search') --}}

            <!-- Overlay Card -->
            @yield('content')
            <!-- Overlay Card -->

        </div>
    </main>
    <!-- Main Content End -->

    <!-- Menubar -->
    @include('partials.menubar')
    <!-- Menubar -->

    @include('partials.footer')
</div>
@include('partials.scripts')
</body>
</html>
