<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananHistoris extends Model
{
    use HasFactory;
    public $table = 'pesanan_historis';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'noPesanan',
        'status',
        'keterangan',
    ];

}
