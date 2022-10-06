<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotersController extends Controller
{
    public function index()
    {
        return view('pages.voters');
    }
}
