<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\ElectionHasVoters;
use App\Models\Nominators;
use App\Models\TempVoters;
use App\Models\Voters;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ElectionController extends Controller
{
    public function index()
    {
        return view('pages.election');
    }

    public function enroll(Request $request)
    {

        if (Election::where('status', 1)->first()) {
            return redirect()->back()->with(['code' => 1, 'color' => 'danger', 'msg' => 'Previous Election Exists']);
        }

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

    public function getActiveElection()
    {
        return Election::where('status', 1)->latest()->first();
    }

    public function verifyVoter(Request $request)
    {

        if (Election::where('status', 1)->first() == null) {
            return ['data' => "No election available"];
        }

        $validator = FacadesValidator::make($request->all(), [
            'id' => 'required|numeric|exists:voters,id',
            'source' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ['data' => "Invalid Request"];
        }

        if (ElectionHasVoters::where('election_id', $this->getActiveElection()->id)->where('voter_id', $request->id)->first()) {
            return ['data' => "User already voted"];
        }

        if ($this->getActiveElection()->election_type == 1) {
            $candidates = Nominators::where('election', $this->getActiveElection()->id)->where('status', 1)->get();
        } else {
            $candidates = Nominators::where('election', $this->getActiveElection()->id)->where('province', $request->id)->where('status', 1)->get();
        }

        $voter = Voters::find($request->id);

        if ($request->source == 1) {
            return ['user' => $voter, 'data' => $candidates];
        } else {
            TempVoters::create(['user_id' => $request->id, 'election_id' => $this->getActiveElection()->id, 'status' => 1]);
            return view('/electionCandidateList', compact('candidates', 'voter'));
        }
    }

    public function checkVoterVerification(Request $request)
    {
        $tempObj = TempVoters::orderby('id', 'DESC')->first();

        if ($tempObj->status == 1) {
            $candidates = Nominators::where('election_id', $this->getActiveElection()->id)->where('status', 1)->get();
            return view('/electionCandidateList', compact('voter', 'candidates'));
        }

        return view('/main');
    }

    public function enrollVote(Request $request)
    {
        try {
            DB::beginTransaction();

            if ($this->getActiveElection()->id == null) {
                return ['data' => "No election available"];
            }

            $validator = FacadesValidator::make($request->all(), [
                'user_id' => 'required|numeric|exists:voters,id',
            ]);

            if ($validator->fails()) {
                return ['data' => "Invalid Request"];
            }

            if ($request->has('candidate_id')) {
                error_log('HAS');
                $status = 1;
            } else {
                error_log('NO');
                $request->candidate_id = null;
                $status = 2;
            }

            $data = [
                'election_id' => $this->getActiveElection()->id,
                'ehc_id' => $request->candidate_id,
                'voter_id' => $request->user_id,
                'time' => Carbon::now(),
                'status' => $status,
            ];

            ElectionHasVoters::create($data);

            if ($status == 1) {
                $candidateObj = Nominators::where('id', $request->candidate_id)->first();
                $candidateObj->update(['count', $candidateObj->vote_count += 1]);
            }

            foreach (TempVoters::get() as $key => $value) {
                TempVoters::find($value->id)->update(['status', 2]);
            }

            DB::commit();
            return view('/main');
        } catch (\Throwable $th) {
            error_log($th);
        }
    }
}
