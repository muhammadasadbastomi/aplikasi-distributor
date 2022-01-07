<?php

namespace App\Models;

use App\Models\Rak;
use App\Models\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    protected $guarded = ['id'];
    
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }
}
