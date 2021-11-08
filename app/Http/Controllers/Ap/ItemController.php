<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Picture;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $category = Category::all();
        $items = Item::when($request->keyword != NULL, function($query) use ($request) {
            $query->where('nm_items', 'like', '%' . $request->keyword . '%');
        })
            ->orderby("created_at", "desc")
            ->paginate(10);
        return view('pages\Ap.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages\Ap.items.create', compact('category'));
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
            'category_id' => 'required',
            'nm_items' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ],[
            'category_id.required' => 'Kategori wajib dipilih !',
            'nm_items.required' => 'Nama Produk wajib diisi !',
            'description.required' => 'Deskripsi untuk produk wajib diisi !',
            'quantity.required' => 'Jumlah produk wajib diisi !',
            'price.required' => 'Harga wajib diisi !',
            'discount.required' => 'Diskon wajib diisi !',
        ]);

        $dis = $request->discount;
        $price = $request->price;

        if ($dis > $price) {
            return redirect()->route('ap.items.create')->with('failed', 'Diskon tidak boleh melebihi harga penjualan !');
        } else {
            $item = Item::create([
                'category_id' => $request->category_id,
                'nm_items' => $request->nm_items,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount' => $request->discount
            ]);

            $images = $request->images;
            foreach ($images as $image) {
                $nmFile = $image->getClientOriginalName();
                $value = $image->move(public_path('/images/items/'), $nmFile);
                Picture::create([
                    'item_id' => $item->id,
                    'value' => $nmFile
                ]);

                return redirect()->route('ap.items.index')->with('success', 'Sukses menambahkan produk.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $category = Category::all();
        $images = Picture::all();
        return view('pages\Ap.items.show', compact('item', 'category', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $category = Category::all();
        $images = Picture::all();
        return view('pages\Ap.items.edit', compact('item', 'category', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required',
            'nm_items' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ],[
            'category_id.required' => 'Kategori wajib dipilih !',
            'nm_items.required' => 'Nama Produk wajib diisi !',
            'description.required' => 'Deskripsi untuk produk wajib diisi !',
            'quantity.required' => 'Jumlah produk wajib diisi !',
            'price.required' => 'Harga wajib diisi !',
            'discount.required' => 'Diskon wajib diisi !',
        ]);

        $dis = $request->discount;
        $price = $request->price;

        if ($dis > $price) {
            return redirect()->route('ap.items.create')->with('failed', 'Diskon tidak boleh melebihi harga penjualan !');
        } else {
            $item->update([
                'category_id' => $request->category_id,
                'nm_items' => $request->nm_items,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount' => $request->discount
            ]);

            $images = $request->images;
            if ($request->has('images[]') == "") {
                # not do anything
            } else {
                foreach ($images as $image) {
                    $nmFile = $image->getClientOriginalName();
                    $value = $image->move(public_path('/images/items/'), $nmFile);
                    Picture::create([
                        'item_id' => $item->id,
                        'value' => $nmFile
                    ]);
    
                    return redirect()->route('ap.items.index')->with('success', 'Sukses menambahkan produk.');
                }
            }
            return redirect()->route('ap.items.edit', $item)->with('success', 'Sukses merubah produk !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('ap.items.index')->with('success', 'Sukses menghapus produk !');
    }
}
