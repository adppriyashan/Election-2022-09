<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\ElectionHasVoters;
use App\Models\Nominators;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $elections = Election::where('status', 1)->orderBy('status')->get();
        return view('pages.result_report', compact('elections'));
    }

    public function list(Request $request)
    {
        $data = [];

        foreach (Nominators::where('election', $request->election)->with('electionData')->with('partyData')->get() as $key => $value) {

            $query = ElectionHasVoters::where('election_id', $request->election);

            if ($request->has('from') && $request->from != '') {
                $query = $query->where('created_at', '>=', Carbon::parse($request->from)->format('Y-m-d H:i:s'));
            }

            if ($request->has('to') && $request->to != '') {
                $query = $query->where('created_at', '<', Carbon::parse($request->to)->format('Y-m-d H:i:s'));
            }

            $data[] = [$value->name . ' ( ' . $value->ref . ' )', $value->partyData->name, $query->where('ehc_id', $value->id)->count()];
        }

        return [
            'data' => $data,
            'recordsFiltered' => count($data),
            'recordsTotal' => count($data),
        ];
    }
}
