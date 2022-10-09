<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\Nominators;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getElectionVoters($userId)
    {
        $availableElection = Election::where('status', 1)->first();
        //check already voted
        if ($availableElection) {
            $query = Nominators::where('election', $availableElection->id);
            if ($availableElection->election_type == 1) {
                //Presidencial
                return $query->with('partyData')->with('electionData')->get();
            } else {
                return $query->where('province', $userId->province_id)->with('partyData')->with('electionData')->get();
            }
        }
        return '2';
    }

    public function submitVote($userId, $nominatorId)
    {
        $availableElection = Election::where('status', 1)->first();

        //submit
        return '1';
    }

    public function getResults()
    {
        return Election::with('nominatorsData')->orderBy('id','DESC')->get();
    }
}
