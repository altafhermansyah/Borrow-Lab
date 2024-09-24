<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Loans;


class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->paginate(8);
        return view('siswa.items', compact('items'));
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
            'user_id' => 'required',
            'item_id' => 'required',
        ]);

        $status = 'pending';
        $borrow = Loans::create([
            'user_id' => $request->input('user_id'),
            'item_id' => $request->input('item_id'),
            'status'  => $status
        ]);

        if($borrow)
        {
            return redirect()->route('borrow.index')->with(['success' => 'Your request has been sent to admin, please wait']);
        }
        else
        {
            return redirect()->route('borrow.index')->with(['error' => 'Your request error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'status' => '',
        ]);

        $loans = Loans::findOrFail($id);

        $loans->update([
            'status' => $request->input('status'),
        ]);

        if($loans)
        {
            return redirect()->route('return.index')->with(['success' => 'Your request has been sent to admin, please wait']);
        }
        else
        {
            return redirect()->route('return.index')->with(['error' => 'Your request error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
