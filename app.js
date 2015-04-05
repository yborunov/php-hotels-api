(function () {
	
	var app = window.app || {};
	
	app.renderList = function () {

		var i;

		$('#hotels tr:not(:first-child)').remove()

		for (i = 0; i < app.hotelsList.length; i += 1) {
			
			if (app.hotelsList[i].price.hotelPrice >= app.min_price &&
				app.hotelsList[i].price.hotelPrice <= app.max_price) {
				
				$('#hotels').append('<tr><td>' + app.hotelsList[i].hotelName + '</td> \
										 <td><img src="' + app.hotelsList[i].hotelStarUrl + '"></td> \
										 <td>$' + app.hotelsList[i].price.hotelPrice + '</td> \
										 <td>' + (app.hotelsList[i].price.hotelPromoPrice || '') + '</td> \
										 <td>' + (app.hotelsList[i].price.hotelPromoDescription || '') + '</td> \
									</tr>');
			}
		}
	};

	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: app.max_price,
		values: [0, app.max_price],
		
		slide: function (event, ui) {
			
			app.min_price = ui.values[0];
			app.max_price = ui.values[1];

			app.renderList();
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});

	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

	app.renderList();

	$.ajax({
		url: 'ajax.php', 
	}).done(function (data) {
		$('#ajax_content').html(data);
	});

}());