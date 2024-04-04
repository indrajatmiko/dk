<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'cust_address';

    protected $fillable = [
        'idUser',
        'nama',
        'noWa',
        'alamat',
        'idProvince',
        'idCity',
        'idSubdistrict',
        'kelurahan',
        'label',
    ];

    /**
     * Get the user that owns the CustAddress
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'idProvince');
    }
}
