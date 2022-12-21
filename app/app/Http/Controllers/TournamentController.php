<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tournament;

use App\User;

use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Tournament::query();
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('guidelines', 'LIKE', "%{$keyword}%");
        }
        $query = $query->get();

        return view('tournaments.index')->with([
            'query' => $query,
            'keyword' => $keyword,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tournament = new Tournament;
        $id = Auth::id();
        $query = User::find($id)->get();
        $tournament->user_id = $id;
        $tournament->name = $request->name;
        $tournament->starting_date = $request->starng_date;
        $tournament->ending_date = $request->ending_date;
        $tournament->limit = $request->limit;
        $tournament->recruit_start = $request->recruit_start;
        $tournament->recruit_end = $request->recruit_end;
        $tournament->guidelines = $request->guidelines;

        $img = $request->file('img');
        // storage > public > img配下に画像が保存される
        $path = $img->store('img', 'public');

        $tournament->img = $path;

        $tournament->save();

        return view('admins.index')->with(['id' => $id, 'query' => $query]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tournament.update')->with(['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect('/users');
    }
}
