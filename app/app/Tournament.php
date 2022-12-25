<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'user_id', 'name', 'game_name', 'starting_date', 'ending_date', 'limit', 'recruit_start', 'recruit_end', 'guidelines', 'admin_name', 'admin_address'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function reservation()
    {
        return $this->hasMany('App\reservation');
    }
}
