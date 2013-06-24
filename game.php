<?php

//Include Files
include_once '/includes/config.php';
include_once '/classes/class.Cards.php';

require '/views/header.php';

// Initiate Cards Class
$cards = new Cards();

require '/views/cards.php';
require '/views/footer.php';