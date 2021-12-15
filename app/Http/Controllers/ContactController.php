<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi !',
            'email.required' => 'Email wajib diisi ! | Format email salah !',
            'phone.required' => 'Nomer telepon wajib diisi ! | Gunakan format nomor/angka !',
            'message.required' => 'Pesan Wajib diisi !'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        return redirect()->route('contact')->with('success', 'Pesan berhasil dikirim!');
    }
}
