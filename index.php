<?php

define("API_URL", "http://secure.searstravel.ca/interview-test/index.php");

function sortHotels($a, $b) {

	return ($a{"price"} < $b{"price"}) ? -1 : 1;
}

try {

	$file = file_get_contents(API_URL);

	$hotels_list = json_decode($file, true);

	if (isset($hotels_list['error'])) {

		throw new Exception($hotels_list['error']['message']);
	}

	usort($hotels_list, "sortHotels");

	$tpl{"max_price"} = $hotels_list[count($hotels_list) - 1]['price']['hotelPrice'];
	$tpl{"hotels_list"} = json_encode($hotels_list, JSON_UNESCAPED_UNICODE);

	require "index.tpl.php";

} catch (Exception $e) {

	echo '<h2>' . $e->getMessage() . '</h2>';
}
