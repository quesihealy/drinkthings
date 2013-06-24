	<?php
	include_once '/includes/config.php';
	include_once '/classes/class.Cards.php';
	
	$cards = new Cards();
	$deck_of_cards = $cards->get_cards($db);
	$current_card = $cards->use_card($db, $deck_of_cards);
	?>

	<section id="content" class="cards">
		<p class="next_card"><?php echo $current_card->thing; ?></p>
	</section><!-- /#content --> 