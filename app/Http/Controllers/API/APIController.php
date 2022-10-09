<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\ElectionHasVoters;
use App\Models\Nominators;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getElectionVoters($userId)
    {
        $availableElection = Election::where('status', 1)->first();

        if ($availableElection) {
            $previousVote = ElectionHasVoters::where('election_id', $availableElection->id)->where('voter_id', $userId)->first();
            if ($previousVote == null) {
                $query = Nominators::where('election', $availableElection->id);
                if ($availableElection->election_type == 1) {
                    //Presidencial
                    return $query->with('partyData')->with('electionData')->get();
                } else {
                    return $query->where('province', $userId->province_id)->with('partyData')->with('electionData')->get();
                }
            } else {
                return '2';
            }
        }
        return '2';
    }

    public function submitVote($userId, $nominatorId)
    {
        $availableElection = Election::where('status', 1)->first();
        ElectionHasVoters::create([
            'election_id' => $availableElection->id,
            'voter_id' => $userId,
            'ehc_id' => $nominatorId,
            'elected_time' => Carbon::now(),
            'status' => 1,
        ]);
        Nominators::where('id', $nominatorId)->increment('vote_count');
        //submit
        return '1';
    }

    public function getResults()
    {
        return Election::with('nominatorsData')->orderBy('status', 'ASC')->get();
    }
}
