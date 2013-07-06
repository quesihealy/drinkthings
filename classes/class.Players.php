<?php

Class Players {

	public function __construct($number_of_players) {
		
		// Set the number of players for the game
		if (isset($number_of_players)) {
			$this->number = $number_of_players;
		} else {
			$this->number = '';
		}

		// Create the array variable names to hold player's names
		$this->names = array();

	}

	public function add_player($player_name) {

		// Make the 0 position empty so the key value is equal to the player's number.
		if ( array_key_exists('0', $this->names) ) {
			$this->names[0] = '';
		}

		// Add next Player to the names array
		array_push($this->names, $player_name);
	}
	
}