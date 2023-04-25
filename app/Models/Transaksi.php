<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = ['id_transaksi', 'id_user', 'id_jenis_cucian', 'id_tipe_laundry', 'id_jenis_pencuci', 'berat_cucian'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jenis_cucian()
    {
        return $this->belongsTo(JenisCucian::class, 'id_jenis_cucian');
    }

    public function jenis_pencuci()
    {
        return $this->belongsTo(JenisPencuci::class, 'id_jenis_pencuci');
    }

    public function tipe_laundry()
    {
        return $this->belongsTo(TipeLaundry::class, 'id_tipe_laundry');
    }
}
