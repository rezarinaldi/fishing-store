<?php

namespace App\Http\Controllers\Ap;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::when($request->keyword != NULL, function ($query) use ($request) {
            $query->where('nm_category', 'like' , '%' . $request->keyword . '%');
        })
            ->orderBy("created_at","desc")
            ->paginate(10);
        return view('pages\Ap\categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages\Ap\categories.create');
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
            'nm_category' => 'required',
        ],[
            'nm_category.required' => 'Nama kategori wajib diisi !'
        ]);

        Category::create([
            'nm_category' => $request->nm_category,
        ]);

        return redirect()->route('ap.categories.index')->with('success','Sukses menambahkan kategori.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('pages\Ap\categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('pages\Ap\categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nm_category' => 'required',
        ],[
            'nm_category.required' => 'Nama Kategori wajib diisi !'
        ]);

        $category->update([
            'nm_category' => $request->nm_category,
        ]);

        return redirect()->route('ap.categories.edit', $category)-> with('success', 'Sukses mengubah nama kategori.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->items()->count()) {
            return redirect()->route('ap.categories.index')->with('failed', 'Gagal menghapus kategori! Kategori masih digunakan.');
        } else {
            $category->delete();
            return redirect()->route('ap.categories.index')->with('success', 'Sukses menghapus kategori!');
        }
    }
}
