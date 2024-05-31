@extends('layouts.page')

@section('content')
	<!-- Main Content Start -->
	<main class="page-content space-top">
		<div class="container pt-0">
			<div class="default-tab style-2">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" data-bs-toggle="tab" href="#unpaid" aria-selected="true" role="tab">Belum Bayar @if(isset($pesanans['unpaid'])) (@php echo count($pesanans['unpaid']) @endphp) @endif</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#dikemas" aria-selected="false" role="tab" tabindex="-1">Dikemas @if(isset($pesanans['dikemas'])) (@php echo count($pesanans['dikemas']) @endphp) @endif</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#dikirim" aria-selected="false" role="tab" tabindex="-1">Dikirim @if(isset($pesanans['dikirim'])) (@php echo count($pesanans['dikirim']) @endphp) @endif</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#selesai" aria-selected="false" role="tab" tabindex="-1">Selesai @if(isset($pesanans['selesai'])) (@php echo count($pesanans['selesai']) @endphp) @endif</a>
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
                                                    <li class="dz-price flex-1">Rp. ***.***</li>
                                                    <li>
                                                        <a href="#" class="btn btn-warning btn-xs font-13 btn-thin rounded-xl disabled">Mohon tunggu</a>
                                                    </li>
                                                @else
                                                    <li class="dz-price flex-1">Rp. {{ number_format(($subtotal + $unpaid['penerima']['ongkir'] - $unpaid['penerima']['voucher'] - $unpaid['penerima']['kodeunik']), 0, ".", ".") }} </li>
                                                    <li>
                                                        <a href="{{ route('pesanan.paymentOrder', $unpaid['penerima']['noPesanan']) }}" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">{{$unpaid['penerima']['waktu_dibayar'] == '2000-01-01 00:00:00' ? 'Bayar Sekarang' : 'Menunggu verifikasi'}}</a>
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
                                @php
                                    $subtotal = 0;
                                @endphp
                                <li>
                                    <div class="dz-card list">
                                        <div class="dz-content">
                                            <div class="dz-head">
                                                <h6 class="title">No. Pesanan : {{ $dikemas['penerima']['noPesanan'] }} <small>{{ $dikemas['penerima']['created_at']->format('d M Y H:i:s') }} WIB</small></h6>
                                                <ul>
                                                    @foreach($dikemas['produk'] as $produk)
                                                        <li><a href="javascript:void(0);">{{ $produk['jumlah'] }} x {{ $produk['nama'] }}</a></li>
                                                        @php
                                                            $subtotal += $produk['subtotal'];
                                                        @endphp
                                                    @endforeach
                                                    <li>&nbsp;</li>
                                                    <li>&blacktriangleright;{{ $dikemas['penerima']['origin'] }} &LongRightArrow; {{ $dikemas['penerima']['destination'] }}</li>
                                                    @if($dikemas['penerima']['ongkir'] <= 0)
                                                        <li>Ongkir {{ $dikemas['penerima']['jasa_kirim'] }} : Belum dihitung, mohon menunggu..</li>
                                                    @else
                                                        <li>Ongkir {{ $dikemas['penerima']['jasa_kirim'] }} : Rp. {{ $dikemas['penerima']['ongkir'] ?? '0' }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <ul class="dz-meta">
                                                @if($dikemas['penerima']['ongkir'] <= 0)
                                                    <li class="dz-price flex-1">Rp. ***.***</li>
                                                    <li>
                                                        <a href="{{ route('pesanan.paymentOrder', $dikemas['penerima']['noPesanan']) }}" class="btn btn-warning btn-xs font-13 btn-thin rounded-xl disabled">Mohon tunggu</a>
                                                    </li>
                                                @else
                                                    <li class="dz-price flex-1">Rp. {{ number_format(($subtotal + $dikemas['penerima']['ongkir'] - $dikemas['penerima']['voucher'] - $dikemas['penerima']['kodeunik']), 0, ".", ".") }} </li>
                                                    <li>
                                                        <a href="{{ route('pesanan.paymentOrder', $dikemas['penerima']['noPesanan']) }}" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">Pembayaran diterima</a>
                                                    </li>
                                                @endif
                                            </ul>
                                            <small> Hemat : Rp. {{ $dikemas['penerima']['hemat'] ?? '0' }}</small>
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
                                @php
                                    $subtotal = 0;
                                @endphp
                                <li>
                                    <div class="dz-card list">
                                        <div class="dz-content">
                                            <div class="dz-head">
                                                <h6 class="title">No. Pesanan : {{ $dikirim['penerima']['noPesanan'] }} <small>{{ $dikirim['penerima']['created_at']->format('d M Y H:i:s') }} WIB</small></h6>
                                                <ul>
                                                    @foreach($dikirim['produk'] as $produk)
                                                        <li><a href="javascript:void(0);">{{ $produk['jumlah'] }} x {{ $produk['nama'] }}</a></li>
                                                        @php
                                                            $subtotal += $produk['subtotal'];
                                                        @endphp
                                                    @endforeach
                                                    <li>&nbsp;</li>
                                                    <li>&blacktriangleright;{{ $dikirim['penerima']['origin'] }} &LongRightArrow; {{ $dikirim['penerima']['destination'] }}</li>
                                                    @if($dikirim['penerima']['ongkir'] <= 0)
                                                        <li>Ongkir {{ $dikirim['penerima']['jasa_kirim'] }} : Belum dihitung, mohon menunggu..</li>
                                                    @else
                                                        <li>Ongkir {{ $dikirim['penerima']['jasa_kirim'] }} : Rp. {{ $dikirim['penerima']['ongkir'] ?? '0' }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <ul class="dz-meta">
                                                @if($dikirim['penerima']['ongkir'] <= 0)
                                                    <li class="dz-price flex-1">Rp. ***.***</li>
                                                    <li>
                                                        <a href="{{ route('pesanan.paymentOrder', $dikirim['penerima']['noPesanan']) }}" class="btn btn-warning btn-xs font-13 btn-thin rounded-xl disabled">Mohon tunggu</a>
                                                    </li>
                                                @else
                                                    <li class="dz-price flex-1">Rp. {{ number_format(($subtotal + $dikirim['penerima']['ongkir'] - $dikirim['penerima']['voucher'] - $dikirim['penerima']['kodeunik']), 0, ".", ".") }} </li>
                                                    <li>
                                                        <a href="{{ route('pesanan.paymentOrder', $dikirim['penerima']['noPesanan']) }}" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">Lacak</a>
                                                    </li>
                                                @endif
                                            </ul>
                                            <small> Hemat : Rp. {{ $dikirim['penerima']['hemat'] ?? '0' }}</small>
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
                                @php
                                    $subtotal = 0;
                                @endphp
                                <li>
                                    <div class="dz-card list">
                                        <div class="dz-content">
                                            <div class="dz-head">
                                                <h6 class="title">No. Pesanan : {{ $selesai['penerima']['noPesanan'] }} <small>{{ $selesai['penerima']['created_at']->format('d M Y H:i:s') }} WIB</small></h6>
                                                <ul>
                                                    @foreach($selesai['produk'] as $produk)
                                                        <li><a href="javascript:void(0);">{{ $produk['jumlah'] }} x {{ $produk['nama'] }}</a></li>
                                                        @php
                                                            $subtotal += $produk['subtotal'];
                                                        @endphp
                                                    @endforeach
                                                    <li>&nbsp;</li>
                                                    <li>&blacktriangleright;{{ $selesai['penerima']['origin'] }} &LongRightArrow; {{ $selesai['penerima']['destination'] }}</li>
                                                    @if($selesai['penerima']['ongkir'] <= 0)
                                                        <li>Ongkir {{ $selesai['penerima']['jasa_kirim'] }} : Belum dihitung, mohon menunggu..</li>
                                                    @else
                                                        <li>Ongkir {{ $selesai['penerima']['jasa_kirim'] }} : Rp. {{ $selesai['penerima']['ongkir'] ?? '0' }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <ul class="dz-meta">
                                                @if($selesai['penerima']['ongkir'] <= 0)
                                                    <li class="dz-price flex-1">Rp. ***.***</li>
                                                    <li>
                                                        <a href="#" class="btn btn-warning btn-xs font-13 btn-thin rounded-xl disabled">Mohon tunggu</a>
                                                    </li>
                                                @else
                                                    <li class="dz-price flex-1">Rp. {{ number_format(($subtotal + $selesai['penerima']['ongkir'] - $selesai['penerima']['voucher'] - $selesai['penerima']['kodeunik']), 0, ".", ".") }} </li>
                                                    <li>
                                                        <a href="#" class="btn btn-primary btn-xs font-13 btn-thin rounded-xl">Ulasan</a>
                                                    </li>
                                                @endif
                                            </ul>
                                            <small> Hemat : Rp. {{ $selesai['penerima']['hemat'] ?? '0' }}</small>
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
