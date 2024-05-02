@extends('layouts.page')

@section('content')
    <main class="page-content space-top p-b80">
        <div class="container">
        @php
            $total = 0;
        @endphp
        @foreach ($pesanans as $ps)
            @php
                $metodeTransfer = $ps->metodeTransfer;
                $total += $ps->subtotal;
                $tglPesan = $ps->created_at;
            @endphp
        @endforeach
        @php
            $total += $ps->ongkir-$ps->voucher-$ps->kodeunik;
        @endphp
        @if($metodeTransfer == 'Transfer Bank BCA')
        <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">B C A<br/>4740 4325 46</h5>
              <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
              <a href="#" class="btn btn-outline-primary">Rp. {{number_format($total, 0, ".", ".")}}</a>
            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <div class="dz-icon me-2">
                        <i class="fi fi-rr-shield-check font-24 text-success"></i>
                    </div>
                    <p class="mb-0 pe-3">Pastikan Anda hanya transfer ke rekening diatas!</p>
                </div>
            </div>
        </div>
        @elseif($metodeTransfer == 'Transfer Bank MANDIRI')
        <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">MANDIRI<br/>1640 0013 37007</h5>
              <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
              <a href="#" class="btn btn-outline-primary">Rp. {{number_format($total, 0, ".", ".")}}</a>
            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <div class="dz-icon me-2">
                        <i class="fi fi-rr-shield-check font-24 text-success"></i>
                    </div>
                    <p class="mb-0 pe-3">Pastikan Anda hanya transfer ke rekening diatas!</p>
                </div>
            </div>
        </div>
        @else
        <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">B C A<br/>4740 4325 46</h5>
              <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
              <a href="#" class="btn btn-outline-primary">Rp. {{number_format($total, 0, ".", ".")}}</a>
            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <div class="dz-icon me-2">
                        <i class="fi fi-rr-shield-check font-24 text-success"></i>
                    </div>
                    <p class="mb-0 pe-3">Pastikan Anda hanya transfer ke rekening diatas!</p>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">MANDIRI<br/>1640 0013 37007</h5>
              <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
              <a href="#" class="btn btn-outline-primary">Rp. {{number_format($total, 0, ".", ".")}}</a>
            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center">
                    <div class="dz-icon me-2">
                        <i class="fi fi-rr-shield-check font-24 text-success"></i>
                    </div>
                    <p class="mb-0 pe-3">Pastikan Anda hanya transfer ke rekening diatas!</p>
                </div>
            </div>
        </div>
        @endif
        <button type="button" class="btn mb-2 me-2 btn-block btn-primary">Primary</button>
            <div class="fixed-content">
                <ul class="dz-track-list">
                    <li>
                        <div class="icon-bx location">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9993 5.48404C9.59314 5.48404 7.64258 7.4346 7.64258 9.84075C7.64258 12.2469 9.59314 14.1975 11.9993 14.1975C14.4054 14.1975 16.356 12.2469 16.356 9.84075C16.356 7.4346 14.4054 5.48404 11.9993 5.48404ZM11.9993 12.0191C10.7962 12.0191 9.82096 11.0438 9.82096 9.84075C9.82096 8.6377 10.7962 7.66242 11.9993 7.66242C13.2023 7.66242 14.1776 8.6377 14.1776 9.84075C14.1776 11.0438 13.2023 12.0191 11.9993 12.0191Z" fill="#4A3749"></path>
                                <path d="M21.793 9.81896C21.8074 4.41054 17.4348 0.0144869 12.0264 5.09008e-05C6.61797 -0.0143851 2.22191 4.35827 2.20748 9.76664C2.16044 15.938 5.85106 21.5248 11.546 23.903C11.6884 23.9674 11.8429 24.0005 11.9991 24C12.1565 24.0002 12.3121 23.9668 12.4555 23.9019C18.1324 21.5313 21.8191 15.9709 21.793 9.81896ZM11.9992 21.7127C7.30495 19.646 4.30485 14.9691 4.38364 9.84071C4.38364 5.63477 7.79323 2.22518 11.9992 2.22518C16.2051 2.22518 19.6147 5.63477 19.6147 9.84071V9.91152C19.6686 15.0154 16.672 19.6591 11.9992 21.7127Z" fill="#4A3749"></path>
                            </svg>
                        </div>
                        <div class="info">
                            <h5 class="title">Pesanan Dibuat</h5>
                            <p><small>{{$tglPesan}}</small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill-opacity="0.1">
                                <path d="M22.029,5.994,20.97,1.758A1,1,0,0,0,20,1H4a1,1,0,0,0-.97.758L1.971,5.994A4,4,0,0,0,2.7,9.45a4.033,4.033,0,0,0,.3.3V22a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V9.753a4.033,4.033,0,0,0,.3-.3A4,4,0,0,0,22.029,5.994ZM10,6l.251-3h3.492L14,6l.066.8A2.027,2.027,0,0,1,12.042,9h-.084A2.027,2.027,0,0,1,9.937,6.8ZM4.28,8.22a2.016,2.016,0,0,1-.369-1.741L4.781,3H8.247L7.9,7.14A2.041,2.041,0,0,1,5.879,9,2.015,2.015,0,0,1,4.28,8.22ZM13,21H11V16h2Zm6,0H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v6H5V10.9A3.953,3.953,0,0,0,8.911,9.589c.03.035.051.076.083.11A4.04,4.04,0,0,0,11.958,11h.084a4.04,4.04,0,0,0,2.964-1.3c.032-.034.053-.075.083-.11A3.953,3.953,0,0,0,19,10.9Zm.72-12.78a2.015,2.015,0,0,1-1.6.78A2.041,2.041,0,0,1,16.1,7.14L15.753,3h3.466l.87,3.479A2.016,2.016,0,0,1,19.72,8.22Z"></path>
                            </svg>
                        </div>
                        <div class="info">
                            <h5 class="title" style="opacity: 0.1">Pesanan Dibayarkan</h5>
                            <p style="opacity: 0.1">(Rp. 0)</p>
                            <p><small></small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill-opacity="0.1">
                                <path d="M22.029,5.994,20.97,1.758A1,1,0,0,0,20,1H4a1,1,0,0,0-.97.758L1.971,5.994A4,4,0,0,0,2.7,9.45a4.033,4.033,0,0,0,.3.3V22a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V9.753a4.033,4.033,0,0,0,.3-.3A4,4,0,0,0,22.029,5.994ZM10,6l.251-3h3.492L14,6l.066.8A2.027,2.027,0,0,1,12.042,9h-.084A2.027,2.027,0,0,1,9.937,6.8ZM4.28,8.22a2.016,2.016,0,0,1-.369-1.741L4.781,3H8.247L7.9,7.14A2.041,2.041,0,0,1,5.879,9,2.015,2.015,0,0,1,4.28,8.22ZM13,21H11V16h2Zm6,0H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v6H5V10.9A3.953,3.953,0,0,0,8.911,9.589c.03.035.051.076.083.11A4.04,4.04,0,0,0,11.958,11h.084a4.04,4.04,0,0,0,2.964-1.3c.032-.034.053-.075.083-.11A3.953,3.953,0,0,0,19,10.9Zm.72-12.78a2.015,2.015,0,0,1-1.6.78A2.041,2.041,0,0,1,16.1,7.14L15.753,3h3.466l.87,3.479A2.016,2.016,0,0,1,19.72,8.22Z"></path>
                            </svg>
                        </div>
                        <div class="info">
                            <h5 class="title" style="opacity: 0.1">Pesanan Dikirimkan</h5>
                            <p><small></small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill-opacity="0.1">
                                <path d="M22.029,5.994,20.97,1.758A1,1,0,0,0,20,1H4a1,1,0,0,0-.97.758L1.971,5.994A4,4,0,0,0,2.7,9.45a4.033,4.033,0,0,0,.3.3V22a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V9.753a4.033,4.033,0,0,0,.3-.3A4,4,0,0,0,22.029,5.994ZM10,6l.251-3h3.492L14,6l.066.8A2.027,2.027,0,0,1,12.042,9h-.084A2.027,2.027,0,0,1,9.937,6.8ZM4.28,8.22a2.016,2.016,0,0,1-.369-1.741L4.781,3H8.247L7.9,7.14A2.041,2.041,0,0,1,5.879,9,2.015,2.015,0,0,1,4.28,8.22ZM13,21H11V16h2Zm6,0H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v6H5V10.9A3.953,3.953,0,0,0,8.911,9.589c.03.035.051.076.083.11A4.04,4.04,0,0,0,11.958,11h.084a4.04,4.04,0,0,0,2.964-1.3c.032-.034.053-.075.083-.11A3.953,3.953,0,0,0,19,10.9Zm.72-12.78a2.015,2.015,0,0,1-1.6.78A2.041,2.041,0,0,1,16.1,7.14L15.753,3h3.466l.87,3.479A2.016,2.016,0,0,1,19.72,8.22Z"></path>
                            </svg>
                        </div>
                        <div class="info">
                            <h5 class="title" style="opacity: 0.1">Dikirim</h5>
                            <p><small></small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill-opacity="0.1">
                                <path d="M22.029,5.994,20.97,1.758A1,1,0,0,0,20,1H4a1,1,0,0,0-.97.758L1.971,5.994A4,4,0,0,0,2.7,9.45a4.033,4.033,0,0,0,.3.3V22a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V9.753a4.033,4.033,0,0,0,.3-.3A4,4,0,0,0,22.029,5.994ZM10,6l.251-3h3.492L14,6l.066.8A2.027,2.027,0,0,1,12.042,9h-.084A2.027,2.027,0,0,1,9.937,6.8ZM4.28,8.22a2.016,2.016,0,0,1-.369-1.741L4.781,3H8.247L7.9,7.14A2.041,2.041,0,0,1,5.879,9,2.015,2.015,0,0,1,4.28,8.22ZM13,21H11V16h2Zm6,0H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v6H5V10.9A3.953,3.953,0,0,0,8.911,9.589c.03.035.051.076.083.11A4.04,4.04,0,0,0,11.958,11h.084a4.04,4.04,0,0,0,2.964-1.3c.032-.034.053-.075.083-.11A3.953,3.953,0,0,0,19,10.9Zm.72-12.78a2.015,2.015,0,0,1-1.6.78A2.041,2.041,0,0,1,16.1,7.14L15.753,3h3.466l.87,3.479A2.016,2.016,0,0,1,19.72,8.22Z"></path>
                            </svg>
                        </div>
                        <div class="info">
                            <h5 class="title" style="opacity: 0.1">Selesai</h5>
                            <p><small></small></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@endsection
