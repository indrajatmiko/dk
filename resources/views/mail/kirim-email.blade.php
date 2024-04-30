<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <p>Hai {{ $data[0]['nama_penerima'] ?? '-'}}, terimakasih sudah melakukan pemesanan di DK - Distributor Kauniyah.</p>
        <p><strong>Pesanan</strong></p>
        <table bgcolor="#ffffff" cellpadding="2" cellspacing="0" border="0">
            <tr>
                <td>Status Pesanan</td>
                <td>: UNPAID / BELUM DIBAYAR</td>
            </tr>
            <tr>
                <td>No Pesanan</td>
                <td>: {{ $data[0]['noPesanan'] ?? '-'}}</td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>: {{ $data[0]['created_at'] ?? '-'}}</td>
            </tr>
            <tr>
                <td>Espedisi</td>
                <td>: {{ $data[0]['jasa_kirim'] ?? '-'}}</td>
            </tr>
                <td>Ongkir</td>
                <td>: Rp. {{ $data[0]['ongkir'] ?? '-'}}</td>
            </tr>
        </table>
        <p><strong>Rincian Produk</strong></p>
        @php
            $subtotal = 0;
            $total = 0;
            $ongkir = $data[0]['ongkir'] ?? 0;
            $voucher = $data[0]['voucher'] ?? 0;
            $kodeunik = $data[0]['kodeunik'] ?? 0;
        @endphp
        <table bgcolor="#ffffff" cellpadding="2" cellspacing="0" border="0">
            @foreach($data as $dt)
                <tr>
                    <td>{{ $dt['nama_produk'] ?? '-'}}</td>
                    <td>{{ $dt['jumlah'] ?? '-'}} x {{ $dt['harga'] ?? '-'}}</td>
                </tr>
                @php
                    $subtotal += $dt['subtotal'];
                @endphp
            @endforeach
            <tr>
                <td>Subtotal</td>
                <td>Rp. {{ $subtotal ?? '0'}}</td>
            </tr>
        </table>
        <p><strong>Rincian Pembayaran</strong></p>
        @php $total = $subtotal+$ongkir-$voucher-$kodeunik; @endphp
        <table bgcolor="#ffffff" cellpadding="2" cellspacing="0" border="0">
            <tr>
                <td>Total Transfer</td>
                <td>: Rp. {{ number_format($total, 0, ".", ".") ?? '0'}}</td>
            </tr>
            <tr>
                <td>BCA</td>
                <td>: 4740 4325 46 an. Indah Nuraeni</td>
            </tr>
            <tr>
                <td>MANDIRI</td>
                <td>: 1640 0013 37007 an. Indah Nuraeni</td>
            </tr>
        </table>

        <p>Silakan Transfer sejumlah <strong>Rp. {{number_format($total, 0, ".", ".")}} via {{ $data[0]['metodeTransfer'] ?? '-'}}</strong>, proses pengecekan maksimal 30 menit.</p>
        <p><i>Hati-hati penipuan, DK hanya mempunyai 1 pemilik rekening an Indah Nuraeni.</i></p>
        <img src="{{ $message->embed('https://distributorkauniyah.com/my/public/themes/dexignzone/ombe/img/app-logo/logo-distributor-kauniyah-panjang.png') }}" alt="Logo">
        <hr>
        <center><small>Ini adalah email otomatis. Mohon untuk tidak membalas email ini.<br/>Tambahkan info@distributorkauniyah.com pada daftar kontak untuk memastikan email dari DK masuk ke inbox-mu.</small></center>
    </div>
</body>
</html>
