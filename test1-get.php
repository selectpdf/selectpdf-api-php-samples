<?php

// How to convert a webpage to a PDF and stream it to the client browser as an attachment

$api_endpoint = "http://selectpdf.com/api2/convert/";
$key = 'your license key here';
$test_url = 'http://selectpdf.com';

$parameters = array ('key' => $key, 'url' => $test_url);

// Sample GET

$result = @file_get_contents("$api_endpoint?" . http_build_query($parameters));

if (!$result) {	
	echo "HTTP Response: " . $http_response_header[0] . "<br/>";

	$error = error_get_last();
	echo "Error Message: " . $error['message'];
}
else {
	// set HTTP response headers
	header("Content-Type: application/pdf");
	header("Content-Disposition: attachment; filename=\"test.pdf\"");

	echo ($result);
}
?>