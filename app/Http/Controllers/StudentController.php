<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $query = User::where('role', 'student');
    // // Implement search
    // if ($request->has('search')) {
    //     $student->where('name', 'like', '%' . $request->search . '%')
    //             ->orWhere('nisn', 'like', '%' . $request->search . '%');
    // }

    if ($request->ajax()) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('nisn', 'like', "%{$search}%");
            });
        }
        $students = $query->get();
        return response()->json(['students' => $students]);
    }

    $students = $query->paginate(5);
    return view('admin.student', compact('students'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $student = User::findOrFail($id);

        $student->update([
            'name' => $request->input('name'),
            'nisn' => $request->input('nisn'),
            'password' => bcrypt($request->input('password')),
        ]);

        if($student)
        {
            return redirect()->route('student.index')->with(['update' => 'Update Data Student Success']);
        }
        else
        {
            return redirect()->route('student.index')->with(['error' => 'Update Data Student Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $student = User::findOrFail($id);

        $student->delete();

        if($student)
        {
            return redirect()->route('student.index')->with(['delete' => 'Delete Data Student Success']);
        }
        else
        {
            return redirect()->route('student.index')->with(['error' => 'Delete Data Student Error']);
        }
    }
}
