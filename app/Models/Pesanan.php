<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Pesanan
 * @package App\Models
 * @version March 30, 2024, 10:30 am UTC
 *
 * @property string $noPesanan
 * @property string $marketplace
 * @property string $status
 * @property string $waktu_dibayar
 * @property string $nama_pembeli
 * @property string $nama_penerima
 * @property string $alamat
 * @property string $kecamatan
 * @property string $kotakab
 * @property string $provinsi
 * @property string $sku
 * @property string $variasi
 * @property integer $harga
 * @property integer $jumlah
 * @property integer $subtotal
 * @property string $jasa_kirim
 * @property integer $biaya_pengelolaan
 * @property integer $voucher
 * @property integer $diskon
 * @property string $waktu_cetak
 * @property string $no_hp
 * @property integer $ongkir
 * @property string $origin
 * @property string $destination
 * @property string $metodeTransfer
 * @property string $catatan
 * @property integer $kodeunik
 * @property integer $hemat
 */
class Pesanan extends Model
{
    use SoftDeletes;


    public $table = 'pesanans';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'noPesanan',
        'marketplace',
        'status',
        'waktu_dibayar',
        'nama_pembeli',
        'nama_penerima',
        'alamat',
        'kecamatan',
        'kotakab',
        'provinsi',
        'sku',
        'variasi',
        'harga',
        'jumlah',
        'subtotal',
        'jasa_kirim',
        'biaya_pengelolaan',
        'voucher',
        'diskon',
        'waktu_cetak',
        'no_hp',
        'ongkir',
        'origin',
        'destination',
        'metodeTransfer',
        'catatan',
        'kodeunik',
        'hemat',
        'nama_produk',
        'no_resi',
        'id_user',
        'idReseller',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'noPesanan' => 'string',
        'marketplace' => 'string',
        'status' => 'string',
        'waktu_dibayar' => 'datetime',
        'nama_pembeli' => 'string',
        'nama_penerima' => 'string',
        'alamat' => 'string',
        'kecamatan' => 'string',
        'kotakab' => 'string',
        'provinsi' => 'string',
        'sku' => 'string',
        'variasi' => 'string',
        'harga' => 'integer',
        'jumlah' => 'integer',
        'subtotal' => 'integer',
        'jasa_kirim' => 'string',
        'biaya_pengelolaan' => 'integer',
        'voucher' => 'integer',
        'diskon' => 'integer',
        'waktu_cetak' => 'date',
        'no_hp' => 'string',
        'ongkir' => 'integer',
        'origin' => 'string',
        'destination' => 'string',
        'metodeTransfer' => 'string',
        'catatan' => 'string',
        'kodeunik' => 'integer',
        'hemat' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
