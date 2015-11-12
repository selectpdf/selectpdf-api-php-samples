<?php

// How to convert a webpage to a PDF with a POST request and save it to the disk

$api_endpoint = "http://selectpdf.com/api2/convert/";
$key = 'your license key here';
$test_url = 'http://selectpdf.com';
$local_file = '/path/to/file/test.pdf';

$parameters = array ('key' => $key, 'url' => $test_url);

// Sample POST

// for options use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($parameters),
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
	// Write on file
	file_put_contents($local_file, $result);
	echo "HTTP Response: " . $http_response_header[0] . "<br/>";
}

?>