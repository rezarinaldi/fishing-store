<?php

namespace App\Http\Controllers;

use App\Item;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with(['pictures', 'category'])->get();
        $reviews = Review::all();

        return view('pages.review', [
            'items' => $items,
            'reviews' => $reviews
        ]);
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
            'item_id' => 'required',
            'comment' => 'required',
        ], [
            'item_id.required' => 'Item wajib diisi!',
            'comment.required' => 'Komentar review wajib diisi!'
        ]);

        // $item = Item::findOrFail($request->item_id);
        // $slug = Item::findOrFail($request->slug);
        Review::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'comment' => $request->comment
        ]);

        return redirect()->route('review')->with('success', 'Review Anda berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request, $id)
    {
        $items = Item::with(['pictures', 'category'])->get();
        $review = Review::with(['item', 'user'])->findOrFail($id);

        return view('pages.review-detail', [
            'items' => $items,
            'review' => $review
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $review = Review::findOrFail($id);

        $review->update($data);

        return redirect()->route('review')->with('success', 'Review Anda berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
