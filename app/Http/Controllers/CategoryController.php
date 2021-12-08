<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $items = Item::paginate($request->input('limit', 12));

        return view('pages.category', [
            'categories' => $categories,
            'items' => $items
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $items = Item::where('category_id', $category->id)->paginate($request->input('limit', 12));

        return view('pages.category', [
            'categories' => $categories,
            'category' => $category,
            'items' => $items
        ]);
    }
}
