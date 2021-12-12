<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Item::with(['pictures'])->where('slug', $id)->firstOrFail();

        return view('pages.detail', [
            'item' => $item
        ]);
    }

    // public function add(Request $request, $id)
    // {
    //     $data = [
    //         'products_id' => $id,
    //         'users_id' => Auth::user()->id
    //     ];

    //     Cart::create($data);

    //     return redirect()->route('cart');
    // }
}
