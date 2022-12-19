<?php

namespace App\Http\Controllers;

use App\Tournament;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function tDelete(int $id)
    {
        Tournament::destroy($id);

        return redirect('/users');
    }
}
