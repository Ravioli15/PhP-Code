<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports3.jpg">
		<?php # DISPLAY SHOPPING CART ADDITIONS PAGE.

		# Access session.
		session_start() ;
		
		# Redirect if not logged in.
		if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		
		# Set page title and display header section.
		$page_title = 'Cart Addition' ;
		//include ( 'includes/header.html' ) ;
		
		# Get passed product id and assign it to a variable.
		if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 
		
		# Open database connection.
		require ( 'connect_db.php' ) ;
		
		# Retrieve selective item data from 'shop' database table. 
		$q = "SELECT * FROM shop WHERE item_id = $id" ;
		$r = mysqli_query( $dbc, $q ) ;
		if ( mysqli_num_rows( $r ) == 1 )
		{
		  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
		
		  # Check if cart already contains one of this product id.
		  if ( isset( $_SESSION['cart'][$id] ) )
		  { 
		    # Add one more of this product.
		    $_SESSION['cart'][$id]['quantity']++; 
		    echo '<center><div class="middle"><p style="color:#ADADBA">Another '.$row["item_name"].' has been added to your cart</p>';
		  } 
		  else
		  {
		    # Or add one of this product to the cart.
		    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['item_price'] ) ;
		    echo '<center><div class="middle"><p>A '.$row["item_name"].' has been added to your cart</p>' ;
		  }
		}
		
		# Close database connection.
		mysqli_close($dbc);
		
		# Create navigation links.
		echo '<p><a href="shop.php">Continue Shopping</a> | <a href="cart.php">View Cart</a></p></div></center> ';
		
		# Display footer section.
		//include ( 'includes/footer.html' ) ;
		
		?>
	</body>
</html>