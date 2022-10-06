<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        return view('pages.election');
    }
}
