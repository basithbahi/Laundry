<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metode_pembayaran = MetodePembayaran::get();

        return view('metode_pembayaran/index', ['metode_pembayaran' => $metode_pembayaran]);
    }

    public function tambah()
    {
        return view('metode_pembayaran.form');
    }

    public function simpan(Request $request)
    {
        MetodePembayaran::create([
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('metode_pembayaran');
    }

    public function edit($id)
    {
        $metode_pembayaran = MetodePembayaran::find($id);

        return view('metode_pembayaran.form', ['metode_pembayaran' => $metode_pembayaran]);
    }

    public function update($id, Request $request)
    {
        MetodePembayaran::find($id)->update([
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('metode_pembayaran');
    }

    public function hapus($id)
    {
        try {
            $metode_pembayaran = MetodePembayaran::find($id);

            if ($metode_pembayaran->jadwal()->exists()) {
                throw new GlobalException("Tidak dapat menghapus metode_pembayaran yang masih memiliki jadwal terkait.");
            }

            $metode_pembayaran->delete();

            return redirect()->route('metode_pembayaran')->with('success', 'Data metode pembayaran berhasil dihapus');
        } catch (FFIException $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
            
        }
    }
//         MetodePembayaran::find($id)->delete();

//             return redirect()->route('metode_pembayaran');  
//     }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $metode_pembayaran = MetodePembayaran::query()
                ->where('id_metode_pembayaran', 'like', "%$query%")
                ->orWhere('metode_pembayaran', 'like', "%$query%")
                ->orderBy('id_metode_pembayaran', 'asc')
                ->paginate(10);
        } else {
            $metode_pembayaran = MetodePembayaran::get();
        }

        return view('metode_pembayaran.index', ['metode_pembayaran' => $metode_pembayaran, 'query' => $query]);
    }
}
