<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use LukePOLO\LaraCart\Facades\LaraCart;

use App\Models\Wilayah;
use App\Models\Reseller;
use App\Models\Produk;
use App\Models\ProdukFoto;
use App\Models\SubDistricts;
use App\Models\Faq;
use RajaOngkir;
use DB;

class HomeController extends Controller
{
    private $coupon;

    public function __construct()
    {
        $this->coupon = new \LukePOLO\LaraCart\Coupons\Fixed('FREEONGKIR', '10000', [
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

        $pageTitle = 'Detail Produk '.$produk->nama;
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
        $addr = DB::table("cust_address")
            ->join("ro_city", function($join){
                $join->on("cust_address.idcity", "=", "ro_city.city_id");
            })
            ->join("ro_subdistricts", function($join){
                $join->on("ro_subdistricts.subdistrict_id", "=", "cust_address.idsubdistrict");
            })
            ->select("cust_address.iduser", "cust_address.nama", "cust_address.noWa", "cust_address.alamat", "cust_address.kelurahan", "cust_address.label", "ro_city.province", "ro_city.type", "ro_city.city_name", "ro_city.postal_code", "ro_subdistricts.subdistrict_name")
            ->where("cust_address.label", "=", "rumah")
            ->where("cust_address.iduser", "=", auth('web')->user()->id)
            ->first();

        return view('profile', compact('pageTitle', 'addr'));
    }

    public function cart()
    {
        $pageTitle = 'Cart';

        $sesIdReseller = session('idReseller');
        $sesNamaReseller = session('namaReseller');
        $sesKotaKab = session('kotaKab');
        $sesKecamatan = session('kecamatan');

        $idAlamatCust = session('idAlamatCust');
        if(empty($idAlamatCust)) {
            $addrSend = "";
        }
        else {
            $addrSend = DB::table("cust_address")
                ->join("ro_city", function($join){
                    $join->on("cust_address.idcity", "=", "ro_city.city_id");
                })
                ->join("ro_subdistricts", function($join){
                    $join->on("ro_subdistricts.subdistrict_id", "=", "cust_address.idsubdistrict");
                })
                ->select("cust_address.id", "cust_address.iduser", "cust_address.nama", "cust_address.noWa", "cust_address.alamat", "cust_address.kelurahan", "cust_address.label", "ro_city.province", "ro_city.type", "ro_city.city_name", "ro_city.postal_code", "ro_subdistricts.subdistrict_name")
                ->where("cust_address.id", "=", $idAlamatCust)
                ->first();
        }
        $kupon = (array)$this->coupon;

        return view('cart', compact('pageTitle', 'kupon', 'addrSend', 'sesIdReseller', 'sesNamaReseller', 'sesKotaKab', 'sesKecamatan'));
    }

    public function cartAdd()
    {
        $pageTitle = 'Cart';
        $produk = Produk::where('id', request()->productId)->first();
        $berat = $produk->berat * request()->qty;

        Session::put([
            'beratPaket' => $berat,
        ]);

        LaraCart::add($produk->id, $produk->nama, request()->qty, $produk->harga_promo, [
            'sku' => $produk->sku,
            'hemat' => request()->qty*($produk->harga-$produk->harga_promo),
        ]);

        return redirect('cart');
    }

    public function cartUpdate()
    {
        $pageTitle = 'Cart';
        $produk = Produk::where('id', request()->productId)->first();
        $berat = $produk->berat * request()->qty;

        Session::put([
            'beratPaket' => $berat,
        ]);

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
        return view('cust-add-address', compact('pageTitle', 'province'));
    }

    public function getCities($provinceId)
    {
        $cities = RajaOngkir::find(['province_id' => $provinceId])->city()->get();
        return json_encode($cities);
    }

    public function getSubdistricts($cityId)
    {
        $subdistricts = SubDistricts::where(['city_id' => $cityId])->get();
        return json_encode($subdistricts);
    }

    public function cekOngkir($origin, $destination, $weight){
        $beratPaket = session('beratPaket');

        $params = ['origin' => $origin, 'destination' => $destination, 'weight'=> $beratPaket, 'courier' => 'jne'];

            $get = RajaOngkir::find($params)->costDetails()->get();

            foreach($get as $cost)
            {
                echo "Courier Name: ".$cost->service."<br>";
                echo "Description: ".$cost->description."<br>";
            foreach($cost->cost as $detail)
            {
                echo "Harga: ".$detail->value."<br>";
                echo "Estimasi: ".$detail->etd."<br>";
                echo "Note: ".$detail->note."<br>";
                echo "<hr>";
            }
        }
    }

    public function checkout()
    {
        $pageTitle = 'Checkout';
        $sesIdReseller = session('idReseller');
        $sesNamaReseller = session('namaReseller');
        $sesKotaKab = session('kotaKab');
        $sesKecamatan = session('kecamatan');

        $idAlamatCust = session('idAlamatCust');
        $bankPayment = session('bankPayment');

        $jenisOngkir = session('jenisOngkir');
        $hargaOngkir = session('hargaOngkir');
        $beratPaket = session('beratPaket');

        $kupon = (array)$this->coupon;
        $kodeUnik = rand(10,50);

        if(empty($idAlamatCust)) {
            $addrSend = "";
        }
        else {
            $addrSend = DB::table("cust_address")
                ->join("ro_city", function($join){
                    $join->on("cust_address.idcity", "=", "ro_city.city_id");
                })
                ->join("ro_subdistricts", function($join){
                    $join->on("ro_subdistricts.subdistrict_id", "=", "cust_address.idsubdistrict");
                })
                ->select("cust_address.id", "cust_address.iduser", "cust_address.nama", "cust_address.noWa", "cust_address.alamat", "cust_address.kelurahan", "cust_address.label", "ro_city.province", "ro_city.type", "ro_city.city_name", "ro_city.postal_code", "ro_subdistricts.subdistrict_name", "cust_address.idCity")
                ->where("cust_address.id", "=", $idAlamatCust)
                ->first();
        }

        Session::put([
            'addrSend' => $addrSend,
        ]);

        //cek ongkir
        if(empty($sesIdReseller) OR empty($idAlamatCust)){
            $getOngkir = "";
        }
        else {
            $resel = Reseller::where('id', $sesIdReseller)->first();

            $params = ['origin'=>$resel->ro_city_id,'destination'=>$addrSend->idCity,'weight'=>$beratPaket,'courier' => 'jne'];

            // dd($params);
            $getOngkir = RajaOngkir::find($params)->costDetails()->get();

            Session::put([
                'getOngkir' => $getOngkir,
            ]);
        }
        //cek ongkir
        LaraCart::addFee('ongkir', $hargaOngkir);
        LaraCart::addFee('kodeUnik', -$kodeUnik);

        return view('checkout', compact('pageTitle', 'addrSend', 'bankPayment', 'sesIdReseller', 'sesNamaReseller', 'sesKotaKab', 'sesKecamatan', 'getOngkir', 'jenisOngkir', 'hargaOngkir', 'kupon' ,'kodeUnik'));
    }

    public function payment()
    {
        $pageTitle = 'Pilih Pembayaran';

        return view('payment', compact('pageTitle'));
    }

    public function setPayment() {
        Session::put([
            'bankPayment' => request()->bank,
        ]);

        return redirect('checkout');
    }

    public function ongkir()
    {
        $pageTitle = 'Opsi Pengiriman';
        $getOngkir = session('getOngkir');

        return view('ongkir', compact('pageTitle', 'getOngkir'));
    }

    public function setOngkir() {
        Session::put([
            'jenisOngkir' => request()->jenisOngkir,
            'hargaOngkir' => request()->hargaOngkir,
        ]);

        return redirect('checkout');
    }

    public function faq()
    {
        $pageTitle = 'FAQ';
        $faqs = Faq::where('status', '1')->get();

        return view('faq', compact('pageTitle', 'faqs'));
    }

    public function news()
    {
        $pageTitle = 'Berita Terbaru';

        return view('profile', compact('pageTitle'));
    }
}
