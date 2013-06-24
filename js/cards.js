jQuery(document).ready(function($) {

	$('.cards').hide();
	
	$('.play').click(function() {
		
		$('.instructions').hide();
		$('#banner').hide();

		var playValue = $("input.play").val();
		var datas = 'play=' + playValue;

		$.ajax({
			type: "POST",
			url: "controllers/cards.php",
			data: datas,
			dataType: "json",
			success: function(data) {
				$('.cards').show();
				$('.cards').html("<p class=" + data.id + ">" + data.thing + "</p>");
			},
	    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    	} 
		})
		
		return false;
	})

	function next_card() {
		
	}

})