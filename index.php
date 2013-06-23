<?php

//Include Files
include_once '/includes/config.php';
include_once '/classes/class.Cards.php';
require '/views/header.php';

// Initiate Cards Class
$cards = new Cards();

// Check if it's a new visitor
if ( !isset($_POST['play']) && !isset($_POST['thing']) ) {
	// Display quick instructions w/ play
	include_once '/views/instructions.php';
}

// Check if game in progress
if ( isset($_POST['play']) ) {
	// Check to see if it's a new game
	if ( !isset($_POST['thing']) ) {
		// Display the first card
		include_once '/views/cards.php';
		// Pass thing id through post

	}
	// Check if thing id is there
		// make uses 1
		// display a card
}
require '/views/footer.php';