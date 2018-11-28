<?php

// Sendgrid
require 'vendor/autoload.php';

// Variables
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

// if( isset($name) && isset($email) ) {

	// Avoid Email Injection and Mail Form Script Hijacking
	// $pattern = "/(content-type|bcc:|cc:|to:)/i";
	// if( preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $message) ) {
	// 	exit;
	// }

	// Email will be send
	$request_body = json_decode('{
	  "personalizations": [
	    {
	      "to": [
	        {
	          "email": "arenaimport@gmail.com"
	        }
	      ],
	      "subject": "Hello World from the SendGrid PHP Library!"
	    }
	  ],
	  "from": {
	    "email": "leonardobotelho@gmail.com"
	  },
	  "content": [
	    {
	      "type": "text/plain",
	      "value": "Hello, Email!"
	    }
	  ]
	}');

	$apiKey = getenv('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');
	$sg = new \SendGrid($apiKey);

	// $headers = "From: $name <$email>\r\n";
	// $headers .= 'MIME-Version: 1.0' . "\r\n";
	// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$response = $sg->client->mail()->send()->post($request_body);
	echo $response->statusCode();
	echo $response->headers();
	echo $response->body();

// }

?>
