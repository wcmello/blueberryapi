<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Economics extends Model
{
    protected $table = 'player_economics';

   public function player()
    {
        return $this->hasOne('App\Player', 'player_id', 'player_id');
    }
}
