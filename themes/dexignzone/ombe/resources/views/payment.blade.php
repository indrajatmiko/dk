@extends('layouts.page')

@section('content')
	<!-- Main Content Start -->
    <form action="{{ route('home.setPayment') }}" method="POST">
    @csrf
	<main class="page-content space-top p-b80">
		<div class="container">
			<div class="accordion dz-accordion" id="accordionExample">
                <div class="accordion-item">
					<div class="accordion-header acco-select" id="headingOne">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBCA" aria-expanded="true" aria-controls="collapseBCA" name="bankBCA" id="bankBCA">
							<span class="dz-icon">
								<i class="fi fi-rr-money"></i>
							</span>
							<span class="acco-title">Transfer Bank BCA</span>
							<span class="checkmark"></span>
						</button>
					</div>
					<div id="collapseBCA" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
						<div class="accordion-body">
                            <p>Silakan transfer sejumlah total ke: </p>
                            No. Rekening : 4740 4325 46<br>
                            Atas Nama : Indah Nuraeni
                            <br>
                            <br>
                            <div class="d-flex align-items-center">
								<div class="dz-icon me-2">
									<i class="fi fi-rr-shield-check font-24 text-success"></i>
								</div>
								<p class="mb-0 pe-3">Pastikan Anda hanya transfer ke rekening diatas!</p>
							</div>
						</div>
					</div>
				</div>
                <div class="accordion-item">
					<div class="accordion-header acco-select" id="headingOne">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMandiri" aria-expanded="true" aria-controls="collapseMandiri" name="bankMandiri" id="bankMandiri">
							<span class="dz-icon">
								<i class="fi fi-rr-money"></i>
							</span>
							<span class="acco-title">Transfer Bank MANDIRI</span>
							<span class="checkmark"></span>
						</button>
					</div>
					<div id="collapseMandiri" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
						<div class="accordion-body">
                            <p>Silakan transfer sejumlah total ke: </p>
                            No. Rekening : 1640 0013 37007<br>
                            Atas Nama : Indah Nuraeni
                            <br>
                            <br>
                            <div class="d-flex align-items-center">
								<div class="dz-icon me-2">
									<i class="fi fi-rr-shield-check font-24 text-success"></i>
								</div>
								<p class="mb-0 pe-3">Pastikan Anda hanya transfer ke rekening diatas!</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>
	<!-- Main Content End -->

	<!-- Footer Fixed Button -->
	<div class="footer-fixed-btn bottom-0 bg-white">
        <input type="hidden" name="bank" id="bank">
        <button type="submit" class="btn btn-lg btn-thin btn-primary w-100 rounded-xl">Simpan</button>
	</div>
	<!-- Footer Fixed Button -->
    </form>
@endsection
