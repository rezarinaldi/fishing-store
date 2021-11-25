<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function index($slug)
    {
        
        $item= Item::where('slug', $slug)->first();
        return view('pages.detail', compact('item'),  [
            'items' => Item::orderBy('created_at', 'DESC')
                ->take(3)
                ->get()
        ]);
    }
}
