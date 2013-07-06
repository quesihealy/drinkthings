<?php
include_once '/../../classes/class.Players.php';
session_start();

$number_of_players = $_POST['number'];

$players = new Players($number_of_players);
$number_of_players = $players->number;

$_SESSION['players'] = $players;

echo json_encode($_SESSION['players']);

?>