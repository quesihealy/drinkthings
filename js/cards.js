jQuery(document).ready(function($) {

	$('.cards').hide();
	$('.number_of_players').hide();
	
	$('.play').click(function() {
		
		$('.instructions').hide();
		$('#banner').hide();
		$('.number_of_players').show();

	})

	$('.number_submit').click(function() {

		var numberValue = $('input.number').val();
 		var data = 'number=' + numberValue;

		$.ajax({
			type: "POST",
			url: "controllers/players/number_of_players.php",
			data: data,
			dataType: "json",
			success: function(data) {
				$('.number_of_players').html('');
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("Status: " + textStatus); alert("Error: " + errorThrown);
			}
		})

	})

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