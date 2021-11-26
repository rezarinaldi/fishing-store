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
        $categories = Category::take(6)->get();
        $items = Item::with('pictures')->take(8)->get();

        return view('pages.home',[
            'categories' => $categories,
            'items' => $items
        ]);
    }
}
