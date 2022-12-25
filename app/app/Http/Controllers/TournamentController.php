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
                ->orWhere('guidelines', 'LIKE', "%{$keyword}%")
                ->orWhere('admin_name', 'LIKE', "%{$keyword}%")
                ->orWhere('admin_address', 'LIKE', "%{$keyword}%")
                ->orWhere('limit', 'LIKE', "%{$keyword}%")
                ->orWhere('starting_date', 'LIKE', "%{$keyword}%")
                ->orWhere('ending_date', 'LIKE', "%{$keyword}%")
                ->orWhere('recruit_start', 'LIKE', "%{$keyword}%")
                ->orWhere('recruit_end', 'LIKE', "%{$keyword}%");
        }
        $count = 5;
        $query = $query->limit($count)->get();

        return view('tournaments.index')->with([
            'query' => $query,
            'keyword' => $keyword,
        ]);
    }
    public function ajax(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Tournament::query();
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('guidelines', 'LIKE', "%{$keyword}%")
                ->orWhere('admin_name', 'LIKE', "%{$keyword}%")
                ->orWhere('admin_address', 'LIKE', "%{$keyword}%")
                ->orWhere('limit', 'LIKE', "%{$keyword}%")
                ->orWhere('starting_date', 'LIKE', "%{$keyword}%")
                ->orWhere('ending_date', 'LIKE', "%{$keyword}%")
                ->orWhere('recruit_start', 'LIKE', "%{$keyword}%")
                ->orWhere('recruit_end', 'LIKE', "%{$keyword}%");
        }
        $count = $request->count;
        $query = $query->offset($count)->limit(5)->get();

        return array($query, $count + 5);
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
    }
}
