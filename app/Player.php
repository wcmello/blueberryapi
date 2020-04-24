<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';

   	public function kills(){
   		return $this->hasMany('App\Killfeed', 'killer_id', 'player_id');
   	}

   	public function economics()
    {
        return $this->hasOne('App\Economics', 'player_id', 'player_id');
    }
}
