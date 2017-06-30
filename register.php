<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
		
		<style>
		.container {
			margin:10px;
		}
		</style>
	</head>
	
	<body background="stylepics/esports4.jpg">
		<?php # DISPLAY COMPLETE REGISTRATION PAGE.

		# Set page title and display header section.
		$page_title = 'Register' ;
		//include ( 'includes/header.html' ) ;
		
		# Check form submitted.
		if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
		{
		  # Connect to the database.
		  require ('connect_db.php'); 
		  
		  # Initialize an error array.
		  $errors = array();
		 		
		  # Check for a first name.
		  if ( empty( $_POST[ 'first_name' ] ) )
		  { $errors[] = 'Enter your first name.' ; }
		  else
		  { $fn = mysqli_real_escape_string( $dbc, trim( $_POST[ 'first_name' ] ) ) ; }
		
		  # Check for a last name.
		  if (empty( $_POST[ 'last_name' ] ) )
		  { $errors[] = 'Enter your last name.' ; }
		  else
		  { $ln = mysqli_real_escape_string( $dbc, trim( $_POST[ 'last_name' ] ) ) ; }
		  
		  #Check for a gender.
		  if ( empty( $_POST[ 'gender' ] ) )
		  { $errors[] = 'Enter your gender.' ; }
		  else
		  { $gender = mysqli_real_escape_string( $dbc, trim( $_POST[ 'gender' ] ) ) ; }
		  
		  #Check for a preferred Operating System
		  if ( empty( $_POST[ 'pos' ] ) )
		  { $errors[] = 'Enter your preferred OS.' ; }
		  else
		  { $pos = mysqli_real_escape_string( $dbc, trim( $_POST[ 'pos' ] ) ) ; }
		
		  # Check for an email address:
		  if ( empty( $_POST[ 'email' ] ) )
		  { $errors[] = 'Enter your email address.'; }
		  else
		  { $e = mysqli_real_escape_string( $dbc, trim( $_POST[ 'email' ] ) ) ; }
		
		  # Check for a password and matching input passwords.
		  if ( !empty($_POST[ 'pass1' ] ) )
		  {
		    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
		    { $errors[] = 'Passwords do not match.' ; }
		    else
		    { $p = mysqli_real_escape_string( $dbc, trim( $_POST[ 'pass1' ] ) ) ; }
		  }
		  else { $errors[] = 'Enter your password.' ; }
		  
		  # Check if email address already registered.
		  if ( empty( $errors ) )
		  {
		    $q = "SELECT user_id FROM users WHERE email='$e'" ;
		    $r = @mysqli_query ( $dbc, $q ) ;
		    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
		  }
		  
		  # On success register user inserting into 'users' database table.
		  if ( empty( $errors ) ) 
		  {
		    $q = "INSERT INTO users (first_name, last_name, gender, pos, email, pass, reg_date) VALUES ('$fn', '$ln', '$gender', '$pos', '$e', SHA1('$p'), NOW(), )";
		    $r = @mysqli_query ( $dbc, $q ) ;
		    
		    if ($r)
		    { echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>'; }
		    else {
		    	mysqli_error($dbc);
		    	exit();
		    }
		  
		    # Close database connection.
		    mysqli_close($dbc); 
		
		    # Display footer section and quit script:
		   // include ('includes/footer.html'); 
		    exit();
		  }
		  # Or report errors.
		  else 
		  {
		    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
		    foreach ( $errors as $msg )
		    { echo " - $msg<br>" ; }
		    echo 'Please try again.</p>';
		    # Close database connection.
		    mysqli_close( $dbc );
		  }  
		}
		?>
		<div class="header2">
			ProApproved
		</div>
		<center><div class="container middle">
		<!-- Display body section with sticky form. -->
		<h1>Register</h1>
		<form action="register.php" method="post">
		
		
		<p>First Name: <div class="col-md-12"><input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> </div><br>
		<p>Last Name: <div class="col-md-12"><input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"></p></div><br>
				<p> Gender:<br>
		<select name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</p>
		<p>Preferred OS: <div class="col-md-12"><input type="text" name="pos" size="20" value="<?php if (isset($_POST['pos'])) echo $_POST['pos']; ?>"></p></div><br>
		<p>Email Address: <div class="col-md-12"><input type="email" name="email" size="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p></div><br>
		<p>Password: <div class="col-md-12"><input type="password" name="pass1" size="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"></p></div><br>
		Confirm Password: <div class="col-md-12"><input type="password" name="pass2" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"></p></div><br>
		<p><input type="submit" value="Register"></p>
		</form>
		Already a member? <a href="login.php">login</a>
		<?php 
		
		# Display footer section.
		//include ( 'includes/footer.html' ) ; 
		
		?>
		</div></center>
	</body>
</html>