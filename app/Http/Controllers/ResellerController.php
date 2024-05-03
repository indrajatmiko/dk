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
use RajaOngkir;
use DB;

class ResellerController extends Controller
{

    public function index() {
        $pageTitle = 'Join Reseller Kauniyah';
        $province = RajaOngkir::province()->get();

        return view('join-reseller', compact('pageTitle', 'province'));
    }

    public function paymentOrder($idPesanan) {
        $pageTitle = 'Pembayaran Pesanan';
        $pesanans = Pesanan::where(['id_user' => auth('web')->user()->id, 'noPesanan' => $idPesanan])->orderBy('id', 'DESC')->get();

        return view('paymentOrder', compact('pageTitle', 'pesanans'));
    }
}
