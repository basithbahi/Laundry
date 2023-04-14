<?php

namespace App\Http\Controllers;

use App\Models\TipeLaundry;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;
use Illuminate\Http\Request;

class TipeLaundryController extends Controller
{
    public function index()
    {
        $tipe_laundry = TipeLaundry::get();

        return view('tipe_laundry/index', ['tipe_laundry' => $tipe_laundry]);
    }

    public function tambah()
    {
        return view('tipe_laundry.form');
    }

    public function simpan(Request $request)
    {
        TipeLaundry::create([
            'id_tipe_laundry' => $request->id_tipe_laundry,
            'tipe_laundry' => $request->tipe_laundry,
            'harga' => $request->harga,
        ]);

        return redirect()->route('tipe_laundry');
    }

    public function edit($id)
    {
        $tipe_laundry = TipeLaundry::find($id);

        return view('tipe_laundry.form', ['tipe_laundry' => $tipe_laundry]);
    }

    public function update($id, Request $request)
    {
        TipeLaundry::find($id)->update([
            'id_tipe_laundry' => $request->id_tipe_laundry,
            'tipe_laundry' => $request->tipe_laundry,
            'harga' => $request->harga,
        ]);

        return redirect()->route('tipe_laundry');
    }

    public function hapus($id)
    {
        //try {
        $tipe_laundry = TipeLaundry::find($id);

        // cek apakah kereta memiliki relasi dengan gerbong
        // if ($jenis_pencuci->transaksi()->exists()) {
        //     throw new GlobalException("Tidak dapat menghapus jenis pencuci yang masih memiliki transaksi terkait.");
        // }

        $tipe_laundry->delete();

        return redirect()->route('tipe_laundry')->with('success', 'Data tipe laundry berhasil dihapus');
        // } catch (FFIException $e) {
        //     return redirect()->back()->withErrors([$e->getMessage()]);
        // }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $tipe_laundry = TipeLaundry::query()
                ->where('id_tipe_laundry', 'like', "%$query%")
                ->orWhere('tipe_laundry', 'like', "%$query%")
                ->orWhere('harga', 'like', "%$query%")
                ->orderBy('id_tipe_laundry', 'asc')
                ->paginate(10);
        } else {
            $tipe_laundry = TipeLaundry::get();
        }

        return view('tipe_laundry.index', ['tipe_laundry' => $tipe_laundry, 'query' => $query]);
    }
}
