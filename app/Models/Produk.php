<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Produk
 * @package App\Models
 * @version March 24, 2024, 2:20 am UTC
 *
 * @property string $sku
 * @property string $nama
 * @property string $deskripsi
 * @property integer $harga
 * @property integer $harga_promo
 * @property number $rating
 * @property integer $berat
 * @property integer $kategori
 */
class Produk extends Model
{
    use SoftDeletes;


    public $table = 'produks';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sku',
        'nama',
        'deskripsi',
        'harga',
        'harga_promo',
        'rating',
        'berat',
        'kategori'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sku' => 'string',
        'nama' => 'string',
        'deskripsi' => 'string',
        'harga' => 'integer',
        'harga_promo' => 'integer',
        'rating' => 'decimal:2',
        'berat' => 'integer',
        'kategori' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sku' => 'required',
        'nama' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'harga_promo' => 'required',
        'rating' => 'required',
        'berat' => 'required',
        'kategori' => 'required',
    ];


}
