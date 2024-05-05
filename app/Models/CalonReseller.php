<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonReseller extends Model
{
    use HasFactory;
    protected $table = 'calon_resellers';

    protected $fillable = [
        'nama_lengkap',
        'no_wa',
        'email',
        'idProvince',
        'idCity',
        'idSubdistrict',
        'kelurahan',
        'status',
    ];
}
