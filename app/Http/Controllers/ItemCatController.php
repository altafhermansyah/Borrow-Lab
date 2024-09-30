<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'item_id' => 'required',
        ]);

        $itemCat = ItemCategory::create([
            'category_id' => $request->input('category_id'),
            'item_id' => $request->input('item_id'),
        ]);

        if($itemCat)
        {
            return redirect()->route('category.index')->with(['success' => 'Your request has been sent to admin, please wait']);
        }
        else
        {
            return redirect()->route('category.index')->with(['error' => 'Your request error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemCategory $itemCategory)
    {
        //
    }
}
