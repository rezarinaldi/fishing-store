<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    // public function index($slug)
    // {
    //     $item = Item::where('slug', $slug)->first();
    //     return view('pages.detail', compact('item'),  [
    //         'items' => Item::orderBy('created_at', 'DESC')
    //             ->take(3)
    //             ->get()
    //     ]);
    // }

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
