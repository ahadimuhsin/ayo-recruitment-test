<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function index()
    {
        $teams = Team::orderBy('name', 'asc')->paginate(10);
        return view('pages.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('pages.teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
           'year_founded' => 'required',
           'address' => 'required',
           'city' => 'required'
        ]);

        $file_logo = $request->file('logo');
        if($file_logo){
            $file_name = 'banner-'.Str::slug($request->name, '-').'.'.$file_logo->extension();
            $logo = $file_logo->storeAs('logo-tim', $file_name, 'public');
        }

        Team::create([
            'name' => $request->name,
            'logo' => $logo,
            'year_founded' => $request->year_founded,
            'address' => $request->address,
            'city' => $request->city
        ]);

        connectify('success', 'Saved', 'Data Berhasil Disimpan');

        return redirect()->route('teams.index');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return view('pages.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'year_founded' => 'required',
            'address' => 'required',
            'city' => 'required'
        ]);

        // handle update gambar
        $file_logo = $request->file('logo');
        if($file_logo && $team){
            if($team->logo && file_exists(public_path('storage/'.$team->logo)))
            {
                unlink(public_path('storage/'.$team->logo));
            }
            $file_name = 'banner-'.Str::slug($request->name, '-').'.'.$file_logo->extension();
            $logo = $file_logo->storeAs('logo-tim', $file_name, 'public');
        }

        $team->update([
            'name' => $request->name,
            'logo' => $file_logo ? $logo : $team->logo,
            'year_founded' => $request->year_founded,
            'address' => $request->address,
            'city' => $request->city
        ]);

        connectify('success', 'Updated', 'Data Berhasil Diperbarui');

        return redirect()->route('teams.index');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        $team->delete();

        connectify('success', 'Deleted', 'Data Berhasil Dihapus');

        return redirect()->route('teams.index');
    }
}
