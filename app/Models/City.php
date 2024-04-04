<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistricts extends Model
{
    use HasFactory;
    protected $table = 'ro_city';

    protected $fillable = [
        'province_id',
        'province',
        'type',
        'city_name',
        'postal_code',
    ];

    public function province()
    {
        return $this->hasOne(Province::class);
    }
}
