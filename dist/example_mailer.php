<?php
require '../vendor/autoload.php';

use Mailgun\Mailgun;

// Set the recipient email address.
$recipient = "you@your-email.com";

// Instantiate the Mailgun SDK with your API credentials and define your domain. 
$mg = new Mailgun("your-mailgun-key");
$domain = "your-mailgun-domain";

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the form fields and remove whitespace.
	$name = strip_tags(trim($_POST["name"]));
	$name = str_replace(array("\r","\n"),array(" "," "),$name);
	$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
	$message = trim($_POST["message"]);

	// Check that data was sent to the mailer.
	if (empty($name)) {
		// Set a 400 (bad request) response code and exit.
		http_response_code(400);
		echo "Please enter a name.";
		exit;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// Set a 400 (bad request) response code and exit.
		http_response_code(400);
		echo "Please enter a valid email address.";
		exit;
	}

	if (empty($message)) {
		// Set a 400 (bad request) response code and exit.
		http_response_code(400);
		echo "Please enter a message.";
		exit;
	}

	// Set the email subject.
	$subject = "New contact from $name";

	// Build the email content.
	$email_content = "Name: $name\n";
	$email_content .= "Email: $email\n\n";
	$email_content .= "Message:\n$message\n";

	// Build the email headers.
	$email_headers = "From: $name <$email>";

	# Now, compose and send your message.
	$result = $mg->sendMessage($domain, array('from'    => $email, 
											'to'      => $recipient, 
											'subject' => $subject, 
											'text'    => $email_content));

	// Send the email.
	if ($result) {
		// Set a 200 (okay) response code.
		http_response_code(200);
		echo "Thank You! Your message has been sent.";
	} else {
		// Set a 500 (internal server error) response code.
		http_response_code(500);
		echo "Oops! Something went wrong and we couldn't send your message.";
	}

} else {
	// Not a POST request, set a 403 (forbidden) response code.
	http_response_code(403);
	echo "There was a problem with your submission, please try again.";
}
