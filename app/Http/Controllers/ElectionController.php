<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElectionController extends Controller
{
    public function index()
    {
        return view('pages.election');
    }

    public function enroll(Request $request)
    {
         try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'election_name' => 'required',
                'election_date' => 'required',
                'election_start_time' => 'required',
                'election_end_time' => 'required',
            ]);

            if ($validator->fails()) {
                error_log(json_encode($validator->errors()->all()));
                return redirect('/createElection')->with('status', 'Something went wrong');
            }

            if (Election::where('status', 1)->first()) {
                return redirect('/createElection')->with('status', 'Please complete all elections before create a new');
            }

            $data = [
                'user_id' => auth()->user()->id,
                'name' => $request->election_name,
                'date' => $request->election_date,
                'start_time' => Carbon::parse($request->election_start_time),
                'end_time' => Carbon::parse($request->election_end_time),
                'status' => 1,
            ];

            Election::create($data);
            DB::commit();

            return redirect('/createElection')->with('status', 'Saved Successfully');
        } catch (\Throwable $th) {
            error_log($th);
        }
    
    }
}
