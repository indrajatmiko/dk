@extends('layouts.page')

@section('content')
<form action="{{ route('custAddress.setAddress') }}" method="POST">
    @csrf
	<!-- Main Content Start -->
	<main class="page-content space-top p-b80">
		<div class="container">
			<div class="dz-list m-b20">
				<ul class="dz-list-group radio style-2">
                    @foreach($address as $addr)
                        @switch($addr->label)
                            @case('rumah')
                                @php $label = 'home' @endphp
                                @break
                            @case('toko')
                                @php $label = 'shop' @endphp
                                @break
                            @case('kantor')
                                @php $label = 'marker' @endphp
                                @break
                            @default
                        @endswitch
                        <li class="list-group-items">
                            <label class="radio-label">
                                <input type="radio" name="idAlamatCust" value="{{$addr->id}}" required>
                                <div class="checkmark">
                                    {{-- <div class="dz-icon style-1 icon-fill" style="width: 3rem !important;"><i class="fi fi-rr-{{ $label }} font-20"></i></div> --}}
                                    <div class="list-content" style="width: 95% !important;">
                                        <h6 class="title">{{ $addr->nama }} ({{ $addr->label }})</h6>
                                        <p class="active-status">{{ $addr->noWa }}<br/>{{ $addr->alamat }}, Kel. {{ $addr->kelurahan }}, kec. {{ $addr->subdistrict_name }}, {{ $addr->type }} {{ $addr->city_name }}, {{ $addr->province }}</p>
                                    </div>
                                    <span class="check"></span>
                                </div>
                            </label>
                        </li>
                    @endforeach
				</ul>
			</div>
			<a href="{{ route('home.addAddress') }}" class="dz-add-box">
				<i class="fi fi-rr-add me-2"></i>
				<span>Tambah alamat baru</span>
				<i class="feather icon-chevron-right"></i>
			</a>
		</div>
	</main>
	<!-- Main Content End -->

	<!-- Footer Fixed Button -->
	<div class="footer-fixed-btn bottom-0 bg-white">
        <button type="submit" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl">Pilih Alamat</button>
	</div>
	<!-- Footer Fixed Button -->
</form>
@endsection
