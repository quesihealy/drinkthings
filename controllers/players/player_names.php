<?php
include_once '/../../classes/class.Players.php';
session_start();

// Collect the Player's names from the form
$player_names = $_POST['data'];

// Add a player's name to the Player class for each player and add that to the session
foreach ($player_names as $player) {
	$_SESSION['players']->add_player($player);
}

echo json_encode($_SESSION);
?>