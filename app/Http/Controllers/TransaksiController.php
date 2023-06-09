<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\JenisCucian;
use App\Models\TipeLaundry;
use App\Models\JenisPencuci;
use App\Models\MetodePembayaran;
use App\Models\RiwayatTransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



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
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.form', [
            'user' => $user,
            'jenis_cucian' => $jenis_cucian,
            'tipe_laundry' => $tipe_laundry,
            'jenis_pencuci' => $jenis_pencuci,
            'metode_pembayaran' => $metode_pembayaran
        ]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_user' => $request->id_user,
            'id_jenis_cucian' => $request->id_jenis_cucian,
            'id_tipe_laundry' => $request->id_tipe_laundry,
            'id_jenis_pencuci' => $request->id_jenis_pencuci,
            'berat_cucian' => $request->berat_cucian,
        ];

        Transaksi::create($data);

        return redirect()->route('transaksi');
    }

    // Metode lainnya...

    public function bayar($id)
    {
        $transaksi = Transaksi::find($id);
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.bayar', [
            'transaksi' => $transaksi,
            'metode_pembayaran' => $metode_pembayaran
        ]);
    }

    // Metode lainnya...

    public function upload(Request $request)
    {
        $data = [
            'id_riwayat_transaksi' => $request->id_riwayat_transaksi,
            'id_transaksi' => $request->id_transaksi,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_bayar' => $request->total_bayar,
        ];

        RiwayatTransaksi::create($data);

        return redirect()->route('riwayat_transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::get();
        $jenis_cucian = JenisCucian::get();
        $tipe_laundry = TipeLaundry::get();
        $jenis_pencuci = JenisPencuci::get();


        return view('transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'jenis_cucian' => $jenis_cucian, 'tipe_laundry' => $tipe_laundry, 'jenis_pencuci' => $jenis_pencuci]);
    }
    
    public function update($id, Request $request)
    {
        $transaksi = Transaksi::find($id);
    
        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_user' => $request->id_user,
            'id_jenis_cucian' => $request->id_jenis_cucian,
            'id_tipe_laundry' => $request->id_tipe_laundry,
            'id_jenis_pencuci' => $request->id_jenis_pencuci,
            'berat_cucian' => $request->berat_cucian,
        ];
        $transaksi->update($data);
        return redirect()->route('transaksi');
    }

    public function hapus($id)
    {
        Transaksi::find($id)->delete();

        return redirect()->route('transaksi');
    }
    // Metode lainnya...

    public function cetak(Request $request)
    {
        $transaksi =  Transaksi::all();
        $pdf = PDF::loadview('transaksi.cetak', ['transaksi' => $transaksi]);
        return $pdf->stream();
    }
}
