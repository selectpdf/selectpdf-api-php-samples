<?php

// How to use PHP to convert a webpage to a PDF and save it to the disk

$api_endpoint = "http://selectpdf.com/api2/convert/";
$key = 'your license key here';
$test_url = 'http://selectpdf.com';
$local_file = '/path/to/file/test.pdf';

$parameters = array ('key' => $key, 'url' => $test_url);

// Sample GET

$result = @file_get_contents("$api_endpoint?" . http_build_query($parameters));

if (!$result) {	
	echo "HTTP Response: " . $http_response_header[0] . "<br/>";

	$error = error_get_last();
	echo "Error Message: " . $error['message'];
}
else {
	// Write on file
	file_put_contents($local_file, $result);
	echo "HTTP Response: " . $http_response_header[0] . "<br/>";
}

?>