<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports4.jpg">
		<?php # DISPLAY COMPLETE LOGGED OUT PAGE.

		# Access session.
		session_start() ;
		
		# Redirect if not logged in.
		if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		
		# Set page title and display header section.
		$page_title = 'Goodbye' ;
		include ( 'includes/header.html' ) ;
		
		# Clear existing variables.
		$_SESSION = array() ;
		  
		# Destroy the session.
		session_destroy() ;
		
		# Display body section.
		echo "<div class=\"middle\">
				<h1>Logged Out</h1>
				<p>Thanks for stopping by! Don't forget to check back for next week's feaured product.</p>
				<p><a href=\"login.php\">Back to Login</a></p>
				</div>";
		
		# Display footer section.
		//include ( 'includes/footer.html' ) ;
		
		?>
	</body>
</html>