<?php

namespace App\Http\Controllers;

use App\Models\Voters;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VotersController extends Controller
{
    public function index()
    {
        return view('pages.voters');
    }

    public function enroll(Request $request)
    {
        error_log(json_encode($request->all()));

        try {

            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'finger_print_id' => 'required|numeric',
                'nic' => 'required|string',
                'address' => 'required|string',
            ]);

            if ($validator->fails()) {
                error_log(json_encode($validator->errors()->all()));
                return redirect('/addVoters')->with('status', 'Something went wrong');
            }

            if (Voters::where('nic', strtolower($request->nic))->first()) {
                return redirect('/addVoters')->with('status', 'This NIC has an user already');
            }

            $data = [
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'finger_prict_id' => $request->finger_print_id,
                'nic' => strtolower($request->nic),
                'address' => $request->address,
                'status' => 1
            ];

            Voters::create($data);
            DB::commit();

            return redirect('/addVoters')->with('status', 'Saved Successfully');
        } catch (\Throwable $th) {
            error_log($th);
        }
    }
}
