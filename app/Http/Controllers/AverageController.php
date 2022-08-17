<?php

namespace App\Http\Controllers;

use App\Models\Average;
use Illuminate\Http\Request;

class AverageController extends Controller
{
    public function index()
    {
        return view('average.index');
    }

    public function create()
    {
        return view('average.create');
    }

    public function edit(Average $average)
    {
        return view('average.edit', compact('average'));
    }
}
