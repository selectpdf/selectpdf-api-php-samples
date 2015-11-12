<?php

// How to convert an HTML string to a PDF with a POST request and stream it to the user in the browser

$api_endpoint = "http://selectpdf.com/api2/convert/";
$key = 'your license key here';
$raw_html = "Test HTML string";

$parameters = array ('key' => $key, 'html' => $raw_html);

// Sample POST

// for options use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($parameters),
    ),
);

$context  = stream_context_create($options);
$result = @file_get_contents($api_endpoint, false, $context);

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