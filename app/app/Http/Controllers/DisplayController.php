<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Tournament;
use App\User;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(int $id)
    {
        $result = Reservation::find($id);

        if (empty($result)) {
            abort(404);
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
        return view('competition_applications.index')->with(['query' => $query, 'user' => $user]);
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
