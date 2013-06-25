	<?php
	session_start();

	include_once '/includes/config.php';
	include_once '/classes/class.Cards.php';
	
	$cards = new Cards();
	$deck_of_cards = $cards->get_cards($db);
	$current_card = $cards->use_card($db, $deck_of_cards);
	?>

	<section id="content" class="cards">
		<p class="card <?php echo $current_card->id; ?>"><?php echo $current_card->thing; ?></p>
	</section>

	<?php $_SESSION['deck'] = $deck_of_cards; ?>
