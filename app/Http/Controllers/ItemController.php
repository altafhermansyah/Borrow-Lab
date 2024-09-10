<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->paginate(5);
        return view('admin.items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'description' => 'required',
            'condition' => 'required|in:1,2,3',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        $conditionMap = [
            1 => 'bad',
            2 => 'normal',
            3 => 'good',
        ];
        
        $condition = $conditionMap[$request->input('condition')]; // Konversi nilai
        
        $items = Item::create([
            'image' => $image->hashName(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'condition' => $condition, // Gunakan variabel $condition yang sudah dikonversi
        ]);

        

        if($items)
        {
            return redirect()->route('items.index')->with(['success' => 'Item Data Added Successfully']);
        }
        else
        {
            return redirect()->route('items.index')->with(['error' => 'Item Data Failed to Add']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'description' => 'required',
            'condition' => 'required|in:1,2,3',
        ]);
        
        $items = Item::findOrFail($id);

        // If a new image is uploaded, process the upload
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete('public/images/' . $items->image);
    
            // Upload the new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());
    
            // Update the image name in the database
            $items->image = $image->hashName();
        }
        
        $conditionMap = [
            1 => 'bad',
            2 => 'normal',
            3 => 'good',
        ];
        
        $condition = $conditionMap[$request->input('condition')]; // Konversi nilai

        $items->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'condition' => $condition,
        ]);

        if($items)
        {
            return redirect()->route('items.index')->with(['update' => 'Item Data Updated Successfully']);
        }
        else
        {
            return redirect()->route('items.index')->with(['error' => 'Item Data Failed to Update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $items = Item::findOrFail($id);

        $items->delete();

        if($items)
        {
            return redirect()->route('items.index')->with(['delete' => 'Item Data Deleted Successfully']);
        }
        else
        {
            return redirect()->route('items.index')->with(['error' => 'Item Data Failed to Delete']);
        }
    }
}
