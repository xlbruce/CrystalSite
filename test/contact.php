<?php
	
	echo "<script>alert('enviando email...');</script>";


	$your_email = 'gilsonsvieira@hotmail.com'; // Your email address
	$subject = 'Email from your contact form'; // Email subject
	
	$name = isset($_POST['name']) && $_POST['name'] ? $_POST['name'] : ''; // Visitor Name 
	$email = isset($_POST['email']) && $_POST['email'] ? $_POST['email'] : ''; // Visitor Email
	$message = isset($_POST['message']) && $_POST['message'] ? $_POST['message'] : ''; // Visitor Message
	$website = isset($_POST['website']) && $_POST['website'] ? $_POST['website'] : ''; // Visitor Message
	
	$full_message = 'Website: '.$website. "\r\n\r\n Message:".$message;

	if($name && $email && $message)
	{
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" .
		'Reply-To: '.$email.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		$headers .= 'Content-type: text/plain; charset=UTF-8' . "\r\n";
			
		//------------------------------------------------
		// Send out email to site admin
		//------------------------------------------------
		if(mail($your_email, $subject, $full_message, $headers)) {
			echo "DEBUG: <br>";
			echo "Name: $name; Email: $email; Message: $message; Site: $Website; Full message: $full_message; Headers: $headers;";
			die("success");
		}
			
		else
			die("error");
	}
	else
	{
		die("error");
	}
	
?>
