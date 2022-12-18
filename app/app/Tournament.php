<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'user_id', 'name', 'starting_date', 'ending_date', 'limit', 'recruit_start', 'recruit_end', 'guidelines',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
