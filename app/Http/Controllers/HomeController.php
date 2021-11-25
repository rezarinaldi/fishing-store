<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'pages.home',
            [
                'items' => Item::orderBy('created_at', 'DESC')
                    ->take(5)
                    ->get(),
                'categories' => Category::get()
            ]
        );
    }

    public function item()
    {
        return view(
            'pages.product',
            [
                'items' => Item::orderBy('created_at', 'DESC')
                    ->get()
            ]
        );
    }

    public function detailItem($slug)
    {
        $item= Item::where('slug', $slug)->first();
        return view('pages.detail_product', compact('item'),  [
            'items' => Item::orderBy('created_at', 'DESC')
                ->take(3)
                ->get()
        ]);
    }
    
    public function contactus()
    {
        return view(
            'pages.contact'
        );
    }
}
