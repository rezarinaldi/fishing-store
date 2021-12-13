<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Review;

class DetailController extends Controller
{
    public function index(Request $request, $id, Review $review)
    {
        $item = Item::with(['pictures'])->where('slug', $id)->firstOrFail();
        $review = Review::all();

        return view('pages.detail', [
            'item' => $item,
            'review' => $review
        ]);
    }
}
