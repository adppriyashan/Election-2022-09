<?php

namespace App\Http\Controllers;

use App\Models\Voters;
use Freshbitsweb\Laratables\Laratables;
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
        try {

            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'isnew' => 'required|in:1,2',
                'name' => 'required|string',
                'finger_print_id' => 'required|numeric',
                'nic' => 'required|string',
                'address' => 'required|string',
                'status' => 'required|in:1,2,3'
            ]);

            if ($request->isnew == 1) {
                $request->validate([
                    'name' => 'required|string',
                    'finger_print_id' => 'required|numeric',
                    'nic' => 'required|string',
                    'address' => 'required|string',
                ]);

                $data = [
                    'user_id' => auth()->user()->id,
                    'name' => $request->name,
                    'finger_print_id' => $request->finger_print_id,
                    'nic' => strtolower($request->nic),
                    'address' => $request->address,
                    'status' => $request->status
                ];
                Voters::create($data);
            } else {
                $request->validate([
                    'name' => 'required|string',
                    'finger_print_id' => 'required|numeric',
                    'address' => 'required|string',
                ]);

                $data = [
                    'name' => $request->name,
                    'finger_print_id' => $request->finger_print_id,
                    'address' => $request->address,
                    'status' => $request->status
                ];

                Voters::where('id', $request->record)->update($data);
            }

            DB::commit();
            return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'Voters Successfully ' . (($request->isnew == 1) ? 'Registered' : 'Updated')]);
        } catch (\Throwable $th) {
            error_log($th);
        }
    }

    public function list()
    {
        return Laratables::recordsOf(Voters::class);
    }

    public function getOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:voters,id'
        ]);

        return Voters::where('id', $request->id)->first();
    }

    public function deleteOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:voters,id'
        ]);
        Voters::where('id', $request->id)->update(['status' => 4]);

        return redirect()->back()->with(['code' => 1, 'color' => 'danger', 'msg' => 'Voter Successfully Removed']);
    }
}
