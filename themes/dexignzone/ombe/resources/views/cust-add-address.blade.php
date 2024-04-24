@extends('layouts.page')

@section('content')
<!-- Main Content Start -->
<form action="{{ route('custAddress.store') }}" method="POST">
    @csrf
    <main class="page-content space-top p-b100">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <h6 class="dz-title my-2">Penerima</h6>
            <div class="mb-3">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <label class="form-label" for="noWa">No. Whatsapp</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">+62</span>
                <input type="number" id="noWa" name="noWa" class="form-control" placeholder="81212345678" required>
            </div>

            <h6 class="dz-title my-2">Alamat</h6>
            <div class="mb-3">
                <label class="form-label" for="alamat">Alamat lengkap</label>
                <input type="text" id="alamat" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="idProvince">Provinsi</label>
                {{-- <input type="text" id="province" class="form-control"> --}}
                <select class="form-control" name="idProvince" id="idProvince" aria-label="Pilih Provinsi" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach($province as $prov)
                        <option value="{{ $prov->province_id }}">{{ $prov->province }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="idCity">Kota / Kabupaten</label>
                <select class="form-control" name="idCity" id="idCity" required>
                    <option value="">Pilih Provinsi terlebih dahulu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="idSubdistrict">Kecamatan</label>
                <select class="form-control" name="idSubdistrict" id="idSubdistrict" required>
                    <option value="">Pilih Kota / Kab. terlebih dahulu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="kelurahan">Kelurahan</label>
                <input type="text" id="kelurahan" name="kelurahan" class="form-control" required>
            </div>
            <h6 class="dz-title my-2">Tandai sebagai</h6>
            <div class="d-flex flex-wrap gap-2">
                <div class="form-check style-2">
                    <input class="form-check-input" type="radio" name="label" id="filterRadio1" checked="" value="rumah">
                    <label class="form-check-label" for="filterRadio1">
                        Rumah
                    </label>
                </div>
                <div class="form-check style-2">
                    <input class="form-check-input" type="radio" name="label" id="filterRadio2" value="toko">
                    <label class="form-check-label" for="filterRadio2">
                        Toko
                    </label>
                </div>
                <div class="form-check style-2">
                    <input class="form-check-input" type="radio" name="label" id="filterRadio3" value="kantor">
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
        <input type="hidden" name="idUser" value="{{ auth('web')->user()->id }}">
        <button type="submit" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl">Simpan Alamat</button>
    </div>
    <!-- Footer Fixed Button -->
</form>
@endsection
