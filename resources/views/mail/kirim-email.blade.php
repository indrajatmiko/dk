<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <p>Hai {{ $data['nama_penerima'] ?? '-'}},</p>
        <p>RINCIAN PESANAN</p>
        <table bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>No Pesanan</td>
                <td>: {{ $data['noPesanan'] ?? '-'}}</td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>: {{ $data['created_at'] ?? '-'}}</td>
            </tr>
            <tr>
                <td>Metode Trasfer</td>
                <td>: {{ $data['metode_transfer'] ?? '-'}}</td>
            </tr>
            <tr>
                <td>Espedisi</td>
                <td>: {{ $data['jasa_kirim'] ?? '-'}}</td>
            </tr>
        </table>


        <p>Can your Laravel app send emails yet? 😉</p>
        {{-- <img src="{{ $message->embed(asset('assets/images/logo-distributor-kauniyah-panjang.png')) }}" alt="Logo"> --}}
    </div>
</body>
</html>
