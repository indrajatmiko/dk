<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use LukePOLO\LaraCart\Facades\LaraCart;

use App\Models\Wilayah;
use App\Models\Reseller;
use App\Models\Produk;
use App\Models\ProdukFoto;
use RajaOngkir;

class HomeController extends Controller
{
    private $coupon;

    public function __construct()
    {
        $this->coupon = new \LukePOLO\LaraCart\Coupons\Fixed('SUBSIDIONGKIR', '10000', [
            'description' => 'Maks. Rp. 10.000'
        ]);

    }

    public function index()
    {
        $sesIdReseller = session('idReseller');
        $sesNamaReseller = session('namaReseller');
        $sesKotaKab = session('kotaKab');
        $sesKecamatan = session('kecamatan');

        $wilayahReseller = array();
        $wilayahs = Wilayah::orderBy('id')->get();
        foreach ($wilayahs as $key => $value) {
            $resellers = Reseller::where('idWilayah', $value->id)->get();

            if(empty($resellers)){
                $wilayahReseller[$key][] = '';
            }
            else {
                foreach($resellers as $resel){
                    $wilayahReseller[$key][] = $resel->nama;
                }
            }
        }

        $produks = Produk::orderBy('id')->get();

        return view('home', compact('wilayahs', 'wilayahReseller', 'sesIdReseller', 'sesNamaReseller', 'sesKotaKab', 'sesKecamatan', 'produks'));
    }

    public function produk($idProduk)
    {
        $produk = Produk::where('id', $idProduk)->first();
        $fotos = ProdukFoto::where('id_sku', $idProduk)->get();

        $pageTitle = 'Detail';
        return view('product', compact('pageTitle', 'produk', 'fotos'));
    }

    public function reseller($idWilayah)
    {
        $wilayah = Wilayah::where('id', $idWilayah)->first();
        $resellers = Reseller::where('idWilayah', $idWilayah)->orderBy('idPropinsi')->orderBy('kotaKab')->orderBy('kecamatan')->get();

        $pageTitle = 'Reseller Wilayah '. $wilayah->nama;
        return view('reseller', compact('pageTitle', 'idWilayah', 'resellers'));
    }

    public function resellerSet($idReseller){
        $reseller = Reseller::where('id', $idReseller)->first();

        Session::put([
            'idReseller' => $idReseller,
            'namaReseller' => $reseller->nama,
            'kotaKab' => $reseller->kotaKab,
            'kecamatan' => $reseller->kecamatan
        ]);

        return redirect()->route('home.index');
    }

    public function profile()
    {
        $pageTitle = 'Profil';

        return view('profile', compact('pageTitle'));
    }

    public function cart()
    {
        $pageTitle = 'Cart';

        $kupon = (array)$this->coupon;

        return view('cart', compact('pageTitle', 'kupon'));
    }

    public function cartAdd()
    {
        $pageTitle = 'Cart';
        $produk = Produk::where('id', request()->productId)->first();

        LaraCart::add($produk->id, $produk->nama, request()->qty, $produk->harga_promo, [
            'hemat' => request()->qty*($produk->harga-$produk->harga_promo),
        ]);

        return redirect('cart');
    }

    public function cartUpdate()
    {
        $pageTitle = 'Cart';
        $produk = Produk::where('id', request()->productId)->first();

        LaraCart::updateItem(request()->itemHash, 'qty', request()->qty);
        LaraCart::updateItem(request()->itemHash, 'hemat', request()->qty*($produk->harga-$produk->harga_promo));

        return redirect('cart');
    }

    public function cartRemove($hashItem)
    {
        $pageTitle = 'Cart';
        LaraCart::removeItem($hashItem);

        return redirect('cart');
        // return view('cart', compact('pageTitle'));
    }

    public function cartCoupon()
    {
        $pageTitle = 'Cart';
        LaraCart::addCoupon($this->coupon);

        return redirect('cart');
    }


    public function addAddress()
    {
        $pageTitle = 'Alamat Pengiriman';
        $province = RajaOngkir::province()->get();
        return view('add-address', compact('pageTitle', 'province'));
    }

    public function news()
    {
        $pageTitle = 'Berita Terbaru';

        return view('profile', compact('pageTitle'));
    }
}
