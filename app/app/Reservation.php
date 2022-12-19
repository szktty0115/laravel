<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'tournament_id', 'comment', 'user_id'
    ];
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
