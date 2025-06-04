<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'jenis', 'keterangan', 'jumlah', 'tanggal', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}