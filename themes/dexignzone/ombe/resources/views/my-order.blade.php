@extends('layouts.page')

@section('content')
	<!-- Main Content Start -->
	<main class="page-content space-top">
		<div class="container pt-0">
			<div class="default-tab style-2">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" data-bs-toggle="tab" href="#unpaid" aria-selected="true" role="tab">Belum Bayar</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#dikemas" aria-selected="false" role="tab" tabindex="-1">Dikemas</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#dikirim" aria-selected="false" role="tab" tabindex="-1">Dikirim</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#selesai" aria-selected="false" role="tab" tabindex="-1">Selesai</a>
					</li>
				</ul>
				<div class="tab-content" style="margin-top: 7rem;">
					<div class="tab-pane fade active show" id="unpaid" role="tabpanel">
						<ul class="featured-list">
                            @if(!empty($pesanans['unpaid']))
                                @foreach($pesanans['unpaid'] as $unpaid)
                                @php
                                    $subtotal = 0;
                                @endphp
                                <li>
                                    <div class="dz-card list">
                                        <div class="dz-content">
                                            <div class="dz-head">
                                                <h6 class="title">No. Pesanan : {{ $unpaid['penerima']['noPesanan'] }} <small>{{ $unpaid['penerima']['created_at']->format('d M Y H:i:s') }} WIB</small></h6>
                                                <ul>
                                                    @foreach($unpaid['produk'] as $produk)
                                                        <li><a href="javascript:void(0);">{{ $produk['jumlah'] }} x {{ $produk['nama'] }}</a></li>
                                                        @php
                                                            $subtotal += $produk['subtotal'];
                                                        @endphp
                                                    @endforeach
                                                    <li>&nbsp;</li>
                                                    <li>&blacktriangleright;{{ $unpaid['penerima']['origin'] }} &LongRightArrow; {{ $unpaid['penerima']['destination'] }}</li>
                                                    @if($unpaid['penerima']['ongkir'] <= 0)
                                                        <li>Ongkir {{ $unpaid['penerima']['jasa_kirim'] }} : Belum dihitung, mohon menunggu..</li>
                                                    @else
                                                        <li>Ongkir {{ $unpaid['penerima']['jasa_kirim'] }} : Rp. {{ $unpaid['penerima']['ongkir'] ?? '0' }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <ul class="dz-meta">
                                                @if($unpaid['penerima']['ongkir'] <= 0)
                                                    <li class="dz-price flex-1">Rp. ***.*** <small> Hemat : Rp. {{ $unpaid['penerima']['hemat'] ?? '0' }}</small></li>
                                                    <li>
                                                        <a href="track-order.html" class="btn btn-warning btn-xs font-13 btn-thin rounded-xl disabled">Mohon tunggu</a>
                                                    </li>
                                                @else
                                                    <li class="dz-price flex-1">Rp. {{ number_format(($subtotal + $unpaid['penerima']['ongkir'] - $unpaid['penerima']['hemat']), 0, ".", ".") }} </li>
                                                    <li>
                                                        <a href="track-order.html" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">Bayar Sekarang</a>
                                                    </li>
                                                @endif
                                            </ul>
                                            <small> Hemat : Rp. {{ $unpaid['penerima']['hemat'] ?? '0' }}</small>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <li>
                                    Belum ada pesanan :(
                                </li>
                            @endif
						</ul>
					</div>
					<div class="tab-pane fade" id="dikemas" role="tabpanel">
						<ul class="featured-list">
                            @if(!empty($pesanans['dikemas']))
                                @foreach($pesanans['dikemas'] as $dikemas)
                                <li>
                                    <div class="dz-card list">
                                        <div class="dz-content">
                                            <div class="dz-head">
                                                <h6 class="title"><a href="product-detail.html">No. Pesanan : </a></h6>
                                                <ul class="tag-list">
                                                    <li><a href="javascript:void(0);">Tea</a></li>
                                                    <li><a href="javascript:void(0);">Lemon</a></li>
                                                </ul>
                                            </div>
                                            <ul class="dz-meta">
                                                <li class="dz-price flex-1">$12.6</li>
                                                <li>
                                                    <a href="track-order.html" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">Track Order</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <li>
                                    Belum ada pesanan :(
                                </li>
                            @endif
						</ul>
					</div>
					<div class="tab-pane fade" id="dikirim" role="tabpanel">
						<ul class="featured-list">
                            @if(!empty($pesanans['dikirim']))
                                @foreach($pesanans['dikirim'] as $dikirim)
                                <li>
                                    <div class="dz-card list">
                                        <div class="dz-content">
                                            <div class="dz-head">
                                                <h6 class="title"><a href="product-detail.html">No. Pesanan : </a></h6>
                                                <ul class="tag-list">
                                                    <li><a href="javascript:void(0);">Tea</a></li>
                                                    <li><a href="javascript:void(0);">Lemon</a></li>
                                                </ul>
                                            </div>
                                            <ul class="dz-meta">
                                                <li class="dz-price flex-1">$12.6</li>
                                                <li>
                                                    <a href="track-order.html" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">Track Order</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <li>
                                    Belum ada pesanan :(
                                </li>
                            @endif
						</ul>
					</div>
					<div class="tab-pane fade" id="selesai" role="tabpanel">
						<ul class="featured-list">
                            @if(!empty($pesanans['selesai']))
                                @foreach($pesanans['selesai'] as $selesai)
                                <li>
                                    <div class="dz-card list">
                                        <div class="dz-content">
                                            <div class="dz-head">
                                                <h6 class="title"><a href="product-detail.html">No. Pesanan : </a></h6>
                                                <ul class="tag-list">
                                                    <li><a href="javascript:void(0);">Tea</a></li>
                                                    <li><a href="javascript:void(0);">Lemon</a></li>
                                                </ul>
                                            </div>
                                            <ul class="dz-meta">
                                                <li class="dz-price flex-1">$12.6</li>
                                                <li>
                                                    <a href="track-order.html" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">Track Order</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @else
                                <li>
                                    Belum ada pesanan :(
                                </li>
                            @endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- Main Content End -->
@endsection
