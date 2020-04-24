<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Economics;

class EconomicsController extends Controller
{
	public function showAmount($server, $amount){
		$data = [];
		foreach (Economics::orderBy('balance', 'DESC')->limit($amount)->get() as $feed) {
			array_push($data, $this->format($feed));
		}
	    return $data;
	}
    public function showTop(){
    	$data = [];
		foreach (Economics::orderBy('balance', 'DESC')->limit(10)->get() as $feed) {
			array_push($data, $this->format($feed));
		}
	    return $data;
    }
    public function format($feed){
		$row = [
			'Player' 	=> $feed->player->name,
			'Balance' 	=> $feed->balance
		]; 
		return $row;
    }
}
