jQuery(document).ready(function($) {

	$('.cards').hide();
	
	$('.play').click(function() {
		
		$('.instructions').hide();
		$('#banner').hide();

		var playValue = $("input.play").val();
		var datas = 'play=' + playValue;

		$.ajax({
			type: "POST",
			url: "controllers/cards/get_card.php",
			data: datas,
			dataType: "json",
			success: function(data) {
				$('.cards').show();
			},
	    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    	} 
		})
		return false;

	})

	$('.cards').click(function() {
	
		$.ajax({
			type: "POST",
			url: "controllers/cards/next_card.php",
			dataType: "json",
			success: function(data) {
				$('.cards').html('');
				$('.cards').append('<p class="card '+data.id+'">'+data.thing+'</p>');
				// Replace with next
				
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("Status: " + textStatus); alert("Error: " + errorThrown);
			}
		})
		return false;
	})

})