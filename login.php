<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports5.jpg">
		<?php

		# Set page title and display header section.
		$page_title = 'Login' ;
		
		# Display any error messages if present.
		if ( isset( $errors ) && !empty( $errors ) )
		{
		 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
		 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
		 echo 'Please try again or <a href="register.php">Register</a></p>' ;
		}
		
		echo "
			
			<center>
				<div class=\" middle\" style=\"margin-left: 15px\">
				
					<div class=\"header2\">
						ProApproved
					</div>
				Your one stop shop for competitive gaming equipment<br><br>
					<form action=\"login_action.php\" method=\"post\">
						<p>Email Address: <div><input type=\"email\" name=\"email\"> </div></p>
						<p>Password: <div><input type=\"password\" name=\"pass\"></div></p><br>
						<p><input type=\"submit\" value=\"Login\" ></p>
					</form>
				Don't already have an account? <a href=\"register.php\">Register</a> free today!
				</div>
			</center>";
	?>
	</body>
</html>