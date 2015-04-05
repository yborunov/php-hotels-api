<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Hotels list</title>

	<meta name="author" content="mailto:yuri@borunov.com">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	<style>
	
		body {
			padding: 0 20px 0 20px;
		}
		#slider-range {
			width: 50%;
		}

		#hotels td,
		#hotels th {
			padding: 5px;
		}
	</style>

</head>
<body>

	<h1>Hotels list</h1>

	<p>
		<label for="amount">Price range:</label>
		<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
	</p>
	 
	<div id="slider-range"></div>
	<br>

	<table id="hotels" border="1">
		<tr>
			<th>Hotel Name</th>
			<th>Hotel Start Rating Url</th>
			<th>Hotel Price</th>
			<th>Hotel Promo Price</th>
			<th>Hotel Promo Description</th>
		</tr>
	</table>
	<br>
	<div id="ajax_content"></div>

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

	<script>

		window.app = {};

		(function() {

			var app = {
				min_price: 0,
				max_price: <?= $tpl{"max_price"}; ?>
			};

			app.hotelsList = <?= $tpl{"hotels_list"}; ?>;

			window.app = app;
		}());

	</script>

	<script src="app.js"></script>

</body>
</html>