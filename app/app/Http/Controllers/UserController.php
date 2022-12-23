<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin;
use App\Reservation;
use App\Tournament;
use App\General;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $id = Auth::id();
        $role = User::find($id)->role;
        $rId = Reservation::where('user_id', $id);
        if (empty($rId)) {
            abort(404);
        }

        if ($role == 1) {
            $query = Tournament::where('user_id', $id)->orderBy('starting_date')->get();
            return view('admins.index')->with([
                "id" => $id,
                "role" => $role,
                "query" => $query,
            ]);
        } elseif ($role == 2) {
            $query = Reservation::where('user_id', $id)->orderBy('starting_date')->get();
            return view('users.index')->with([
                "id" => $id,
                "role" => $role,
                "query" => $query,
                "rId" => $rId,
            ]);
        } else {
            abort(404);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = User::find($id);
        $general = General::where('user_id', $id)->first();
        return view('users.edit')->with(['general' => $general, 'id' => $id, 'query' => $query,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
