<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin;
use App\Reservation;
use App\Tournament;

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

        if ($role == 1) {
            $query = Tournament::where('user_id', $id)->orderBy('starting_date')->get();
            return view('admins.index')->with([
                "id" => $id,
                "role" => $role,
                "query" => $query,
            ]);
        } elseif ($role == 2) {
            $query = Reservation::where('user_id', $id)->get();
            return view('users.index')->with([
                "id" => $id,
                "role" => $role,
                "query" => $query,
            ]);

            // if (!empty($query)) {
            //     return view('users.index')->with([
            //         "id" => $id,
            //         "role" => $role,
            //         "query" => $query,
            //     ]);
            // } elseif (empty($result)) {
            //     $query = '';
            //     $query = 2;
            //     return view('users.index')->with([
            //         "id" => $id,
            //         "role" => $role,
            //         "query" => $query,
            //     ]);
            // }
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
        return view('users.edit')->with(['id' => $id]);
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
