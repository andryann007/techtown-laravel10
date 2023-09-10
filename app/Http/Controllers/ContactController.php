<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

class ContactController extends Controller
{
    public function get()
    {
        // $contacts = Contact::join('users', 'users.id', '=', 'contact.replied_by')
        //     ->get(['users.id as user_id', 'users.name as user_name', 'contact.*']);

        $contacts = Contact::all();

        $data = [
            'title'     => 'Data Contact Us',
            'contacts'  => $contacts,
            'i'         => 1
        ];

        return view('admin.contact', $data);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama'          => 'required|max:30',
            'email'         => 'required|email',
            'subyek'        => 'required|max:255',
            'pesan'         => 'required'
        ]);

        Contact::create($validatedData);

        return redirect('/admin/contact')->with('success', 'Pesan Anda Berhasil di Kirim !!!');
    }

    public function reply(Request $request)
    {
        $validatedData = $request->validate([
            'status'          => 'required',
            'replied_by'      => 'required'
        ]);

        $id = $request->id;
        Contact::where('id', $id)->update($validatedData);

        $mailData = [
            'subject'     => 'no-reply@techtown.id',
            'body'      => $request->pesan
        ];

        $sendEmail = Mail::to($request->email, $request->nama)->send(new Email($mailData));

        if ($sendEmail) {
            return back()->with('success', 'Pesan Berhasil di Balas !!!');
        } else {
            return back()->with('error', 'Pesan Gagal di Balas !!!');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Contact::destroy($id);

        return redirect('/admin/contact')->with('success', 'Pesan Berhasil di Hapus !!!');
    }
}
