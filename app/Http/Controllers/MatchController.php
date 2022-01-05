<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    //
    public function index()
    {
        $matches = Matches::with(['home_team', 'away_team'])->orderBy('date', 'desc')->paginate(10);
        return view('pages.matches.index', compact('matches'));
    }

    public function create()
    {
        $teams = Team::get();
        return view('pages.matches.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'home_team_id' => 'required',
            'away_team_id' => 'required|different:home_team_id'
        ]);

        $tanggal = Carbon::parse($request->date)->format('Y-m-d');

        Matches::create([
            'date' => $tanggal,
            'time' => $request->time,
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id
        ]);

        connectify('success', 'Saved', 'Data Berhasil Disimpan');

        return redirect()->route('matches.index');
    }
}
