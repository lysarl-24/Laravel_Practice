<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // dd(request()->all());
        // $students = Student::all();
        $students = Student::latest()->get();

        return view('students.list', compact('students'));
    }

    // Create students
    public function create()
    {
        return view('students.create');
    }

    // Store student
    public function store()
    {
        // dd(request()->all());
        Student::create(
            [
                'name' => request()->name,
                'gender' => request()->gender,
                'class' => request()->class,
            ]
        );
        return redirect('/students');
    }

    // Show students
    public function show()
    {
        return view('/students.show');
    }

    // edit students
    public function edit()
    {
        
    }
}
