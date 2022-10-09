<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\ElectionHasVoters;
use App\Models\Nominators;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\DB;

class ElectionController extends Controller
{
    public function index()
    {
        return view('pages.election');
    }

    public function enroll(Request $request)
    {
        if ($request->isnew == 1) {

            $request->validate([
                'election_type' => 'required|in:1,2',
                'election_name' => 'required|string',
                'election_date' => 'required',
                'election_start_time' => 'required',
                'election_end_time' => 'required',
                'election_registration_start_date' => 'required',
                'election_registration_end_date' => 'required',
                'election_registration_start_time' => 'required',
                'election_registration_end_time' => 'required',
                'status' => 'required|in:1,2,3',
            ]);

            $data = [
                'election_type' => $request->election_type,
                'created_user_id' => auth()->user()->id,
                'name' => $request->election_name,
                'election_date' =>  $request->election_name,
                'election_start_time' => $request->election_start_time,
                'election_end_time' =>  $request->election_end_time,
                'registration_opening_date' => $request->election_registration_start_date,
                'registration_opening_time' => $request->election_registration_start_time,
                'registration_closing_date' => $request->election_registration_end_date,
                'registration_closing_time' => $request->election_registration_end_time,
                'status' => $request->status,
            ];

            Election::create($data);
        } else {
            $request->validate([
                'status' => 'required|in:1,2,3'
            ]);

            $data = [
                'status' => $request->status
            ];

            Election::where('id', $request->record)->update($data);
        }

        return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'Election Successfully ' . (($request->isnew == 1) ? 'Registered' : 'Updated')]);
    }

    public function list()
    {
        return Laratables::recordsOf(Election::class);
    }

    public function getOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:elections,id'
        ]);

        return Election::where('id', $request->id)->first();
    }

    public function deleteOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:elections,id'
        ]);
        Election::where('id', $request->id)->update(['status' => 4]);

        return redirect()->back()->with(['code' => 1, 'color' => 'danger', 'msg' => 'Voter Successfully Removed']);
    }

}
