<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeLaundry extends Model
{
    use HasFactory;

    protected $table = 'tipe_laundry';

    protected $fillable = ['id_tipe_laundry', 'tipe_laundry', 'harga'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_tipe_laundry');
    }
}
