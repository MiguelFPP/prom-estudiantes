<?php

namespace App\Http\Controllers;

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
}
