jQuery(document).ready(function($) {

	// Hide the game and set up
	$('.cards').hide();
	$('.number_of_players').hide();
	
	// When instructions is clicked show the set up
	$('.play').click(function() {
		
		$('.instructions').hide();
		$('#banner').hide();
		$('.number_of_players').show();

	})

	// When number of players is submited
	$('.number_submit').click(function() {

 		var numValue = $("input.number").val();
 		var numdata = 'number=' + numValue;

		$.ajax({
			type: "POST",
			url: "controllers/players/number_of_players.php",
			data: numdata,
			dataType: "json",
			success: function(data) {
				$('.number_of_players').html('');
				$('.number_of_players').append('<form name="players_names" action="">');

				for(var i = 1; i <= data.number; i++) {
					$('.number_of_players').append(''
					+'<label for="player-'+i+'"><h2>Player '+i+' Name:</h2></label>'
					+'<input value="" name="player-'+i+'" class="player '+i+'" type="text">'
					+'<br />');
				}

				$('.number_of_players').append('<input value="Lets Play!" name="player_names" class="player_names" type="submit">');
				$('.number_of_players').append('</form>');

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("Status: " + textStatus); alert("Error: " + errorThrown);
			}
		})
		return false;
	})

	// Used when the players names are entered
	$('body').on('click', '.player_names', function() {

		// Find Number of Players
		var num_of_players = $('.number_of_players').find('input:text').length;

		//Send data for each player
		player_names = [];
		player_names[0] = '';
		for(var i=1; i<=num_of_players; i++) {
			player_names[i] = $('input.'+i+'').val();
		}

		$.ajax({
			type: "POST",
			url: "controllers/players/player_names.php",
			data: { data: player_names },
			dataType: "json",
			success: function(data) {
				$('.number_of_players').hide();
				$('.cards').show();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("Status: " + textStatus); alert("Error: " + errorThrown);
			}
		})
		return false;
	})

	// Used when a card is clicked
	$('.cards').click(function() {
	
		$.ajax({
			type: "POST",
			url: "controllers/cards/next_card.php",
			dataType: "json",
			success: function(data) {
				$('.cards').html('');
				$('.cards').append('<p class="card '+data.id+'">'+data.thing+'</p>');
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("Status: " + textStatus); alert("Error: " + errorThrown);
			}
		})
		return false;
	})

/* This Code is used
 * when the first card
 * is ready to be displayed
 */

// $('.instructions').hide();
// 		$('#banner').hide();

// 		var playValue = $("input.play").val();
// 		var datas = 'play=' + playValue;

// 		$.ajax({
// 			type: "POST",
// 			url: "controllers/cards/get_card.php",
// 			data: datas,
// 			dataType: "json",
// 			success: function(data) {
// 				$('.cards').show();
// 			},
// 	    error: function(XMLHttpRequest, textStatus, errorThrown) { 
//         alert("Status: " + textStatus); alert("Error: " + errorThrown); 
//     	} 
// 		})
// 		return false;

})