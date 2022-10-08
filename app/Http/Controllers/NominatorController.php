<?php

namespace App\Http\Controllers;

use App\Models\Nominators;
use App\Models\Party;
use Illuminate\Http\Request;

class NominatorController extends Controller
{
    public function index()
    {
        $parties = Party::where('status', 1)->orderby('name', 'ASC')->get();
        return view('pages.nominator', compact('parties'));
    }

    public function enroll(Request $request)
    {

        if ($request->isnew == 1) {
            $request->validate([
                '' => 'required|string',
                'name' => 'required|string',
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
            Nominators::create($data);
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

            Nominators::where('id', $request->record)->update($data);
        }

        return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'Voters Successfully ' . (($request->isnew == 1) ? 'Registered' : 'Updated')]);
    }
}
