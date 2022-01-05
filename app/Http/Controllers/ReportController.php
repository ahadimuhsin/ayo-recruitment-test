<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Matches;
use App\Models\Report;
use App\Models\Scorer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function create($id)
    {
        $match = Matches::with(['home_team', 'away_team'])->findOrFail($id);
        $home_players = Player::where('team_id', $match->home_team->id)->get();
        $away_players = Player::where('team_id', $match->away_team->id)->get();
        return view('pages.matches.reports.create', compact('match', 'home_players', 'away_players'));
    }

    public function store(Request $request, $id)
    {
        //validasi
        $this->validate($request, [
            'match_id' => 'required',
            'home_team_id' => 'required',
            'away_team_id' => 'required',
            'home_team_scorer' => 'nullable|array',
            'home_team_scorer.*' => 'nullable',
            'away_team_scorer' => 'nullable|array',
            'away_team_scorer.*' => 'nullable',
            'home_team_goal_minutes' => 'required_with:home_team_scorer|array',
            'home_team_goal_minutes.*' => 'nullable',
            'away_team_goal_minutes' => 'required_with:away_team_scorer|array',
            'away_team_goal_minutes.*' => 'nullable'
        ]);
        // dd($request->all());

        //ambil skor yang nilainya terbesar
        $jumlah_skor = count(array_filter($request->home_team_scorer)) >= count(array_filter($request->away_team_scorer)) ?
        count(array_filter($request->home_team_scorer)) :
        count(array_filter($request->away_team_scorer));

        // dd($jumlah_skor);
        // dd(count(array_filter($request->home_team_scorer)));
        DB::beginTransaction();

        try {
            //simpan ke report
            $new_report = new Report();
            $new_report->match_id = $request->match_id;
            $new_report->home_team_id = $request->home_team_id;
            $new_report->away_team_id = $request->away_team_id;
            $new_report->home_team_goals = count(array_filter($request->home_team_scorer));
            $new_report->away_team_goals = count(array_filter($request->away_team_scorer));
            $new_report->save();
            // dd("cek");
            //simpan ke scorer
            for ($i=0; $i < $jumlah_skor ; $i++)
            {
                Scorer::create([
                    'match_id' => $request->match_id,
                    'home_team_scorer' => $request['home_team_scorer'][$i] ?? null,
                    'away_team_scorer' => $request['away_team_scorer'][$i] ?? null,
                    'home_team_goal_minutes' => $request['home_team_goal_minutes'][$i] ?? null,
                    'away_team_goal_minutes' => $request['away_team_goal_minutes'][$i] ?? null,
                ]);
            }
            // dd(count($request['home_team_scorer']));

            $match = Matches::findOrFail($id);
            $match->update([
                'status' => 1
            ]);

            DB::commit();

        } catch (Exception $e) {
            # code...
            $message = $e->getMessage();
            // dd($message);
            DB::rollback();
        }

        connectify('success', 'Saved', 'Data Berhasil Disimpan');

        return redirect()->route('matches.index');
    }

    public function detail($id)
    {
        $match = Matches::with('home_team', 'away_team')->findOrFail($id);
        $score_home = Report::select('home_team_goals')->where('match_id', $id)->first();
        $score_away = Report::select('away_team_goals')->where('match_id', $id)->first();

        $goal_scorers = DB::table('scorers AS a')
        ->selectRaw('a.home_team_goal_minutes AS goal_home_minutes, a.away_team_goal_minutes AS goal_away_minutes, d.name as home_goal_scorer, e.name as away_goal_scorer')
        ->leftJoin("matches AS b", "b.id", "=", "a.match_id")
        ->leftJoin("reports AS c", "c.match_id", "=", "a.match_id")
        ->leftJoin("players AS d", "d.id", "=", "a.home_team_scorer")
        ->leftJoin("players AS e", "e.id", "=", "a.away_team_scorer")
        ->where("a.match_id", "=", $id)
        ->orderBy('a.home_team_goal_minutes', 'ASC')
        ->orderBy('a.away_team_goal_minutes', 'ASC')
        ->get();
        // dd($goal_scorers);
        return view('pages.matches.reports.detail', compact('match', 'score_home', 'score_away', 'goal_scorers'));
    }
}
