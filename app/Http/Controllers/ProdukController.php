<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Brand;
use App\Models\DetailProduk;

class ProdukController extends Controller
{
    public function get()
    {
        $products = Produk::join('kategori', 'kategori.id', '=', 'produk.id_kategori')
            ->join('brand', 'brand.id', '=', 'produk.id_brand')
            ->get(['produk.*', 'kategori.nama AS nama_kategori', 'brand.nama AS nama_brand']);

        $categories = Kategori::all();

        $brands = Brand::all();

        $data = [
            'title'         => 'Data Produk',
            'products'      => $products,
            'categories'    => $categories,
            'brands'        => $brands,
            'i'             => 1
        ];

        return view('admin.produk', $data);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori'       => 'required',
            'id_brand'          => 'required',
            'nama'              => 'required|max:150',
            'harga'             => 'required',
            'gambar'            => 'image|file|max:2048',
            'caption_gambar'    => 'required|max:150'
        ]);

        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $validatedData['gambar'] = $file->store('product-images');
        }

        Produk::create($validatedData);

        return redirect('/admin/produk')->with('success', 'Data Produk Berhasil di Tambah !!!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori'       => 'required',
            'id_brand'          => 'required',
            'nama'              => 'required|max:150',
            'harga'             => 'required',
            'gambar'            => 'image|file|max:2048',
            'caption_gambar'    => 'required|max:150'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('product-images');
        }

        $id = $request->id;
        Produk::where('id', $id)->update($validatedData);

        return redirect('/admin/produk')->with('success', 'Data Produk Berhasil di Update !!!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Produk::destroy($id);

        return redirect('/admin/produk')->with('success', 'Data Produk Berhasil di Hapus !!!');
    }

    public function detail(Request $request)
    {
        $id = $request->id;

        $products = Produk::join('kategori', 'kategori.id', '=', 'produk.id_kategori')
            ->join('brand', 'brand.id', '=', 'produk.id_brand')
            ->where('produk.id', '=', $id)
            ->get(['produk.*', 'kategori.nama AS nama_kategori', 'brand.nama AS nama_brand']);

        $details = DetailProduk::join('produk', 'produk.id', '=', 'detail_produk.id_produk')
            ->where('produk.id', '=', $id)
            ->get(['produk.id', 'produk.nama AS nama', 'detail_produk.*']);

        $data = [
            'title'         => 'Detail Produk',
            'products'      => $products,
            'details'       => $details
        ];

        return view('admin.detail_produk', $data);
    }

    public function insert_detail(Request $request)
    {
        $validatedData = $request->validate([
            'id_produk'         => 'required',
            'jaringan'          => 'required|max:30',
            'os'                => 'required|max:30',
            'cpu'               => 'required|max:60',
            'gpu'               => 'required|max:60',
            'ram'               => 'required',
            'ukuran_layar'      => 'required',
            'tipe_layar'        => 'required|max:60',
            'resolusi_layar'    => 'required|max:30',
            'kamera_belakang'   => 'required|max:120',
            'kamera_depan'      => 'required|max:120',
            'sim'               => 'required|max:60',
            'baterai'           => 'required|max:60',
            'dimensi'           => 'required|max:30',
            'berat'             => 'required'
        ]);

        DetailProduk::create($validatedData);

        return redirect('/admin/produk')->with('success', 'Detail Produk Berhasil di Tambah !!!');
    }

    public function update_detail(Request $request)
    {
        $validatedData = $request->validate([
            'id_produk'         => 'required',
            'jaringan'          => 'required|max:30',
            'os'                => 'required|max:30',
            'cpu'               => 'required|max:60',
            'gpu'               => 'required|max:60',
            'ram'               => 'required',
            'ukuran_layar'      => 'required',
            'tipe_layar'        => 'required|max:60',
            'resolusi_layar'    => 'required|max:30',
            'kamera_belakang'   => 'required|max:120',
            'kamera_depan'      => 'required|max:120',
            'sim'               => 'required|max:60',
            'baterai'           => 'required|max:60',
            'dimensi'           => 'required|max:30',
            'berat'             => 'required'
        ]);

        $id = $request->id_produk;
        DetailProduk::where('id_produk', $id)->update($validatedData);

        return redirect('/admin/produk')->with('success', 'Detail Produk Berhasil di Update !!!');
    }
}
