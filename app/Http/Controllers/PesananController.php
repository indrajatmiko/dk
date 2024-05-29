<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use LukePOLO\LaraCart\Facades\LaraCart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimEmail;

use App\Models\Wilayah;
use App\Models\Reseller;
use App\Models\Produk;
use App\Models\ProdukFoto;
use App\Models\SubDistricts;
use App\Models\Pesanan;
use App\Models\PesananHistoris;
use RajaOngkir;
use DB;

class PesananController extends Controller
{

    public function store(Request $request) {
        $user_name = auth('web')->user()->name;
        $user_email = auth('web')->user()->email;

        $sesIdReseller = session('idReseller');
        $sesNamaReseller = session('namaReseller');
        $sesKotaKab = session('kotaKab');
        $sesKecamatan = session('kecamatan');

        $idAlamatCust = session('idAlamatCust');
        $bankPayment = session('bankPayment');

        $jenisOngkir = session('jenisOngkir');
        $hargaOngkir = session('hargaOngkir');
        $beratPaket = session('beratPaket');
        $addrSend = session('addrSend');

        $input = $request->all();
        $noPesanan = date('ymd').Str::upper(Str::random(8));

        // $hemat = 0;
        // $totalQty = 0;
        // $voucher = $kupon['value'];
        // $berat = 0;

        foreach($items = LaraCart::getItems() as $item) {
            // $produk = Produk::where('id', $item->id)->first();
            // $hemat += $item->hemat;
            // $totalQty += $item->qty;
            // $berat += $produk->berat * $item->qty;
            $subTotal = $item->qty * $item->price;

            $pesanan = Pesanan::create([
                'noPesanan' => $noPesanan,
                'marketplace' => 'DK',
                'status' => 'unpaid',
                'waktu_dibayar' => '2000-01-01',
                'nama_pembeli' => $addrSend->nama,
                'nama_penerima' => $addrSend->nama,
                'alamat' => $addrSend->alamat .' Kel. '. $addrSend->kelurahan,
                'kecamatan' => $addrSend->subdistrict_name,
                'kotakab' => $addrSend->type .' '. $addrSend->city_name,
                'provinsi' => $addrSend->province,
                'sku' => $item->sku,
                'variasi' => '',
                'harga' => $item->price,
                'jumlah' => $item->qty,
                'subtotal' => $subTotal,
                'jasa_kirim' => $jenisOngkir,
                'biaya_pengelolaan' => '0',
                'voucher' => LaraCart::discountTotal(false),
                'diskon' => '0',
                'waktu_cetak' => '2000-01-01',
                'nama_produk' => $item->name,
                'no_hp' => $addrSend->noWa,
                'id_user' => auth('web')->user()->id,
                'ongkir' => $hargaOngkir,
                'origin' => $sesKotaKab,
                'destination' => $addrSend->city_name,
                'no_resi' => '',
                'metodeTransfer' => $bankPayment,
                'catatan' => $request->note,
                'kodeunik' => $request->kodeUnik,
                'hemat' => $request->hemat,
                'idReseller' => $request->idReseller,
            ]);
            $data[] = [
                'noPesanan' => $noPesanan,
                'marketplace' => 'DK',
                'status' => 'unpaid',
                'waktu_dibayar' => '2000-01-01',
                'nama_pembeli' => $addrSend->nama,
                'nama_penerima' => $addrSend->nama,
                'alamat' => $addrSend->alamat .' Kel. '. $addrSend->kelurahan,
                'kecamatan' => $addrSend->subdistrict_name,
                'kotakab' => $addrSend->type .' '. $addrSend->city_name,
                'provinsi' => $addrSend->province,
                'sku' => $item->sku,
                'variasi' => '',
                'harga' => $item->price,
                'jumlah' => $item->qty,
                'subtotal' => $subTotal,
                'jasa_kirim' => $jenisOngkir,
                'biaya_pengelolaan' => '0',
                'voucher' => LaraCart::discountTotal(false),
                'diskon' => '0',
                'waktu_cetak' => '2000-01-01',
                'nama_produk' => $item->name,
                'no_hp' => $addrSend->noWa,
                'id_user' => auth('web')->user()->id,
                'ongkir' => $hargaOngkir,
                'origin' => $sesKotaKab,
                'destination' => $addrSend->city_name,
                'no_resi' => '',
                'metodeTransfer' => $bankPayment,
                'catatan' => $request->note,
                'kodeunik' => $request->kodeUnik,
                'hemat' => $request->hemat,
                'idReseller' => $request->idReseller,
                'created_at' => date('d M Y H:i:s').' WIB',
            ];
        }
        $judul = 'Pesanan Baru! #'.$noPesanan;

        // dd($data);
        PesananHistoris::create([
            'noPesanan' => $noPesanan,
            'status' => 'unpaid'
        ]);

        Mail::to($user_email)->send(new KirimEmail($judul, $data));


        LaraCart::destroyCart();
        $request->session()->forget(['bankPayment', 'jenisOngkir', 'hargaOngkir', 'beratPaket', 'idAlamatCust']);

        return redirect('home');

    }

    public function myOrder() {
        $pageTitle = 'Pesanan Saya';

        $tmp_pesanans = Pesanan::where(['id_user' => auth('web')->user()->id])->orderBy('id', 'DESC')->get();
        $pesanans = array();
        foreach($tmp_pesanans as $key => $psn){
            $pesanans[$psn->status][$psn->noPesanan]['penerima'] = array(
                'noPesanan' => $psn->noPesanan,
                'nama_penerima' => $psn->nama_penerima,
                'no_hp' => $psn->no_hp,
                'alamat' => $psn->alamat,
                'kecamatan' => $psn->kecamatan,
                'kotakab' => $psn->kotakab,
                'jasa_kirim' => $psn->jasa_kirim,
                'ongkir' => $psn->ongkir,
                'origin' => $psn->origin,
                'destination' => $psn->destination,
                'no_resi' => $psn->no_resi,
                'voucher' => $psn->voucher,
                'metode_transfer' => $psn->metodeTransfer,
                'catatan' => $psn->catatan,
                'kodeunik' => $psn->kodeunik,
                'hemat' => $psn->hemat,
                'idReseller' => $psn->idReseller,
                'waktu_dibayar' => $psn->waktu_dibayar,
                'created_at' => $psn->created_at,
            );
            $pesanans[$psn->status][$psn->noPesanan]['produk'][] = array(
                'sku' => $psn->sku,
                'nama' => $psn->nama_produk,
                'harga' => $psn->harga,
                'jumlah' => $psn->jumlah,
                'subtotal' => $psn->subtotal,
            );
        }

        // dd($pesanans);

        return view('my-order', compact('pageTitle', 'pesanans'));

    }

    public function tesEmail(){
        $user_name = auth('web')->user()->name;
        $user_email = auth('web')->user()->email;
        $judul = 'Pesanan Baru! No. 41516828';
        $data = [
            'pesanan' => 'A1234',
            'total' => 'Rp. 10.000',
            'Pengiriman' => 'JNT',
        ];

        Mail::to($user_email)->send(new KirimEmail($judul, $data));
    }

    public function tesTemplate() {
        $pageTitle = 'Template Email';
        $data = [
            'nama_lengkap' => 'Indra',
            'no_wa' => '0898989',
        ];
        return view('mail.kirim-email-calon-reseller', compact('pageTitle', 'data'));
    }

    public function paymentOrder($idPesanan) {
        $pageTitle = 'Detail Pesanan';
        $pesanans = Pesanan::where(['id_user' => auth('web')->user()->id, 'noPesanan' => $idPesanan])->orderBy('id', 'DESC')->get();
        $tmp_historis = PesananHistoris::where(['noPesanan' => $idPesanan])->get();
        foreach($tmp_historis as $his){
            $historis[$his->status] = array(
                'keterangan' => $his->keterangan,
                'tgl' => $his->created_at,
            );
        }

        if($pesanans->isEmpty())
            return redirect('404');
        else
            return view('paymentOrder', compact('pageTitle', 'pesanans', 'historis'));
    }

    public function paymentNow(Request $request) {
        $idPesanan = $request->post('idPesanan');

        PesananHistoris::create([
            'noPesanan' => $idPesanan,
            'status' => 'paid'
        ]);
        Pesanan::where('noPesanan', $idPesanan)->update(['waktu_dibayar' => date('Y-m-d H:i:s')]);

        return redirect("/paymentOrder/$idPesanan");
    }
}
