<?php
	error_reporting(E_ERROR | E_PARSE);

	 try{
		$emailAddress = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
		$to = "dignosloth@gmail.com";
		$subject = "This is subject";

		$message = $emailAddress;
		$message .= "<h1>This is headline.</h1>";

		$header = "From:abc@somedomain.com \r\n";
		$header .= "Cc:afgh@somedomain.com \r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";

		$retval = mail ($to,$subject,$message,$header);
		
		if( $retval == true ) {
			http_response_code(200);
			echo "Message sent successfully...";
		}else {
			http_response_code(500);
			echo "Message could not be sent...";
		}
	}
	 catch(e) {
		http_response_code(403);
		echo "Message could not be sent...";
	}
	 
?>