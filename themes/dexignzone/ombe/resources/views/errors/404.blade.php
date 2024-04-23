<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Title -->
	<title>DK - 404 Not Found</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">

	<meta name="keywords" content="android, ios, mobile, mobile template, mobile app, ui kit, dark layout, app, delivery, ecommerce, material design, mobile, mobile web, order, phonegap, pwa, store, web app, Ombe, coffee app, coffee template, coffee shop, mobile UI, coffee design, app template, responsive design, coffee showcase, style app, trendy app, modern UI, technology, User-Friendly Interface, Coffee Shop App, PWA (Progressive Web App), Mobile Ordering, Coffee Experience, Digital Menu, Innovative Technology, App Development, Coffee Experience, cafe, bootatrap, Bootstrap Framework, UI/UX Design, Coffee Shop Technology, Online Presence, Coffee Shop Website, Cafe Template, Mobile App Design, Web Application, Digital Presence, ">

	<meta name="description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">

	<meta property="og:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
	<meta property="og:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">

	<meta property="og:image" content="../../xhtml/social-image.png">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
	<meta name="twitter:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">

	<meta name="twitter:image" content="../../xhtml/social-image.png">
	<meta name="twitter:card" content="summary_large_image">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">

	<!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{!! theme_asset('img/app-logo/favicon.webp') !!}">

	<!-- PWA Version -->
	<link rel="manifest" href="{!! theme_asset('manifest.json') !!}">

    <!-- Global CSS -->
	<link href="{!! theme_asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') !!}" rel="stylesheet">
	<link href="{!! theme_asset('vendor/swiper/swiper-bundle.min.css') !!}" rel="stylesheet">

    @if(request()->segment(1) === 'produk')
	    <link href="{!! theme_asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') !!}" rel="stylesheet">

    @endif
	<!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{!! theme_asset('css/style.css') !!}">

    <!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;family=Raleway:wght@300;400;500&amp;display=swap" rel="stylesheet">

</head>
<body>
<div class="page-wrapper">

	<!-- Preloader -->
	<div id="preloader">
		<div class="loader">
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
	</div>
    <!-- Preloader end-->

	<!-- Header -->
	<header class="header header-fixed border-bottom onepage">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn">
					<i class="feather icon-arrow-left"></i>
				</a>
			</div>
			<div class="mid-content">
				<h4 class="title">Error 404</h4>
			</div>
			<div class="right-content"></div>
		</div>
	</header>
	<!-- Header -->

	<!-- Page Content Start -->
	<main class="page-content space-top">
		<div class="container fixed-full-area">
			<div class="error-page">
				<div class="icon-bx">
					<img src="{!! theme_asset('img/error2.svg') !!}" alt="">
				</div>
				<div class="clearfix">
					<h2 class="title text-primary">Yaah ga ketemu :(</h2>
					<p>Halaman yang Anda tuju tidak ada..</p>
				</div>
			</div>
			<div class="error-img">
				<img src="{!! theme_asset('img/error.png') !!}" alt="">
			</div>
		</div>
	</main>
	<!-- Page Content End -->
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="{!! theme_asset('js/jquery.js') !!}"></script>
<script src="{!! theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! theme_asset('vendor/swiper/swiper-bundle.min.js') !!}"></script>
<script src="{!! theme_asset('js/dz.carousel.js') !!}"></script>
<script src="{!! theme_asset('js/settings.js') !!}"></script>
<script src="{!! theme_asset('js/custom.js') !!}"></script>

@if(request()->segment(1) === 'home')
    <script src="{!! theme_asset('index.js') !!}"></script>
@endif

@if(request()->segment(1) === 'produk' OR request()->segment(1) === 'cart')
    <script src="{!! theme_asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') !!}"></script>
@endif

@if(request()->segment(1) === 'addAddress' OR request()->segment(1) === 'cart')
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="idProvince"]').on('change', function() {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: 'https://distributorkauniyah.com/my/public/getCities/' + provinceId,
                    type: 'GET' ,
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="idCity"]').empty();
                        $('select[name="idCity"]').append('<option value="">Pilih Kota / Kab.</option>');
                        $.each(data,function(key, value){
                            if(value['type'] == 'Kabupaten'){
                                tipe = 'Kab.';
                            }
                            else {
                                tipe = 'Kota';
                            }
                            $('select[name="idCity"]').append('<option value="'+value['city_id']+'">'+ tipe + ' ' + value['city_name'] +'</option>');
                        });
                    }
                })
            } else {
                $('select[name="idCity"]').empty();
            }
        });

        $('select[name="idCity"]').on('change', function() {
            var citiesId = $(this).val();
            if (citiesId) {
                $.ajax({
                    url: 'https://distributorkauniyah.com/my/public/getSubdistricts/' + citiesId,
                    type: 'GET' ,
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="idSubdistrict"]').empty();
                        $('select[name="idSubdistrict"]').append('<option value="">Pilih Kecamatan</option>');
                        $.each(data,function(key, value){
                            $('select[name="idSubdistrict"]').append('<option value="'+value['subdistrict_id']+'">' + value['subdistrict_name'] +'</option>');
                        });
                    }
                })
            } else {
                $('select[name="idSubdistrict"]').empty();
            }
        });
    });
</script>
@endif

@if(request()->segment(1) === 'payment')
<script type="text/javascript">
    $(document).ready(function () {
        $('#bankBCA').click(function(){
            $('#bank').val('Transfer Bank BCA');
        });

        $('#bankMandiri').click(function(){
            $('#bank').val('Transfer Bank MANDIRI');
        });
    });
</script>
@endif


@if(request()->segment(1) === 'ongkir' AND !empty(($getOngkir)))
<script type="text/javascript">
    $(document).ready(function () {
        @foreach($getOngkir as $ongkir)
            $('#{{ $ongkir->service }}').click(function(){
                $('#jenisOngkir').val(document.getElementById('jenisOngkir{{ $ongkir->service }}').value);
                $('#hargaOngkir').val(document.getElementById('hargaOngkir{{ $ongkir->service }}').value);
            });
        @endforeach

        $('#Instan').click(function(){
                $('#jenisOngkir').val(document.getElementById('jenisOngkirInstan').value);
                $('#hargaOngkir').val(document.getElementById('hargaOngkirInstan').value);
        });
        $('#Sameday').click(function(){
                $('#jenisOngkir').val(document.getElementById('jenisOngkirSameday').value);
                $('#hargaOngkir').val(document.getElementById('hargaOngkirSameday').value);
        });
    });
</script>
@endif

<!--Start of Tawk.to Script-->

<script type="text/javascript">
    var Tawk_API=Tawk_API||{};
    @if(!empty(auth('web')->user()->name))
        Tawk_API.visitor = {
            name : '{{ auth('web')->user()->name }}',
            email : '{{ auth('web')->user()->email }}',
            hash : '<?php echo hash_hmac("sha256", "{{ auth('web')->user()->email }}","ee8cfbb72d25a71192afa42ac51390053623d147"); ?>'
        };
        Tawk_API.setAttributes = {
            'id'    : 'A1234',
            'store' : 'Midvalley'
        };
    @endif

    Tawk_LoadStart=new Date();
    Tawk_API.customStyle = {
		visibility : {
			desktop : {
				position : 'br',
				xOffset : '60px',
				yOffset : 20
			},
			mobile : {
				position : 'br',
				xOffset : 0,
				yOffset : 70
			},
			bubble : {
				rotate : '0deg',
			 	xOffset : -20,
			 	yOffset : 0
			}
		}
	};
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/660242e81ec1082f04db1dfd/1hpsdana0';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
