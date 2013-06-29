<?php
session_start();
// Display quick instructions w/ play button
require '/views/header.php';
include_once '/views/instructions.php';
include_once '/views/players.php';
include_once '/views/cards.php';
require '/views/footer.php';

?>