<?php
include_once '/../includes/config.php';
include_once '/../classes/class.Cards.php';

$cards = new Cards($db);
$deck_of_cards = $cards->get_cards($db);
$used_card = $cards->use_card($db, $deck_of_cards);

echo json_encode($used_card);

?>