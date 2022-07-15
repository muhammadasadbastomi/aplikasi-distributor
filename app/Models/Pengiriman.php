<?php

namespace App\Models;

use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengiriman extends Model
{
    protected $guarded = ['id'];
    /**
     * Get the penjualan that owns the Pengiriman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
