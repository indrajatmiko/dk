<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistricts extends Model
{
    use HasFactory;
    protected $table = 'ro_subdistricts';

    protected $fillable = [
        'city_id',
        'subdistrict_name',
    ];

    public function city()
    {
        return $this->hasOne(City::class);
    }
}
