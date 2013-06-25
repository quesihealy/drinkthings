<?php
include_once '/../../includes/config.php';
include_once '/../../classes/class.Cards.php';

$cards = new Cards($db);
$deck_of_cards = $cards->get_cards($db);

echo json_encode($deck_of_cards);

?>