<?php

namespace App\Models;

use App\Models\PembelianDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    protected $guarded = ['id'];

    public function pembelian_detail()
    {
        return $this->hasMany(PembelianDetail::class);
    }
}
