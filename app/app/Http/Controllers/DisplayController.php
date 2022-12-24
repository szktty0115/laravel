<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\General;
use App\Tournament;
use App\User;
use Illuminate\Console\Application;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(int $id)
    {
        $result = Reservation::find($id);

        if (empty($result)) {
            $userId = Auth::id();
            $query = Tournament::where('user_id', $userId)->orderBy('starting_date')->get();
            return view('admins.index')->with([
                'message' => '応募者はいません',
                "id" => $userId,
                "query" => $query,
            ]);
        } else {
            $rId = Reservation::find($id)->id;
            $query = User::find($rId)->get();
            return view('applicant_lists.index')->with(['query' => $query]);
        }
    }
    public function caindex(int $id)
    {
        $userId = Auth::id();
        $query = Tournament::find($id);
        $user = User::find($userId);
        $general = General::where('user_id', $userId)->first();
        if (empty($general)) {
            return view('users.edit')->with(['query' => $query, 'user' => $user, 'general' => $general, 'id' => $userId]);
        }
        return view('competition_applications.index')->with(['query' => $query, 'user' => $user, 'general' => $general]);
    }

    public function tournamentEdit(int $id)
    {
        $query = Tournament::find($id);
        return view('tournaments.edit')->with(['query' => $query]);
    }
    public function userindex(int $id)
    {
        $userId = Auth::id();
        $tId = Reservation::find($userId)->tournament_id;
        $query = Tournament::where('id', $tId)->get();
        return view('/users')->with(['query' => $query]);
    }
    public function tournamentCreate(int $id)
    {
        return view('tournaments.create')->with(['id' => $id]);
    }
}
