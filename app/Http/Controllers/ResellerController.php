<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use LukePOLO\LaraCart\Facades\LaraCart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimEmailCalonReseller;

use App\Models\Wilayah;
use App\Models\Reseller;
use App\Models\SubDistricts;
use App\Models\CalonReseller;
use RajaOngkir;
use DB;

class ResellerController extends Controller
{

    public function index() {
        $pageTitle = 'Join Reseller Kauniyah';
        $province = RajaOngkir::province()->get();

        return view('join-reseller', compact('pageTitle', 'province'));
    }

    public function step2() {
        $pageTitle = 'Selamat Bergabung Calon Reseller';
        $province = RajaOngkir::province()->get();

        return view('join-reseller-step2', compact('pageTitle', 'province'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'no_wa' => 'required',
            'email' => 'required',
            'idProvince' => 'required',
            'idCity' => 'required',
            'idSubdistrict' => 'required',
            'kelurahan' => 'required',
            ]);

        CalonReseller::create($request->post());
        $data = [
            'nama_lengkap' => $request->post('nama_lengkap'),
            'no_wa' => $request->post('no_wa'),
            'email' => $request->post('email'),
            'idProvince' => $request->post('idProvince'),
            'idCity' => $request->post('idCity'),
            'idSubdistrict' => $request->post('idSubdistrict'),
            'kelurahan' => $request->post('kelurahan'),
        ];

        $judul = 'Pendaftaran Reseller! an.'.$request->post('nama_lengkap');
        Mail::to($user_email)->send(new KirimEmailCalonReseller($judul, $data));

        return redirect()->route('reseller.step2')->with('success','has been created successfully.');
    }
}
