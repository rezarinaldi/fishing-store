<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['item.pictures', 'user'])->where('user_id', Auth::user()->id)->get();

        return view('pages.cart', [
            'carts' => $carts
        ]);
    }

    public function addCart($id)
    {
        $item = Item::findOrFail($id);
        $disc = $item->discount;

        $cart = session()->get('cart', []);

        $keranjang = [
            'item_id' => $id,
            'user_id' => Auth::user()->id
        ];

        Cart::create($keranjang);

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
            session()->flash('success', 'Produk telah dihapus!');
        }
    }

    public function store(Request $request, Item $item)
    {
        $order = Order::create([
            'user_id' => $request->user_id,
            'shipping_method' => $request->shipping_method,
            'status' => 'unpaid',
            'transfers_slip' => $request->transfers_slip
        ]);

        $data = [];
        $cart = session()->get('cart');
        $quantity = $item['quantity'] - $request->quantity;

        foreach ($cart as $detail) {
            // dd($c);
            // $data['details'] = [
            //     [
            //         'product_id' => $detail['id'],
            //         'quantity' => $detail['quantity']
            //     ]
            // ];

            OrderDetails::create([
                'order_id' => $order->id,
                'item_id' => $detail['id'],
                'date' => $request->date,
                'quantity' => $detail['quantity'],
                'total_price' => $request->total_price,
            ]);

            $product = Item::find($detail['id']);
            $product->decrement('quantity', $detail['quantity']);
        }

        // Delete cart data
        Cart::with(['item', 'user'])
            ->where('user_id', Auth::user()->id)
            ->delete();

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    }
}
