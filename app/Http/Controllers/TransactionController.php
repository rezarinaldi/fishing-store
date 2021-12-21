<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $sellTransactions = Order::all();
        $detail = OrderDetails::all();
        return view('pages.transaction', compact('sellTransactions', 'detail'));
    }

    public function details(Order $transaction)
    {
        // $transaction = Order::all();
        // $item = Item::all();
        return view('pages.transaction-detail', compact('transaction'));
    }

    public function update(Request $request, Order $transaction)
    {
        $request->validate([
            'transfers_slip.required' => 'Bukti pembayaran harus di upload'
        ]);

        $image = $request->transfer_slip;

        if ($request->has('image') == '') {
            if ($image == '') {
                //
            } else {
                $nmFile = $image->getClientOriginalName();
                $value = $image->move(public_path('/images/items/'), $nmFile);

                $transaction->update([
                    'user_id' => $request->user_id,
                    'shipping_method' => $request->shipping_method,
                    'transfers_slip' => $nmFile,
                    'status' => 'process'
                ]);
            }
        }

        return redirect()->route('transaction-detail', $transaction)->with('success', 'Sukses menambahkan bukti pembayaran !');
    }
}
