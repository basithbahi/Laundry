<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatTransaksi;
use App\Models\Transaksi;
use App\Models\MetodePembayaran;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $riwayat_transaksi = RiwayatTransaksi::get();

        return view('riwayat_transaksi.index', ['data' => $riwayat_transaksi]);
    }
    public function simpan(Request $request)
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

    public function bayar($id)
    {
        $riwayat_transaksi = RiwayatTransaksi::find($id);
        $metode_pembayaran = MetodePembayaran::find($id);

        return view('riwayat_transaksi.bayar', ['riwayat_transaksi' => $riwayat_transaksi, 'metode_pembayaran' => $metode_pembayaran]);
    }

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

    public function hapus($id)
    {
        RiwayatTransaksi::find($id)->delete();

        return redirect()->route('riwayat_transaksi');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $data = RiwayatTransaksi::with('transaksi', 'user', 'jenis_cucian', 'tipe_laundry', 'jenis_pencuci')
                ->where('id_riwayat_transaksi', 'like', "%$query%")
                ->orWhere('id_transaksi', 'like', "%$query%")
                ->orderBy('id_riwayat_transaksi', 'asc')
                ->paginate(10);
        } else {
            $data = RiwayatTransaksi::with('transaksi', 'metode_pembayaran')->get();
        }

        return view('riwayat_transaksi.index', ['data' => $data, 'query' => $query]);
    }
}
