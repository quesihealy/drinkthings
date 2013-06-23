<?php

//Include Database Connection
include_once '/includes/config.php';
include_once '/classes/class.Cards.php';

// Get the cards ready
$cards = new Cards();
$cards->get_cards($db);
