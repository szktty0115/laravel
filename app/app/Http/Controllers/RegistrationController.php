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
        if (empty($general)) {
            $general = new general;
            $general->user_id = $id;
            $general->name = $request->name;
            $general->birthday = $request->birthday;
            $general->save();
            return redirect('/users');
        }
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

        $img = $request->file('img');
        // storage > public > img配下に画像が保存される
        $path = $img->store('img', 'public');

        $tournament->img = $path;

        $tournament->save();
        return redirect('/users');
    }
    public function caUpdate(Request $request, int $id, User $user)
    {
        $userId = Auth::Id();
        $tournament = Tournament::find($id);
        $reservation = new Reservation;
        $reservation->user_id = $userId;
        $reservation->name = $tournament->name;
        $reservation->starting_date = $tournament->starting_date;
        $reservation->ending_date = $tournament->ending_date;
        $reservation->recruit_start = $tournament->recruit_start;
        $reservation->recruit_end = $tournament->recruit_end;
        $reservation->comment = $request->comment;

        $reservation->save();

        return redirect('/users');
    }
    public function tournamentCreate(Request $request, int $id, Tournament $tournament)
    {
        $tournament = new Tournament;
        $tournament->user_id = $id;
        $tournament->name = $request->name;
        $tournament->starting_date = $request->starting_date;
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
        return redirect('/users');
    }
}
