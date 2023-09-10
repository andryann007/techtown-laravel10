<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function get()
    {
        $brands = Brand::all();

        $data = [
            'title'     => 'Data Brand',
            'brands'    => $brands,
            'i'         => 1
        ];

        return view('admin.brand', $data);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama'          => 'required|max:60'
        ]);

        Brand::create($validatedData);

        return redirect('/admin/brand')->with('success', 'Data Brand Berhasil di Tambah !!!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama'          => 'required|max:60'
        ]);

        $id = $request->id;
        Brand::where('id', $id)->update($validatedData);

        return redirect('/admin/brand')->with('success', 'Data Brand Berhasil di Update !!!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Brand::destroy($id);

        return redirect('/admin/brand')->with('success', 'Data Brand Berhasil di Hapus !!!');
    }
}
