@extends('layouts.page')

@section('content')
<!-- Main Content Start -->
<main class="page-content space-top p-b100">
    <div class="container">
        <h6 class="dz-title my-2">Penerima</h6>
        <div class="mb-3">
            <label class="form-label" for="name">Nama Lengkap</label>
            <input type="text" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="phone">No. Whatsapp</label>
            <input type="number" id="phone" class="form-control">
        </div>

        <h6 class="dz-title my-2">Alamat</h6>
        <div class="mb-3">
            <label class="form-label" for="pin">Pin Code</label>
            <input type="text" id="pin" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="address">Alamat lengkap</label>
            <input type="text" id="address" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="location">Propinsi</label>
            {{-- <input type="text" id="province" class="form-control"> --}}
            <select class="form-control" aria-label="Pilih Propinsi">
                @foreach($province as $prov)
                    <option value="{{ $prov->province_id }}">{{ $prov->province }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="city">Kota / Kabupaten</label>
            <input type="text" id="city" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="subdistrict">Kecamatan</label>
            <input type="text" id="subdistrict" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="kelurahan">Kelurahan</label>
            <input type="text" id="kelurahan" class="form-control">
        </div>
        <h6 class="dz-title my-2">Tandai sebagai</h6>
        <div class="d-flex flex-wrap gap-2">
            <div class="form-check style-2">
                <input class="form-check-input" type="radio" name="filterRadio" id="filterRadio1" checked="">
                <label class="form-check-label" for="filterRadio1">
                    Rumah
                </label>
            </div>
            <div class="form-check style-2">
                <input class="form-check-input" type="radio" name="filterRadio" id="filterRadio2">
                <label class="form-check-label" for="filterRadio2">
                    Toko
                </label>
            </div>
            <div class="form-check style-2">
                <input class="form-check-input" type="radio" name="filterRadio" id="filterRadio3">
                <label class="form-check-label" for="filterRadio3">
                    Kantor
                </label>
            </div>
        </div>
    </div>
</main>
<!-- Main Content End -->

<!-- Footer Fixed Button -->
<div class="footer-fixed-btn bottom-0 bg-white">
    <a href="addAddressSave" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl">Simpan Alamat</a>
</div>
<!-- Footer Fixed Button -->
@endsection
