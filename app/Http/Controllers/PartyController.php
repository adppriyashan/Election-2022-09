<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Carbon\Carbon;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    protected $officerUserType = 4;

    public function index()
    {
        return view('pages.party');
    }

    public function list()
    {
        return Laratables::recordsOf(Party::class);
    }

    public function getOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:parties,id'
        ]);
        return Party::where('id', $request->id)->first();
    }

    public function deleteOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:parties,id'
        ]);
        Party::where('id', $request->id)->update(['status' => 4]);
        return redirect()->back()->with(['code' => 1, 'color' => 'danger', 'msg' => 'Successfully Removed']);
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'isnew' => 'required|in:1,2',
            'name' => 'required|min:1',
            'status' => 'required|in:1,2,3'
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        if ($request->isnew == 1) {
            Party::create($data);
        } else {
            Party::where('id', $request->record)->update($data);
        }
        return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'Successfully ' . (($request->isnew == 1) ? 'Registered' : 'Updated')]);
    }
}
