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
    public function index(Request $request)
    {
        $query = Loans::with('items', 'users');

        if ($request->ajax()) {
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->whereHas('users', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('items', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhere(function ($q) use ($search) {
                    $q->where('status', 'like', "%{$search}%")
                    ->orWhere('loan_date', 'like', "%{$search}%");
                });
            }
            $loans = $query->get();
            return response()->json(['loans' => $loans]);
        }

        $loans = Loans::latest()->with('items', 'users')->paginate(8);
        return view('admin.loans', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $query = Loans::latest()->with('items', 'users');

        if ($request->has('start_date') && $request->has('end_date') && !empty($request->start_date) && !empty($request->end_date))
        {
            $query->whereBetween('loan_date', [$request->start_date, $request->end_date]);
        }

        $loans = $query->get();

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
