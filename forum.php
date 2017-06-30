<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="./PAstyles.css">
		<style>
		. row {
		min-height:50px;
		}
		
		.whitetext {
		color:white;
		}
		</style>
	</head>

	<body background="stylepics/esports4.jpg">
	
		<?php # DISPLAY COMPLETE FORUM PAGE.

		# Access session.
		session_start() ;
		
		# Redirect if not logged in.
		if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		
		# Set page title and display header section.
		$page_title = 'Forum' ;
		//include ( 'includes/header.html' ) ;
		
		# Open database connection.
		require ( 'connect_db.php' ) ;
		
		# Display body section, retrieving from 'forum' database table.
		$q = "SELECT * FROM forum" ;
		$r = mysqli_query( $dbc, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 )
		{
		  echo "<center>
				<div class = \"header2\" id=\"top\">
				ProApproved
				</div>		
				</center>";
		  
		  echo"	<div class = \"whitetext\">
				<b>
				<div class=\"  col-lg-3 col-md-3 col-sm-3\">
				Posted By
				</div>
				<div class=\"  col-lg-4 col-md-4 col-sm-4\">
				Subject
				</div>
				<div class=\"  col-lg-5 col-md-5 col-sm-5\">
				Message
				</div>
				</b></div><br>";
		  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
		  {
		    echo "<div class= \" middle col-lg-12 row \"><div class=\" col-lg-3 col-md-3 col-sm-3\">
				". $row['first_name'] ." ". $row['last_name'] . "<br>". $row['post_date']."
		  		</div>".
		     "<div class=\"col-lg-4 col-md-4 col-sm-4\"> 
				". $row['subject'] . "
				</div>"
		    . "<div class=\" col-lg-5 col-md-5 col-sm-5\">" 
		  	. $row['message'] . "
		    	</div></div>";
		  }
		   
		}
		else { echo "<p>There are currently no messages.</p>" ; }
		
		# Create navigation links.
		echo "<p class=\"col-lg-5\"><a href=\"post.php\">Post Message</p>  <p class=\"col-lg-10\"></a><a href=\"shop.php\">Shop</a> | <a href=\"home.php\">Home</a> | <a href=\"goodbye.php\">Logout</a></p>" ;
		
		# Close database connection.
		mysqli_close( $dbc ) ;
		  
		# Display footer section.
		//include ( 'includes/footer.html' ) ;
		
		?>
	</body>
</html>