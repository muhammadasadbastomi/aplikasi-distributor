<?php

namespace App\Models;

use App\Models\Pengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    protected $guarded = ['id'];

    public function penjualan_detail()
    {
        return $this->hasMany(PenjualanDetail::class);
    }

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }
}
