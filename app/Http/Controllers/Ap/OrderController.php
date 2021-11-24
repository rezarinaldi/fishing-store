<?php

namespace App\Http\Controllers\Ap;

use App\Http\Controllers\Controller;
use App\Item;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $item = Item::all();
        $orders = Order::when($request->keyword != NULL, function ($query) use($request){
            $query->where('date', 'like', '%' . $request->keyword . '%');
        })->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('pages\Ap.orders.index', compact('item', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Item::all();
        return view('pages\Ap.orders.create', compact('item'));
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
            'date' => 'required',
            'quantity' => 'required'
        ],[
            'date.required' => 'Tanggal harus diisi!',
            'quantity.required' => 'Banyak pembelian produk harus diisi!'
        ]);

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

        return redirect()->route('ap.orders.index')->with('success', 'Sukses menambahkan order');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $item = Item::all();
        return view('pages\Ap.orders.show', compact('item','order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $item = Item::all();
        $user = User::all();
        $payment = $order->payment_method;
        $status = $order->status;
        return view('pages\Ap.orders.edit', compact('item', 'order', 'user', 'payment', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'date' => 'required',
            'quantity' => 'required'
        ],[
            'date.required' => 'Tanggal harus diisi!',
            'quantity.required' => 'Banyak pembelian produk harus diisi!'
        ]);

        $order->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'date' => $request->date,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'status' => $request->status
        ]);

        return redirect()->route('ap.orders.edit')->with('success', 'Sukses Mengubah order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return view('pages\Ap.orders.index')->with('success', 'Sukses menghapus pesanan!');
    }
}
