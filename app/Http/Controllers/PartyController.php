<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartyController extends Controller
{
    protected $officerUserType = 4;

    public function index()
    {
        return view('pages.party');
    }
}
