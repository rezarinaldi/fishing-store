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
        $item = Item::all();
        return view('pages.transaction-detail', compact('transaction', 'item'));
    }
}
