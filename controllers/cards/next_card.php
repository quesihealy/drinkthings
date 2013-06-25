<?php
include_once '/../../includes/config.php';
include_once '/../../classes/class.Cards.php';

session_start();
$deck_of_cards = $_SESSION['deck'];

$temp_cards = new Cards();
$card_count = $temp_cards->count_cards($db);
$random_number = rand(0, $card_count-1);

while($deck_of_cards[$random_number]->use >= 1) {
	$random_number = rand(0, $card_count-1);
}

$new_card = $deck_of_cards[$random_number]->next_card($db, $deck_of_cards[$random_number]);

echo json_encode($new_card);
?>