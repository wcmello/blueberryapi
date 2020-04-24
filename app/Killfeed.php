<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Killfeed extends Model
{
    protected $table = 'player_kill';

    public function killer()
    {
        return $this->hasOne('App\Player', 'player_id', 'killer_id');
    }
    public function killed()
    {
        return $this->hasOne('App\Player', 'player_id', 'victim_id');
    }
}
