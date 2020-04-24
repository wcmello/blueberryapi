<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
	public function showStats($server, $player){
		$player = Player::where('player_id', $player)->first();
		$data = [
			'name' => $player->name,
			'killcount' => count($player->kills),
			'balance' => (is_object($player->economics) ? $player->economics->balance : 0)
		];

		return $data;
	}
    public function showKillcount($server, $player){
    	$player = Player::where('player_id', $player)->first();

    	return $this->returnData($player, 'kills');
    }
    public function showKillfeed($server, $player){
    	$player = Player::where('player_id', $player)->first();
    	$data = [$player->name];
    	foreach ($player->kills->sortByDesc('date')->take(10) as $kill) {
    		$row = [
				'Victim' 	=> $kill->killed->name,
				'Distance' 	=> $kill->distance . " Meters",
				'Weapon'	=> $kill->weapon,
				'Bodypart'  => $kill->bodypart
			];
			array_push($data, $row);
    	}
    	return $data;
    }
    public function showBalance($server, $player){
		$player = Player::where('player_id', $player)->first();

		if(!is_object($player->economics)){
			$data = [
				'player_id' 	=> $player->player_id,
				'player_name' 	=> $player->name,
				'balance'		=> 0,
			];
			return $data;
		} 
		return $this->returnData($player, 'balance', 'economics');
    }
    public function returnData($player, $col, $rel = false){
    	if($rel){
			$data = [
				'player_id' 	=> $player->player_id,
				'player_name' 	=> $player->name,
				$col			=> $player->$rel->$col,
			];
    	}
    	elseif($col == 'kills'){
    		$data = [
				'player_id' 	=> $player->player_id,
				'player_name' 	=> $player->name,
				$col			=> count($player->$col),
			];
    	}
    	else {
    		$data = [
				'player_id' 	=> $player->player_id,
				'player_name' 	=> $player->name,
				$col			=> $player->$col,
			];
    	}

		return $data;
    }
}
