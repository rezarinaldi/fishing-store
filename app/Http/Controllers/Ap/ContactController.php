<?php

namespace App\Http\Controllers\Ap;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::when($request->keyword != NULL, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
            $query->orWhere('email', 'like', '%' . $request->keyword . '%');
        })
            ->orderBy("created_at", "desc")
            ->paginate(10);
        return view('pages.Ap.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Ap.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi !',
            'email.required' => 'Email wajib diisi !| Format email salah !',
            'phone.required' => 'Nomer telepon wajib diisi !',
            'message.required' => 'Pesan Wajib diisi !'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        return redirect()->route('ap.contacts.index')->with('success', 'Pesan sukses di kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('pages.Ap.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('pages.Ap.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi !',
            'email.required' => 'Email wajib diisi !| Format email salah !',
            'phone.required' => 'Nomer telepon wajib diisi !',
            'message.required' => 'Pesan Wajib diisi !'
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        return redirect()->route('ap.contacts.edit')->with('success', 'Update pesan berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('ap.contacts.index')->with('success', 'Pesan berhasil dihapus !');
    }
}
