<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlayerController extends Controller
{
    //
    public function index($id)
    {
        $players = Player::with('teams')->where('team_id', '=', $id)->get();
        $team = Team::findOrFail($id);
        // dd($players);
        return view('pages.teams.players.index', compact('players', 'team'));
    }

    public function create($id)
    {
        // $player = Player::with('teams')->where('team_id', '=', $id)->first();
        $team = Team::findOrFail($id);
        return view('pages.teams.players.create', compact('team'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'position' => 'required|in:attacker,midfielder,defender,goalkeeper',
            'number' => ['required', Rule::unique('players')->where(function ($query) use ($id) {
                return $query->where('team_id', $id);
            })]
        ]);

        Player::create([
            'name' => $request->name,
            'team_id' => $id,
            'height' => $request->height,
            'weight' => $request->weight,
            'position' => $request->position,
            'number' => $request->number
        ]);

        connectify('success', 'Saved', 'Data Berhasil Disimpan');

        return redirect()->route('teams.player.index', $id);
    }
}
