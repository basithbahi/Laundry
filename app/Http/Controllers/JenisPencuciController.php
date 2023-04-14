<?php

namespace App\Http\Controllers;

use App\Models\JenisPencuci;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;
use Illuminate\Http\Request;

class JenisPencuciController extends Controller
{
    public function index()
    {
        $jenis_pencuci = JenisPencuci::get();

        return view('jenis_pencuci/index', ['jenis_pencuci' => $jenis_pencuci]);
    }

    public function tambah()
    {
        return view('jenis_pencuci.form');
    }

    public function simpan(Request $request)
    {
        JenisPencuci::create([
            'id_jenis_pencuci' => $request->id_jenis_pencuci,
            'jenis_pencuci' => $request->jenis_pencuci,
            'harga' => $request->harga,
        ]);

        return redirect()->route('jenis_pencuci');
    }

    public function edit($id)
    {
        $jenis_pencuci = JenisPencuci::find($id);

        return view('jenis_pencuci.form', ['jenis_pencuci' => $jenis_pencuci]);
    }

    public function update($id, Request $request)
    {
        JenisPencuci::find($id)->update([
            'id_jenis_pencuci' => $request->id_jenis_pencuci,
            'jenis_pencuci' => $request->jenis_pencuci,
            'harga' => $request->harga,
        ]);

        return redirect()->route('jenis_pencuci');
    }

    public function hapus($id)
    {
        //try {
        $jenis_pencuci = JenisPencuci::find($id);

        // cek apakah kereta memiliki relasi dengan gerbong
        // if ($jenis_pencuci->transaksi()->exists()) {
        //     throw new GlobalException("Tidak dapat menghapus jenis pencuci yang masih memiliki transaksi terkait.");
        // }

        $jenis_pencuci->delete();

        return redirect()->route('jenis_pencuci')->with('success', 'Data jenis pencuci berhasil dihapus');
        // } catch (FFIException $e) {
        //     return redirect()->back()->withErrors([$e->getMessage()]);
        // }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $jenis_pencuci = JenisPencuci::query()
                ->where('id_jenis_pencuci', 'like', "%$query%")
                ->orWhere('jenis_pencuci', 'like', "%$query%")
                ->orWhere('harga', 'like', "%$query%")
                ->orderBy('id_jenis_pencuci', 'asc')
                ->paginate(10);
        } else {
            $jenis_pencuci = JenisPencuci::get();
        }

        return view('jenis_pencuci.index', ['jenis_pencuci' => $jenis_pencuci, 'query' => $query]);
    }
}