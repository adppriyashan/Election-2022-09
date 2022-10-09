<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    public function submit(Request $request)
    {
        Complain::create(['message' => $request->complain, 'election' => $request->election, 'by' => Auth::user()->id]);
    }

    public function index()
    {
        $elections = Election::where('status', 1)->orderBy('status')->get();
        return view('pages.complains_report', compact('elections'));
    }

    public function list(Request $request)
    {
        $data = [];

        $query = Complain::where('election', $request->election);

        if ($request->has('from') && $request->from != '') {
            $query = $query->where('created_at', '>=', Carbon::parse($request->from)->format('Y-m-d H:i:s'));
        }

        if ($request->has('to') && $request->to != '') {
            $query = $query->where('created_at', '<', Carbon::parse($request->to)->format('Y-m-d H:i:s'));
        }

        foreach ($query->with('electionData')->with('userData')->orderBy('id','DESC')->get() as $key => $value) {
            $data[] = [$value->electionData->name . ' : ' . $value->electionData->election_date, $value->message, $value->userData->name];
        }

        return [
            'data' => $data,
            'recordsFiltered' => count($data),
            'recordsTotal' => count($data),
        ];
    }
}
