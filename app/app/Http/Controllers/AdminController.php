<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $admin = Admin::where('user_id', $id)->first();
        return view('admins.edit')->with(['admin' => $admin, 'id' => $id, 'query' => $query,]);
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
    public function adminUpdate(Request $request, int $id, User $user)
    {
        $query = User::find($id);
        $query->tel = $request->tel;
        $query->email = $request->email;
        $query->save();
        $admin = Admin::where('user_id', $id)->first();
        if (empty($admin)) {
            $admin = new admin;
            $admin->user_id = $id;
            $admin->name = $request->name;
            $admin->address = $request->address;
            $admin->save();
            return redirect('/users');
        }
        $admin->user_id = $id;
        $admin->name = $request->name;
        $admin->address = $request->address;
        $admin->save();
        return redirect('/users');
    }
}
