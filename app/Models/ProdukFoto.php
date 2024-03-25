<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProdukFoto
 * @package App\Models
 * @version March 24, 2024, 2:45 am UTC
 *
 * @property integer $id_sku
 * @property string $foto_1
 * @property string $foto_2
 * @property string $foto_3
 * @property string $foto_4
 */
class ProdukFoto extends Model
{
    use SoftDeletes;


    public $table = 'produk_fotos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_sku',
        'foto_1',
        'foto_2',
        'foto_3',
        'foto_4'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_sku' => 'integer',
        'foto_1' => 'string',
        'foto_2' => 'string',
        'foto_3' => 'string',
        'foto_4' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_sku' => 'required',
        'foto_1' => 'required|mimes:webp,jpg,png',
    ];


}
