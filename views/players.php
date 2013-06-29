<?php

include_once '/includes/config.php';
include_once '/classes/class.Players.php';
?>

	<section id="content" class="number_of_players">
		<form name="number_of_players" action="">
  		<label for="number"><h2>Number of Players:</h2></label>
			<input value="" name="number" class="number" type="number" min="2" max="30">
			<br />
			<input value="Next" name="number_submit" class="number_submit" type="submit">
		</form>
	</section>