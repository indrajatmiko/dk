@extends('layouts.page')

@section('content')
	<!-- Main Content Start -->
    <form action="{{ route('home.setOngkir') }}" method="POST">
    @csrf
	<main class="page-content space-top p-b80">
		<div class="container">
            @if(empty(($getOngkir)))
                <div class="alert alert-danger alert-dismissible fade show mb-2">
                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                    <strong>Peringatan!</strong> Anda belum memilih reseller terdekat.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    <span><i class="icon feather icon-x"></i></span>
                    </button>
                </div>
            @else
			<div class="accordion dz-accordion" id="accordionExample">
                <div class="accordion-item">
                    <div class="accordion-header acco-select" id="headingInstan">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInstan" aria-expanded="true" aria-controls="collapseInstan" name="Instan" id="Instan">
                            {{-- <span class="dz-icon">
                                <img src="{!! theme_asset('img/New_Logo_JNE.webp') !!}" alt="">
                            </span> --}}
                            <span class="acco-title">Instan</span>
                            <span class="checkmark"></span>
                        </button>
                    </div>
                    <div id="collapseInstan" class="accordion-collapse collapse" aria-labelledby="headingInstan" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Pengiriman Instan</p>
                            {{-- @foreach($ongkir->cost as $detail) --}}
                                Harga: dihitung manual, silakan chat untuk informasi ongkir. <br>
                                Estimasi: 2 jam, dihari yang sama.<br>
                                <input type="hidden" id="jenisOngkirInstan" value="Instan">
                                <input type="hidden" id="hargaOngkirInstan" value="0">
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header acco-select" id="headingSameday">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSameday" aria-expanded="true" aria-controls="collapseSameday" name="Sameday" id="Sameday">
                            {{-- <span class="dz-icon">
                                <img src="{!! theme_asset('img/New_Logo_JNE.webp') !!}" alt="">
                            </span> --}}
                            <span class="acco-title">Sameday</span>
                            <span class="checkmark"></span>
                        </button>
                    </div>
                    <div id="collapseSameday" class="accordion-collapse collapse" aria-labelledby="headingSameday" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Pengiriman Sameday</p>
                            {{-- @foreach($ongkir->cost as $detail) --}}
                                Harga: dihitung manual, silakan chat untuk informasi ongkir. <br>
                                Estimasi: 8 jam, dihari yang sama.<br>
                                <input type="hidden" id="jenisOngkirSameday" value="Sameday">
                                <input type="hidden" id="hargaOngkirSameday" value="0">
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                @foreach($getOngkir as $ongkir)
                    <div class="accordion-item">
                        <div class="accordion-header acco-select" id="heading{{ $ongkir->service }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $ongkir->service }}" aria-expanded="true" aria-controls="collapse{{ $ongkir->service }}" name="{{ $ongkir->service }}" id="{{ $ongkir->service }}">
                                {{-- <span class="dz-icon">
                                    <img src="{!! theme_asset('img/New_Logo_JNE.webp') !!}" alt="">
                                </span> --}}
                                <span class="acco-title">JNT - {{ $ongkir->service }}</span>
                                <span class="checkmark"></span>
                            </button>
                        </div>
                        <div id="collapse{{ $ongkir->service }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $ongkir->service }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{{ $ongkir->description }}</p>
                                @foreach($ongkir->cost as $detail)
                                    Harga: Rp. {{ $detail->value }} <br>
                                    Estimasi: {{ $detail->etd }} hari<br>
                                    <input type="hidden" id="jenisOngkir{{ $ongkir->service }}" value="JNE {{ $ongkir->service }}">
                                    <input type="hidden" id="hargaOngkir{{ $ongkir->service }}" value="{{ $detail->value }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="alert alert-warning fade show mb-2">
                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                    Estimasi dihitung setelah paket diserahkan kepada kurir.
                </div>
			</div>
            @endif
		</div>
	</main>
	<!-- Main Content End -->

    @if(!empty(($getOngkir)))
        <!-- Footer Fixed Button -->
        <div class="footer-fixed-btn bottom-0 bg-white">
            <input type="hidden" name="jenisOngkir" id="jenisOngkir">
            <input type="hidden" name="hargaOngkir" id="hargaOngkir">
            <button type="submit" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl">Simpan</button>
        </div>
        <!-- Footer Fixed Button -->
    @endif
    </form>
@endsection
