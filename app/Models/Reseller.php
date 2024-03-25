<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;
    protected $table = 'reseller';

    protected $fillable = [
        'nama',
        'noHp',
        'email',
        'idWilayah',
        'idPropinsi',
        'kotaKab',
        'kecamatan',
        'kelurahan',
        'alamat',
        'instagram',
        'shopee',
    ];
}
