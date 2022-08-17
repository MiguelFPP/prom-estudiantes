<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function create()
    {
        return view('student.create');
    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }
}
