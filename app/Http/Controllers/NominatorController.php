<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Nominators;
use App\Models\Party;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class NominatorController extends Controller
{
    public function index()
    {
        $parties = Party::where('status', 1)->get();
        $elections = Election::where('status', 1)->get();
        return view('pages.nominators', compact('parties', 'elections'));
    }

    public function list()
    {
        return Laratables::recordsOf(Nominators::class);
    }

    public function getOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:nominators,id'
        ]);
        return Nominators::where('id', $request->id)->first();
    }

    public function approve(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:nominators,id'
        ]);
        return Nominators::where('id', $request->id)->update(['status' => 1]);
    }

    public function deleteOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:nominators,id'
        ]);
        Nominators::where('id', $request->id)->update(['status' => 4]);
        return redirect()->back()->with(['code' => 1, 'color' => 'danger', 'msg' => 'Successfully Removed']);
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'isnew' => 'required|in:1,2',
            'ref' => 'required_if:isnew,==,1',
            'name' => 'required|min:1',
            'address' => 'required|min:1',
            'nic' => 'required',
            'dob' => 'required',
            'city' => 'required|string',
            'gender' => 'required|numeric',
            'party' => 'required',
            'election' => 'required',
            'province' => 'required',
            'status' => 'nullable|in:1,2,3'
        ]);

        $data = [
            'ref' => $request->ref,
            'name' => $request->name,
            'address' => $request->address,
            'nic' => $request->nic,
            'dob' => $request->dob,
            'city' => $request->city,
            'gender' => $request->gender,
            'party' => $request->party,
            'status' => ($request->has('status'))?$request->status:2,
            'election' => $request->election,
            'province' => $request->province
        ];

        if ($request->isnew == 1) {

            $request->validate([
                'ref' => 'required|unique:nominators,ref'
            ]);

            Nominators::create($data);
        } else {
            Nominators::where('id', $request->record)->update($data);
        }
        return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'Successfully ' . (($request->isnew == 1) ? 'Registered' : 'Updated')]);
    }
}
