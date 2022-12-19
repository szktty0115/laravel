<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Illuminate\Console\Application;
use Illuminate\Http\Request;

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
    public function tournamentEdit(int $id)
    {
        return view('tournaments.edit');
    }
}
