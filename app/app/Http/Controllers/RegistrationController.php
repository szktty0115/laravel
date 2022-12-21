<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\Admin;
use App\User;
use App\Tournament;
use App\Reservation;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function userUpdate(Request $request, int $id, User $user)
    {
        $query = User::find($id);
        $query->tel = $request->tel;
        $query->email = $request->email;
        $query->save();
        $general = General::where('user_id', $id)->first();
        $general->user_id = $id;
        $general->name = $request->name;
        $general->birthday = $request->birthday;
        $general->save();
        return redirect('/users');
    }
    public function tournamentUpdate(Request $request, int $id, Tournament $tournament)
    {
        $tournament = Tournament::find($id);
        $tournament->name = $request->name;
        $tournament->starting_date = $request->starting_date;
        $tournament->ending_date = $request->ending_date;
        $tournament->limit = $request->limit;
        $tournament->recruit_start = $request->recruit_start;
        $tournament->recruit_end = $request->recruit_end;
        $tournament->guidelines = $request->guidelines;
        $tournament->img = $request->img;
        $tournament->save();
        return redirect('/users');
    }
    public function caUpdate(Request $request, int $id, User $user)
    {
        $userId = Auth::Id();

        $reservation = new Reservation;
        $reservation->tournament_id = $id;
        $reservation->user_id = $userId;
        $reservation->save();

        return redirect('/users');
    }
}
