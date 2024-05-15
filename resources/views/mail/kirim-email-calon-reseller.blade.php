<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <p>Hai {{ $data['nama_lengkap'] ?? '-'}}, terimakasih sudah melakukan Pendaftaran Calon Reseller di DK - Distributor Kauniyah.</p>

        <p>Kami akan segera menghubungi Anda via WA ke nomor <strong>{{ $data['no_wa'] ?? '-'}}</strong>, mohon bersabar.</p>
        <img src="{{ $message->embed('https://distributorkauniyah.com/my/public/themes/dexignzone/ombe/img/app-logo/logo-distributor-kauniyah-panjang.png') }}" alt="Logo">
        <hr>
        <center><small>Ini adalah email otomatis. Mohon untuk tidak membalas email ini.<br/>Tambahkan info@distributorkauniyah.com pada daftar kontak untuk memastikan email dari DK masuk ke inbox-mu.</small></center>
    </div>
</body>
</html>
