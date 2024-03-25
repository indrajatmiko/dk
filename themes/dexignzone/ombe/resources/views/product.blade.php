@extends('layouts.page-detail')

@section('content')
<form method="POST" action="{{ route('home.cartAdd') }}">
    @csrf
	<!-- Main Content Start -->
	<main class="page-content p-b80">
		<div class="container p-0">
			<div class="dz-product-preview bg-primary">
				<div class="swiper product-detail-swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
                            @foreach($fotos as $foto)
                                <div class="dz-media">
                                    <img src="{{  env('DK_ADMIN') }}uploads/{{ $foto->foto_1 }}" alt="">
                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="dz-product-detail">
				<div class="dz-handle"></div>
				<div class="detail-content">
					<h4 class="title">{{ $produk->nama }}</h4>
					<p>{!! $produk->deskripsi !!}</p>
				</div>
				<div class="dz-item-rating">{{ $produk->rating }}</div>
				<div class="item-wrapper">
					{{-- <div class="dz-range-slider">
						<div class="slider" id="slider-pips"></div>
					</div> --}}
					<div class="dz-meta-items">
						<div class="dz-price flex-1">
							<div class="price"><sub>Rp.</sub>{{ number_format($produk->harga_promo, 0, ".", ".") }}<del>Rp.{{ number_format($produk->harga, 0, ".", ".") }}</del></div>
						</div>
						<div class="dz-quantity">
							<div class="dz-stepper style-3">
								<input readonly class="stepper" type="text" value="1" name="qty">
							</div>
						</div>
					</div>
					<div class="description">
						<p class="text-light">*) Harga lebih murah dari marketplace</p>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- Main Content End -->

	<div class="footer fixed bg-white">
		<div class="container">
			{{-- <a href="{{ url('cartAdd/') }}/{{ $produk->id }}" class="btn btn-primary btn-lg rounded-xl btn-thin w-100 gap-2">Beli <span class="opacity-25">Rp. {{ number_format($produk->harga_promo, 0, ".", ".") }}</span></a> --}}
            <input type="hidden" name="productId" value="{{ $produk->id }}">
            <input type="submit" class="btn btn-primary btn-lg rounded-xl btn-thin w-100 gap-2" value="Beli">
		</div>
	</div>
</form>
@endsection
