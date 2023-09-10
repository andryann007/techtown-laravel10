<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function get()
    {
        $users = User::all();

        $data = [
            'title'         => 'Data Akun',
            'users'         => $users,
            'i'             => 1
        ];

        if (auth()->user()->hak_akses == 'super-admin') {
            return view('admin.akun', $data);
        } else if (auth()->user()->hak_akses == 'admin') {
            return redirect('/admin/brand');
        }
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|max:30',
            'email'         => 'required|max:60',
            'password'      => 'required|max:12',
            'hak_akses'     => 'required',
            'gambar_profil' => 'image|file|max:2048'
        ]);

        $tokenCharacter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pieces  = [];
        $max = mb_strlen($tokenCharacter, '8bit') - 1;

        // Generate Random 10 Reset Token
        for ($i = 0; $i < 10; ++$i) {
            $pieces[] = $tokenCharacter[random_int(0, $max)];
        }

        $resetToken = implode('', $pieces);

        $validatedData['remember_token'] = $resetToken;

        if ($request->file('gambar_profil')) {
            $file = $request->file('gambar_profil');
            $validatedData['gambar_profil'] = $file->store('profile-images');
        }

        User::factory()->create($validatedData);

        return redirect('/admin/akun')->with('success', 'Data User Berhasil di Tambah !!!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|max:30',
            'email'         => 'required|max:60',
            'hak_akses'     => 'required',
            'gambar_profil' => 'image|file|max:2048'
        ]);

        if ($request->file('gambar_profil')) {
            $file = $request->file('gambar_profil');
            $validatedData['gambar_profil'] = $file->store('profile-images');
        }

        $id = $request->id;
        User::where('id', $id)->update($validatedData);

        return redirect('/admin/akun')->with('success', 'Data User Berhasil di Update !!!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        User::destroy($id);

        return redirect('/admin/akun')->with('success', 'Data User Berhasil di Hapus !!!');
    }

    public function my_profile()
    {
        $data = [
            'title' => 'My Profile'
        ];

        return view('admin.my_profile', $data);
    }

    public function update_profile(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|max:30',
            'gambar_profil' => 'image|file|max:2048'
        ]);

        if ($request->file('gambar_profil')) {
            $file = $request->file('gambar_profil');
            $validatedData['gambar_profil'] = $file->store('profile-images');
        }

        $id = $request->id;
        User::where('id', $id)->update($validatedData);

        return redirect('/admin/my_profile')->with('success', 'Profil Anda Berhasil di Update !!!');
    }
}
