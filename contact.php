<?php
/*
Template Name: Contact Page
*/
	
	if(isset($_POST['email'])) {
		header('Content-type: application/javascript');
		$email = $_POST['email'];

		// validate email
		if(!filter_var($email['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = 'contact_email';
		}
		// validate name
		if(empty($email['name'])) {
			$errors[] = 'contact_name';
		}
		// validate message
		if(empty($email['message'])) {
			$errors[] = 'contact_message';
		}

		// error out
		if(isset($errors)) {
			header("HTTP/1.0 500 Internal Server Error");
			echo json_encode(array(
				'errors' => $errors
			));
		} else {
			header("HTTP/1.0 200 OK");

			$filepath = get_template_directory() . '/email.csv';

			if($email['subscribe'] && !strpos(file_get_contents($filepath), $email['email'])) {
				file_put_contents($filepath, "{$email['email']},", FILE_APPEND);
			}

			$to = 'jpspens@gmail.com';
			$subject = $email['subject'];
			$message = $email['message'];
			$headers = "From: admin@spaceadvocates.com\r\nReply-To: {$email['email']}\r\n";
			
			echo json_encode(array(
				'sent' => mail($to, $subject, $message, $headers)
			));
		}

		die();
	}

?>

<?php get_header(); ?>

<h1>Contact Us</h1>

<div class="row">
	<div class="small-12 large-9 columns" id="contact_form">
		<label for="contact_name">Name*</label>
		<input type="text" id="contact_name" placeholder="Name" />

		<label for="contact_email">Email*</label>
		<input type="text" id="contact_email" placeholder="Email" />

		<label for="contact_subject">Subject</label>
		<input type="text" id="contact_subject" placeholder="Subject" />

		<label for="contact_message">Message*</label>
		<textarea id="contact_message" placeholder="Message"></textarea>

		<label for="contact_updates" id="contact_updates_label">I would like to receive email updates</label>
		<input type="checkbox" id="contact_updates" checked="true" />
		
		<button class="submit btn-red">send message</button>
	</div>
</div>

<?php get_footer(); ?>