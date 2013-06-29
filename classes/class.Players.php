<?php

Class Players {

	public function __construct($number_of_players) {
		
		if (isset($number_of_players)) {
			$this->number = $number_of_players;
		} else {
			$this->number = '';
		}
	}

	public function number_of_players() {

	}

	
}