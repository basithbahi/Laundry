<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::get();

        return view('admin/index', ['admin' => $admin]);
    }

    public function tambah()
    {
        return view('admin.form');
    }

    public function simpan(Request $request)
    {
        Admin::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);

        return redirect()->route('admin');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admin.form', ['admin' => $admin]);
    }

    public function update($id, Request $request)
    {
        Admin::find($id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin');
    }

    public function hapus($id)
    {
        /**try {
            $admin = Admin::find($id);

            if ($admin->jadwal()->exists()) {
                throw new GlobalException("Tidak dapat menghapus admin yang masih memiliki jadwal terkait.");
            }

            $admin->delete();

            return redirect()->route('admin')->with('success', 'Data admin berhasil dihapus');
        } catch (FFIException $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
            
        }*/
        Admin::find($id)->delete();

            return redirect()->route('admin');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $admin = Admin::query()
                ->where('nik', 'like', "%$query%")
                ->orWhere('nama', 'like', "%$query%")
                ->orWhere('alamat', 'like', "%$query%")
                ->orderBy('jk', 'asc')
                ->paginate(10);
        } else {
            $admin = Admin::get();
        }

        return view('admin.index', ['admin' => $admin, 'query' => $query]);
    }
}
