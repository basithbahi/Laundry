<?php

namespace App\Http\Controllers;

use App\Models\JenisCucian;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;
use Illuminate\Http\Request;

class JenisCucianController extends Controller
{
    public function index()
    {
        $jenis_cucian = JenisCucian::get();

        return view('jenis_cucian/index', ['jenis_cucian' => $jenis_cucian]);
    }

    public function tambah()
    {
        return view('jenis_cucian.form');
    }

    public function simpan(Request $request)
    {
        JenisCucian::create([
            'id_jenis_cucian' => $request->id_jenis_cucian,
            'jenis_cucian' => $request->jenis_cucian,
            'harga' => $request->harga,
        ]);

        return redirect()->route('jenis_cucian');
    }

    public function edit($id)
    {
        $jenis_cucian = JenisCucian::find($id);

        return view('jenis_cucian.form', ['jenis_cucian' => $jenis_cucian]);
    }

    public function update($id, Request $request)
    {
        JenisCucian::find($id)->update([
            'id_jenis_cucian' => $request->id_jenis_cucian,
            'jenis_cucian' => $request->jenis_cucian,
            'harga' => $request->harga,
        ]);

        return redirect()->route('jenis_cucian');
    }

    public function hapus($id)
    {
        //try {
        $jenis_cucian = JenisCucian::find($id);

        // cek apakah kereta memiliki relasi dengan gerbong
        // if ($jenis_pencuci->transaksi()->exists()) {
        //     throw new GlobalException("Tidak dapat menghapus jenis pencuci yang masih memiliki transaksi terkait.");
        // }

        $jenis_cucian->delete();

        return redirect()->route('jenis_cucian')->with('success', 'Data jenis cucian berhasil dihapus');
        // } catch (FFIException $e) {
        //     return redirect()->back()->withErrors([$e->getMessage()]);
        // }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $jenis_cucian = JenisCucian::query()
                ->where('id_jenis_cucian', 'like', "%$query%")
                ->orWhere('jenis_cucian', 'like', "%$query%")
                ->orWhere('harga', 'like', "%$query%")
                ->orderBy('id_jenis_cucian', 'asc')
                ->paginate(10);
        } else {
            $jenis_cucian = JenisCucian::get();
        }

        return view('jenis_cucian.index', ['jenis_cucian' => $jenis_cucian, 'query' => $query]);
    }
}
