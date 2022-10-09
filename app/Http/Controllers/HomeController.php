<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Election;
use App\Models\ElectionHasVoters;
use App\Models\Nominators;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $voters = 0;
        $nominators = 0;
        $elections =  Election::where('status', 1)->count();
        $electionData =  Election::where('status', 1)->first();
        $electionEndtime =  '';
        $complains = 0;

        if($elections){
            $ele=Election::where('status', 1)->first();
            $electionEndtime=Carbon::parse($ele->election_date.' '.$ele->election_end_time)->format('M d, Y H:i:s');
            $nominators=Nominators::where('election',$ele->id)->count();
            $voters=ElectionHasVoters::where('election_id',$ele->id)->count();
            $complains=Complain::where('election',$ele->id)->count();
        }

        error_log($electionEndtime);

        return view('home', compact('voters', 'nominators', 'elections', 'complains','electionEndtime','electionData'));
    }
}
