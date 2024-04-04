@extends('layouts.page')

@section('content')
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
    <!-- Main Content Start -->
    <main class="page-content space-top p-b80">
		<div class="container">
			<div class="dz-flex-box">
				<div class="dz-list m-b20">
					<ul class="dz-list-group">
						<li class="list-group-items">
							<a href="{{ route('custAddress.selectAddress') }}" class="item-link">
								<div class="dz-icon style-2 icon-fill"><i class="fi fi-rr-user font-20"></i></div>
								<div class="list-content">
									<h6 class="title">Penerima</h6>
									<p class="active-status">{{ $addrSend->nama }} ({{ $addrSend->label }})<br>
                                        No. WA : {{ $addrSend->noWa }}
                                    </p>
								</div>
							</a>
						</li>
						<li class="list-group-items">
							<a href="{{ route('custAddress.selectAddress') }}" class="item-link">
								<div class="dz-icon style-2 icon-fill"><i class="fi fi-rr-marker font-20"></i></div>
								<div class="list-content">
									<h6 class="title">Alamat pengiriman</h6>
									<p class="active-status">{{ $addrSend->alamat }}, <br>Kel. {{ $addrSend->kelurahan }}, kec. {{ $addrSend->subdistrict_name }}, {{ $addrSend->type }} {{ $addrSend->city_name }}, {{ $addrSend->province }}
                                    </p>
								</div>
							</a>
						</li>
						<li class="list-group-items">
							<a href="{{ route('home.ongkir') }}" class="item-link">
								<div class="dz-icon dz-icon style-2 icon-fill"><i class="fi fi-rr-truck-side font-20"></i></div>
								<div class="list-content">
									<h6 class="title">Opsi Pengiriman</h6>
									<p class="active-status">{{ $jenisOngkir ?? 'Belum memilih Pengiriman'}}</p>
								</div>
							</a>
						</li>
						<li class="list-group-items">
							<a href="{{ route('home.payment') }}" class="item-link">
								<div class="dz-icon dz-icon style-2 icon-fill"><i class="fi fi-rr-credit-card font-20"></i></div>
								<div class="list-content">
									<h6 class="title">Metode Pembayaran</h6>
									<p class="active-status">{{ $bankPayment ?? 'Belum memilih pembayaran'}}</p>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="mb-3">
					<label class="form-label" for="note">Pesan untuk penjual:</label>
					<textarea class="form-control dz-textarea" name="note" id="note" rows="4" placeholder="(opsional) Tinggalkan pesan untuk penjual"></textarea>
				</div>

				<div class="view-cart mt-auto">
					<ul>
                        @php
                        $hemat = 0;
                        $totalQty = 0;
                        $voucher = $kupon['value'];
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
                            <li>
                                <span class="name">{{ $item->name }}</span>
                                <span class="about">{{ $item->qty }} x Rp {{ number_format($item->price, 0, ".", ".") }}</span>
                            </li>
                        @endforeach
                        @php
                            $totalHemat = $voucher + $hemat + $kodeUnik;
                        @endphp
						<li>
							<span class="name font-w600">Sub Total</span>
							<span class="about font-w600">{{ LaraCart::subTotal() }}</span>
						</li>
						<li>
							<span class="name">Pengiriman<br>
                            &MediumSpace;&blacktriangleright;{{ $sesKotaKab }} &LongRightArrow; {{ $addrSend->city_name }}</span>
							<span class="about font-w500">Rp {{ number_format($hargaOngkir, 0, ".", ".") ?? '0'}}</span>
						</li>
						<li>
							<span class="name">Diskon Voucher <a href="{{ route('home.cart') }}">(lihat voucher)</a></span>
							<span class="status font-w500">-{{ LaraCart::discountTotal() }}</span>
						</li>
						<li>
							<span class="name">Diskon Kode Unik</span>
							<span class="status font-w500">- Rp {{ $kodeUnik }}</span>
						</li>
						<li class="dz-total">
							<span class="name font-18 font-w600">Total Pembayaran</span>
							<h5 class="price">{{ LaraCart::total() }}</h5>
						</li>
                        <li>
							<h5 class="status font-w600">Hemat</h5>
							<h5 class="status font-w600">Rp {{ number_format($totalHemat, 0, ".", ".") ?? '0' }}</h5>
						</li>
					</ul>
                    @if($jenisOngkir == 'Instan' OR $jenisOngkir == 'Sameday')
                    <div class="alert alert-danger fade show mb-2">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <strong>Total diatas belum termasuk ongkir Instan / Sameday !</strong><br/>Jangan transfer sebelum kami update ongkir instan/sameday. mohon tunggu, kami akan menghubungi Anda.
                    </div>
                    @endif
				</div>
			</div>
		</div>
	</main>
	<!-- Main Content End -->

	<!-- Footer Fixed Button -->
	<div class="footer-fixed-btn bottom-0 bg-white">
        <input type="hidden" name="idReseller" value="{{$sesIdReseller}}">
        <input type="hidden" name="kodeUnik" value="{{$kodeUnik}}">
        <input type="hidden" name="hemat" value="{{$totalHemat}}">
        @if (empty($sesIdReseller))
            <a href="#" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl disabled">Belum pilih Reseller</a>
        @elseif (empty($jenisOngkir))
            <a href="#" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl disabled">Pilih Opsi Pengiriman</a>
        @elseif (empty($bankPayment))
            <a href="#" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl disabled">Pilih Metode Pembayaran</a>
        @else
		    <button type="submit" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl">Buat Pesanan</button>
        @endif
	</div>
	<!-- Footer Fixed Button -->
    </form>
@endsection
