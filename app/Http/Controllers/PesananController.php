<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use LukePOLO\LaraCart\Facades\LaraCart;
use Illuminate\Support\Str;

use App\Models\Wilayah;
use App\Models\Reseller;
use App\Models\Produk;
use App\Models\ProdukFoto;
use App\Models\SubDistricts;
use App\Models\Pesanan;
use RajaOngkir;
use DB;

class PesananController extends Controller
{

    public function store(Request $request) {
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
        $noPesanan = date('ymd').Str::upper(Str::random(9));

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
                'no_hp' => $addrSend->nowa,
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
        }
        LaraCart::destroyCart();
        $request->session()->forget(['bankPayment', 'jenisOngkir', 'hargaOngkir', 'beratPaket', 'idAlamatCust']);

        return redirect('home');

    }

    public function myOrder() {
        $pageTitle = 'Pesanan Saya';

        $tmp_pesanans = Pesanan::where(['id_user' => auth('web')->user()->id])->get();
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
}