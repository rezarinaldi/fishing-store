<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart', [
            'item' => Item::get()
        ]);
    }

    public function addCart($id)
    {
        $item = Item::findOrFail($id);
        $disc = $item->discount;

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $item->id,
                "name" => $item->nm_items,
                "quantity" => 1,
                "price" => $item->price - ($item->price * $disc / 100),
                "discount" => $disc,
                "image" => $item->pictures[0]->value
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang !');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quatity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Berhasil memperbarui keranjang');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->idate])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flas('success', 'Produk telah dihapus!');
        }
    }

    public function store(Request $request)
    {
        $data = [];
        $cart = session()->get('cart');

        foreach ($cart as $detail) {
            // dd($c);
            // $data['details'] = [
            //     [
            //         'product_id' => $detail['id'],
            //         'quantity' => $detail['quantity']
            //     ]
            // ];

            Order::create([
                'user_id' => $request->user_id,
                'item_id' => $detail['id'],
                'date' => $request->date,
                'quantity' => $detail['quantity'],
                'total_price' => $detail['price'],
                'shipping_method' => $request->shipping_method,
                'transfers_slip' => $request->transfers_slip,
                'status' => 'new'
            ]);
        }
        return view('pages.cart')->with('success', 'Pesanan berhasil dibuat');
    }
}
