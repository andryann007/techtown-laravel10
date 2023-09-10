<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function get()
    {
        $categories = Kategori::all();

        $data = [
            'title'         => 'Data Kategori',
            'categories'    => $categories,
            'i'             => 1
        ];

        return view('admin.kategori', $data);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama'          => 'required|max:60'
        ]);

        Kategori::create($validatedData);

        return redirect('/admin/kategori')->with('success', 'Data Kategori Berhasil di Tambah !!!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama'          => 'required|max:60'
        ]);

        $id = $request->id;
        Kategori::where('id', $id)->update($validatedData);

        return redirect('/admin/kategori')->with('success', 'Data Kategori Berhasil di Update !!!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Kategori::destroy($id);

        return redirect('/admin/kategori')->with('success', 'Data Kategori Berhasil di Hapus !!!');
    }
}
