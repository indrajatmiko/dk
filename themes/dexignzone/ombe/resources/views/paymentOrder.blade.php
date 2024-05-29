@extends('layouts.page')

@section('content')
    <main class="page-content space-top p-b80">
        <div class="container">
            @php
                $total = 0;
            @endphp
            @foreach ($pesanans as $ps)
                @php
                    $idPesanan = $ps->noPesanan;
                    $metodeTransfer = $ps->metodeTransfer;
                    $total += $ps->subtotal;
                    $tglPesan = $ps->created_at;
                    $status = $ps->status;
                    $tglBayar = $ps->waktu_dibayar;
                @endphp
            @endforeach
            @php
                $total += $ps->ongkir-$ps->voucher-$ps->kodeunik;
            @endphp
            @if($status == 'unpaid')
                @if($metodeTransfer == 'Transfer Bank BCA')
                <div class="card text-center">
                    <div class="card-body">
                    <h4 class="card-title">BANK B C A<br/>4740 4325 46</h4>
                    <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
                    Total Transfer
                    <h2>Rp. {{number_format($total, 0, ".", ".")}}</h2>
                    <small>Pastikan Anda transfer sesuai dengan nominal di atas.</small>
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
                    <h4 class="card-title">BANK MANDIRI<br/>1640 0013 37007</h4>
                    <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
                    Total Transfer
                    <h2>Rp. {{number_format($total, 0, ".", ".")}}</h2>
                    <small>Pastikan Anda transfer sesuai dengan nominal di atas.</small>
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
                    <h4 class="card-title">BANK B C A<br/>4740 4325 46</h4>
                    <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
                    Total Transfer
                    <h2>Rp. {{number_format($total, 0, ".", ".")}}</h2>
                    <small>Pastikan Anda transfer sesuai dengan nominal di atas.</small>
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
                    <h4 class="card-title">BANK MANDIRI<br/>1640 0013 37007</h4>
                    <p class="card-text">Atas Nama : Indah Nuraeni Kusumah Negara</p>
                    Total Transfer
                    <h2>Rp. {{number_format($total, 0, ".", ".")}}</h2>
                    <small>Pastikan Anda transfer sesuai dengan nominal di atas.</small>
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

                @if($tglBayar == '2000-01-01 00:00:00')
                    <form action="{{ route('pesanan.paymentNow') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idPesanan" value="{{$idPesanan}}" />
                        <button type="submit" class="btn mb-2 me-2 btn-block btn-primary">Saya sudah transfer</button>
                    </form>
                @else
                    <button type="button" class="btn mb-2 me-2 btn-block btn-primary">Menunggu verifikasi</button>
                @endif
            @elseif($status == 'dikemas')
                <div class="card text-center">
                    <div class="card-body">
                    <h4 class="card-title">Terima Kasih</h4>
                    <p class="card-text">Pesanan Anda sedang dikemas</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 pe-3">Kami akan update No. Resi Pengiriman.</p>
                        </div>
                    </div>
                </div>

            @elseif($status == 'dikirim')
                <div class="card text-center">
                    <div class="card-body">
                    <h4 class="card-title">Terima Kasih</h4>
                    <p class="card-text">Pesanan Anda telah diserahkan ke kurir</p>
                    <h4 class="card-title">No. RESI<br/>1640 0013 37007</h4>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 pe-3">Mohon tunggu proses pengiriman dari ekspedisi</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn mb-2 me-2 btn-block btn-primary">Lacak Pesanan</button>

            @elseif($status == 'selesai')
                <div class="card text-center">
                    <div class="card-body">
                    <h4 class="card-title">Terima Kasih</h4>
                    <p class="card-text">Pesanan Anda telah sampai</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 pe-3">Jika butuh bantuan, silakan chat kami.</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn mb-2 me-2 btn-block btn-primary">Berikan Ulasan</button>
            @endif
            <div class="fixed-content">
                <ul class="dz-track-list">
                    <li>
                        <div class="icon-bx location">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9993 5.48404C9.59314 5.48404 7.64258 7.4346 7.64258 9.84075C7.64258 12.2469 9.59314 14.1975 11.9993 14.1975C14.4054 14.1975 16.356 12.2469 16.356 9.84075C16.356 7.4346 14.4054 5.48404 11.9993 5.48404ZM11.9993 12.0191C10.7962 12.0191 9.82096 11.0438 9.82096 9.84075C9.82096 8.6377 10.7962 7.66242 11.9993 7.66242C13.2023 7.66242 14.1776 8.6377 14.1776 9.84075C14.1776 11.0438 13.2023 12.0191 11.9993 12.0191Z" fill="#4A3749"></path>
                                <path d="M21.793 9.81896C21.8074 4.41054 17.4348 0.0144869 12.0264 5.09008e-05C6.61797 -0.0143851 2.22191 4.35827 2.20748 9.76664C2.16044 15.938 5.85106 21.5248 11.546 23.903C11.6884 23.9674 11.8429 24.0005 11.9991 24C12.1565 24.0002 12.3121 23.9668 12.4555 23.9019C18.1324 21.5313 21.8191 15.9709 21.793 9.81896ZM11.9992 21.7127C7.30495 19.646 4.30485 14.9691 4.38364 9.84071C4.38364 5.63477 7.79323 2.22518 11.9992 2.22518C16.2051 2.22518 19.6147 5.63477 19.6147 9.84071V9.91152C19.6686 15.0154 16.672 19.6591 11.9992 21.7127Z" fill="#4A3749"></path>
                            </svg>
                        </div>
                        <div class="info">
                            <h5 class="title">Pesanan Dibuat</h5>
                            <p><small>{{$historis['unpaid']['tgl']}} WIB</small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx @if(isset($historis['paid'])) location @endif">
                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" @if(isset($historis['paid'])) @else fill-opacity="0.1" @endif>
                                <path d="m8,12c0,2.206,1.794,4,4,4s4-1.794,4-4-1.794-4-4-4-4,1.794-4,4Zm6,0c0,1.103-.897,2-2,2s-2-.897-2-2,.897-2,2-2,2,.897,2,2Zm-8.5-4c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm14.5,6.5c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5ZM0,13v-4c0-2.757,2.243-5,5-5h16.011l-1.239-1.314c-.378-.402-.36-1.035.042-1.414.401-.378,1.034-.36,1.414.042l2.244,2.381c.71.709.71,1.899-.021,2.63l-2.223,2.36c-.197.209-.462.314-.728.314-.246,0-.493-.09-.686-.272-.402-.379-.421-1.012-.042-1.414l1.238-1.314H5c-1.654,0-3,1.346-3,3v4c0,.552-.448,1-1,1s-1-.448-1-1Zm24-1.5v3.5c0,2.757-2.243,5-5,5H2.989l1.239,1.314c.378.402.36,1.035-.042,1.414-.193.182-.439.272-.686.272-.266,0-.531-.105-.728-.314l-2.244-2.381c-.71-.709-.71-1.899.021-2.63l2.223-2.36c.379-.403,1.012-.42,1.414-.042.402.379.421,1.012.042,1.414l-1.238,1.314h16.01c1.654,0,3-1.346,3-3v-3.5c0-.552.448-1,1-1s1,.448,1,1Z"/>
                              </svg>
                        </div>
                        <div class="info">
                            <h5 class="title" @if(isset($historis['paid'])) @else style="opacity: 0.1" @endif>Pesanan Dibayarkan</h5>
                            <p @if(isset($historis['paid'])) @else style="opacity: 0.1" @endif>@if(isset($historis['paid'])) {{ $historis['paid']['keterangan'] }} @endif</p>
                            <p><small>@if(isset($historis['paid'])) {{ $historis['paid']['tgl'] }} WIB @endif</small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx @if(isset($historis['dikemas'])) location @endif">
                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" @if(isset($historis['dikemas'])) @else fill-opacity="0.1" @endif><path d="M23.621,6.836l-1.352-2.826c-.349-.73-.99-1.296-1.758-1.552L14.214,.359c-1.428-.476-3-.476-4.428,0L3.49,2.458c-.769,.256-1.41,.823-1.759,1.554L.445,6.719c-.477,.792-.567,1.742-.247,2.609,.309,.84,.964,1.49,1.802,1.796l-.005,6.314c-.002,2.158,1.372,4.066,3.418,4.748l4.365,1.455c.714,.238,1.464,.357,2.214,.357s1.5-.119,2.214-.357l4.369-1.457c2.043-.681,3.417-2.585,3.419-4.739l.005-6.32c.846-.297,1.508-.946,1.819-1.79,.317-.858,.228-1.799-.198-2.499ZM10.419,2.257c1.02-.34,2.143-.34,3.162,0l4.248,1.416-5.822,1.95-5.834-1.95,4.246-1.415ZM2.204,7.666l1.327-2.782c.048,.025,7.057,2.373,7.057,2.373l-1.621,3.258c-.239,.398-.735,.582-1.173,.434l-5.081-1.693c-.297-.099-.53-.325-.639-.619-.109-.294-.078-.616,.129-.97Zm3.841,12.623c-1.228-.409-2.052-1.554-2.051-2.848l.005-5.648,3.162,1.054c1.344,.448,2.792-.087,3.559-1.371l.278-.557-.005,10.981c-.197-.04-.391-.091-.581-.155l-4.366-1.455Zm11.897-.001l-4.37,1.457c-.19,.063-.384,.115-.581,.155l.005-10.995,.319,.64c.556,.928,1.532,1.459,2.561,1.459,.319,0,.643-.051,.96-.157l3.161-1.053-.005,5.651c0,1.292-.826,2.435-2.052,2.844Zm4-11.644c-.105,.285-.331,.504-.619,.6l-5.118,1.706c-.438,.147-.934-.035-1.136-.365l-1.655-3.323s7.006-2.351,7.054-2.377l1.393,2.901c.157,.261,.186,.574,.081,.859Z"/></svg>
                              </svg>
                        </div>
                        <div class="info">
                            <h5 class="title" @if(isset($historis['dikemas'])) @else style="opacity: 0.1" @endif>Pesanan Dikemas</h5>
                            <p @if(isset($historis['dikemas'])) @else style="opacity: 0.1" @endif>@if(isset($historis['dikemas'])) {{ $historis['dikemas']['keterangan'] }} @endif</p>
                            <p><small>@if(isset($historis['dikemas'])) {{ $historis['dikemas']['tgl'] }} WIB @endif</small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx @if(isset($historis['dikirim'])) location @endif">
                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" @if(isset($historis['dikirim'])) @else fill-opacity="0.1" @endif>
                                <path d="m19,5h-2.101c-.465-2.279-2.484-4-4.899-4h-7C2.243,1,0,3.243,0,6c0,.552.448,1,1,1s1-.448,1-1c0-1.654,1.346-3,3-3h7c1.654,0,3,1.346,3,3v11H4c-1.103,0-2-.897-2-2v-1c0-.553-.448-1-1-1s-1,.447-1,1v1c0,1.881,1.309,3.452,3.061,3.877-.038.204-.061.412-.061.623,0,1.93,1.57,3.5,3.5,3.5s3.5-1.57,3.5-3.5c0-.169-.017-.335-.041-.5h4.082c-.024.165-.041.331-.041.5,0,1.93,1.57,3.5,3.5,3.5s3.5-1.57,3.5-3.5c0-.211-.023-.419-.061-.623,1.752-.425,3.061-1.996,3.061-3.877v-5c0-2.757-2.243-5-5-5Zm3,5v1h-5v-4h2c1.654,0,3,1.346,3,3Zm-14,9.5c0,.827-.673,1.5-1.5,1.5s-1.5-.673-1.5-1.5c0-.189.039-.355.093-.5h2.815c.054.145.093.311.093.5Zm9.5,1.5c-.827,0-1.5-.673-1.5-1.5,0-.19.039-.356.093-.5h2.814c.054.144.093.31.093.5,0,.827-.673,1.5-1.5,1.5Zm2.5-4h-3v-4h5v2c0,1.103-.897,2-2,2ZM1,9h7.036l-1.768-1.768c-.391-.391-.391-1.024,0-1.414.391-.391,1.023-.391,1.414,0l2.768,2.768c.78.78.78,2.048,0,2.828l-2.768,2.768c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023,0-1.414l1.768-1.768H1c-.552,0-1-.448-1-1s.448-1,1-1Z"/>
                              </svg>
                        </div>
                        <div class="info">
                            <h5 class="title" @if(isset($historis['dikirim'])) @else style="opacity: 0.1" @endif>Dikirim</h5>
                            <p @if(isset($historis['dikirim'])) @else style="opacity: 0.1" @endif>@if(isset($historis['dikirim'])) {{ $historis['dikirim']['keterangan'] }} @endif</p>
                            <p><small>@if(isset($historis['dikirim'])) {{ $historis['dikirim']['tgl'] }} WIB @endif</small></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon-bx @if(isset($historis['selesai'])) location @endif">
                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" @if(isset($historis['selesai'])) @else fill-opacity="0.1" @endif>
                                <path d="M24,9.724V19a5.006,5.006,0,0,1-5,5H18a1,1,0,0,1,0-2h1a3,3,0,0,0,3-3V9.724a3,3,0,0,0-1.322-2.487l-7-4.723a2.979,2.979,0,0,0-3.356,0l-7,4.723A3,3,0,0,0,2,9.724V19a3,3,0,0,0,3,3H6a1,1,0,0,1,0,2H5a5.006,5.006,0,0,1-5-5V9.724A4.993,4.993,0,0,1,2.2,5.579L9.2.855a4.981,4.981,0,0,1,5.594,0l7,4.724A5,5,0,0,1,24,9.724Zm-5,5.283a6.952,6.952,0,0,1-2.05,4.949l-3.515,3.438a2.063,2.063,0,0,1-2.87,0l-3.507-3.43A7,7,0,1,1,19,15.007Zm-2,0a5,5,0,1,0-8.536,3.535l3.5,3.422,3.58-3.43A4.958,4.958,0,0,0,17,15.007ZM15,15a3,3,0,1,1-3-3A3,3,0,0,1,15,15Z"/></svg>
                        </div>
                        <div class="info">
                            <h5 class="title" @if(isset($historis['selesai'])) @else style="opacity: 0.1" @endif>Selesai</h5>
                            <p @if(isset($historis['selesai'])) @else style="opacity: 0.1" @endif>@if(isset($historis['selesai'])) {{ $historis['selesai']['keterangan'] }} @endif</p>
                            <p><small>@if(isset($historis['selesai'])) {{ $historis['selesai']['tgl'] }} WIB @endif</small></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@endsection
