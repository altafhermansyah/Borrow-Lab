<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\Item;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loans::latest()->with('items', 'users')->paginate(8);
        return view('admin.loans', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $loans = Loans::latest()->with('items', 'users')->get();

        $pdf = Pdf::loadView('admin.report.print', compact('loans'));
        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Loans $loans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loans $loans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'loan_date'=> '',
            'return_date'=> '',
            'status' => '',
        ]);

        $loans = Loans::findOrFail($id);

        $loans->update([
            'loan_date' => $request->input('loan_date'),
            'status' => $request->input('status'),
            'return_date' => $request->input('return_date'),
        ]);

        if($loans)
        {
            return redirect()->route('loans.index')->with(['update' => 'Item Data Updated Successfully']);
        }
        else
        {
            return redirect()->route('loans.index')->with(['error' => 'Item Data Failed to Update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loans $loans)
    {
        //
    }
}
