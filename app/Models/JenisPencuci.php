<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPencuci extends Model
{
    use HasFactory;

    protected $table = 'jenis_pencuci';

    protected $fillable = ['id_jenis_pencuci', 'jenis_pencuci', 'harga'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_jenis_pencuci');
    }
}

