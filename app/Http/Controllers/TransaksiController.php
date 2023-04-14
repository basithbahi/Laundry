<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\JenisCucian;
use App\Models\TipeLaundry;
use App\Models\JenisPencuci;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::get();

        return view('transaksi.index', ['data' => $transaksi]);
    }

    public function tambah()
    {
        $user = User::get();
        $jenis_cucian = JenisCucian::get();
        $tipe_laundry = TipeLaundry::get();
        $jenis_pencuci = JenisPencuci::get();

        return view('transaksi.form', ['user' => $user, 'jenis_cucian' 
        => $jenis_cucian, 'tipe_laundry' => $tipe_laundry, 'jenis_pencuci' => $jenis_pencuci]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_user' => $request->id_user,
            'id_jenis_cucian' => $request->id_jenis_cucian,
            'id_tipe_laundry' => $request->id_jenis_cucian,
            'id_jenis_pencuci' => $request->id_jenis_cucian,
            'berat_cucian' => $request->id_jenis_cucian,
        ];

        Transaksi::create($data);

        return redirect()->route('transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::get();
        $jenis_cucian = JenisCucian::get();
        $tipe_laundry = TipeLaundry::get();
        $jenis_pencuci = JenisPencuci::get();

        return view('transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'jenis_cucian' 
        => $jenis_cucian, 'tipe_laundry' => $tipe_laundry, 'jenis_pencuci' => $jenis_pencuci]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_user' => $request->id_user,
            'id_jenis_cucian' => $request->id_jenis_cucian,
            'id_tipe_laundry' => $request->id_jenis_cucian,
            'id_jenis_pencuci' => $request->id_jenis_cucian,
            'berat_cucian' => $request->id_jenis_cucian,
        ];

        Transaksi::find($id)->update($data);

        return redirect()->route('transaksi');
    }

    public function hapus($id)
    {
        Transaksi::find($id)->delete();

        return redirect()->route('transaksi');
    }
}
