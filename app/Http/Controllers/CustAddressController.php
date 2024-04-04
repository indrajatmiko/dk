<?php

namespace App\Http\Controllers;
use App\Models\CustAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CustAddressController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $companies = CustAddress::orderBy('id','desc')->paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('companies.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idUser' => 'required',
            'nama' => 'required|string|max:75',
            'noWa' => 'required',
            'alamat' => 'required|string|max:255',
            'idProvince' => 'required',
            'idCity' => 'required',
            'idSubdistrict' => 'required',
            'kelurahan' => 'required|string|max:50',
            'label' => 'required',
            ]);

        CustAddress::create($request->post());

        return redirect()->route('home.cart')->with('success','Company has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }

    public function selectAddress()
    {
        $pageTitle = 'Alamat Pengiriman';
        $address = DB::table("cust_address")
            ->join("ro_city", function($join){
                $join->on("cust_address.idcity", "=", "ro_city.city_id");
            })
            ->join("ro_subdistricts", function($join){
                $join->on("ro_subdistricts.subdistrict_id", "=", "cust_address.idsubdistrict");
            })
            ->select("cust_address.id", "cust_address.iduser", "cust_address.nama", "cust_address.nowa", "cust_address.alamat", "cust_address.kelurahan", "cust_address.label", "ro_city.province", "ro_city.type", "ro_city.city_name", "ro_city.postal_code", "ro_subdistricts.subdistrict_name")
            ->where("cust_address.iduser", "=", auth('web')->user()->id)
            ->get();

        return view('cust-select-address', compact('pageTitle', 'address'));
    }

    public function setAddress() {
        Session::put([
            'idAlamatCust' => request()->idAlamatCust,
        ]);

        return redirect('cart');
    }

}
