<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart', [
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
                "name" => $item->name,
                "quantity" => 1,
                "price" => $item->price - ($item->price * $disc / 100),
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
        
        foreach($cart as $detail) {
            // dd($c);
            // $data['details'] = [
            //     [
            //         'product_id' => $detail['id'],
            //         'quantity' => $detail['quantity']
            //     ]
            // ];

            Order::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'date' => $request->date,
                'quantity' => $request->quantity,
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_status,
                'status' => $request->status
            ]);
        }
        return view('cart')->with('success', 'Pesanan berhasil dibuat');
    }
}
