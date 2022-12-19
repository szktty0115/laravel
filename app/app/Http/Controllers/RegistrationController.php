<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\Admin;
use App\User;

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
}
