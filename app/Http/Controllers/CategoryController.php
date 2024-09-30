<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        $items = Item::all();
        $itemCat = ItemCategory::with('items', 'categories')->paginate(5);
        return view('admin.category', compact('categories', 'items', 'itemCat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);


        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('category.index')->with('success', 'Category added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        // Validasi data yang diterima
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        // Mengambil kategori berdasarkan ID atau gagal jika tidak ditemukan
        $categorys = Category::findOrFail($id);

        // Update data kategori
        $categorys->update([
            'name' => $request->input('name'),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Hapus kategori
        $category->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
