<?php

//Start session which passes deck
session_start();

//attach all needed views
require '/views/header.php';
include_once '/views/instructions.php';
include_once '/views/players.php';
require '/views/footer.php';

?>