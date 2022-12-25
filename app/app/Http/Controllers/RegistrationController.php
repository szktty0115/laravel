<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\Admin;
use App\User;
use App\Tournament;
use App\Reservation;
use App\Http\Requests\CreateDate;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function userUpdate(CreateDate $request, int $id, User $user)
    {
    }
    public function tournamentUpdate(CreateDate $request, int $id, Tournament $tournament)
    {
        $tournament = Tournament::find($id);
        $tournament->name = $request->name;
        $tournament->game_name = $request->game_name;
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
        $userId = Auth::id();
        $tournament = Tournament::find($id);
        $reservation = new Reservation;
        $reservation->user_id = $userId;
        $reservation->name = $tournament->name;
        $reservation->starting_date = $tournament->starting_date;
        $reservation->ending_date = $tournament->ending_date;
        $reservation->recruit_start = $tournament->recruit_start;
        $reservation->recruit_end = $tournament->recruit_end;
        $reservation->comment = $request->comment;
        $reservation->tournament_id = $id;

        $reservation->save();

        return redirect('/users');
    }
    public function tournamentCreate(CreateDate $request, int $id, Tournament $tournament)
    {
        $userId = Auth::id();
        $admin = Admin::where('user_id', $userId)->first();

        $tournament = new Tournament;
        $tournament->user_id = $id;
        $tournament->name = $request->name;
        $tournament->game_name = $request->game_name;
        $tournament->starting_date = $request->starting_date;
        $tournament->ending_date = $request->ending_date;
        $tournament->limit = $request->limit;
        $tournament->recruit_start = $request->recruit_start;
        $tournament->recruit_end = $request->recruit_end;
        $tournament->guidelines = $request->guidelines;

        $tournament->admin_name = $admin->name;
        $tournament->admin_address = $admin->address;


        $img = $request->file('img');
        // storage > public > img配下に画像が保存される
        $path = $img->store('img', 'public');

        $tournament->img = $path;

        $tournament->save();
        return redirect('/users');
    }
    public function reservationDelete(int $id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        $id = Auth::id();
        $admins = Admin::where('user_id', $id)->first();
        $role = User::find($id)->role;

        $query = Tournament::where('user_id', $id)->orderBy('starting_date')->get();
        return view('admins.index')->with([
            "id" => $id,
            "role" => $role,
            "query" => $query,
            "admins" => $admins,
        ]);
    }
    public function reservationUserDelete(int $id)
    {
        $tournament = Reservation::find($id);
        // find tournamentテーブルと同じIDを持ってくる
        $tournament->delete();

        $userId = Auth::id();

        $query = Reservation::where('user_id', $userId)->orderBy('starting_date')->get();
        return view('users.index')->with([
            "id" => $id,
            "query" => $query,
        ]);
    }
    public function userStore(Request $request, int $id)
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
}
