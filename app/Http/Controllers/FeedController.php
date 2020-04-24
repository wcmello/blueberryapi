<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Killfeed;

class FeedController extends Controller
{
    public function showAmount($server, $amount, $order){

    	if($order == 'asc' || $order == 'desc'){
	    	$data = [];
			foreach (Killfeed::orderBy('date', $order)->limit($amount)->get() as $feed) {
				array_push($data, $this->format($feed));
			}
    	}
    	else{
    		return 'Can only order by DESC or ASC';
    	}
    return $data;
    }

    public function showRecent(){
    	$data = [];
		foreach (Killfeed::orderBy('date', 'desc')->limit(10)->get() as $feed) {

			array_push($data, $this->format($feed));
		}
	    return $data;
    }
    public function format($feed = 'No Player'){
    	if ($feed->killer && $feed->killed) {
    		$row = [
				'Killer' 	=> $feed->killer->name,
				'Victim' 	=> $feed->killed->name,
				'Distance' 	=> $feed->distance,
				'Weapon'	=> $feed->weapon
			]; 
    	}else {
    		$row = [
				'Killer' 	=> 'No Data',
				'Victim' 	=> 'No Data',
				'Distance' 	=> 'No Data',
				'Weapon'	=> 'No Data'
			]; 
    	}
    	
		return $row;
    }
}
