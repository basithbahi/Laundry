<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCucian extends Model
{
    use HasFactory;

    protected $table = 'jenis_cucian';

    protected $fillable = ['id_jenis_cucian', 'jenis_cucian', 'harga'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_jenis_cucian');
    }
}
