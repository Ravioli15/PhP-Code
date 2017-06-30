<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports6.jpg">
		<?php # DISPLAY CHECKOUT PAGE.

		# Access session.
		session_start() ;
		
		# Redirect if not logged in.
		if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		
		# Set page title and display header section.
		$page_title = 'Checkout' ;
		//include ( 'includes/header.html' ) ;
		
		# Check for passed total and cart.
		if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
		{
		  # Open database connection.
		  require ('connect_db.php');
		  
		  # Store buyer and order total in 'orders' database table.
		  $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
		  $r = mysqli_query ($dbc, $q);
		  
		  # Retrieve current order number.
		  $order_id = mysqli_insert_id($dbc) ;
		  
		  # Retrieve cart items from 'shop' database table.
		  $q = "SELECT * FROM shop WHERE item_id IN (";
		  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
		  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
		  $r = mysqli_query ($dbc, $q);
		
		  # Store order contents in 'order_contents' database table.
		  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
		  {
		    $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
		    VALUES ( $order_id, ".$row['item_id'].",".$_SESSION['cart'][$row['item_id']]['quantity'].",".$_SESSION['cart'][$row['item_id']]['price'].")" ;
		    $result = mysqli_query($dbc,$query);
		  }
		  
		  # Close database connection.
		  mysqli_close($dbc);
		
		  # Display order number.
		  echo "<center>
					<div class = \"header2\" id=\"top\">
							ProApproved
					</div>
				</center>
				
				<center>
				<div class=\"menu col-lg-2 col-md-2 col-sm-2 hidden-xs\">
					<div class=\"menuheader\">
						Menu
					</div>
				<hr>
					<div class=\"pagelinks\">
						<a href=\"home.php\">Home</a><br><br>
						<a href=\"shop.php\">Product List</a><br><br>
						<a href=\"homepage.php\">Recommended Sets</a><br><br>
						<a href=\"homepage.php\">Hardware in Action</a><br><br>
						<a href=\"homepage.php\">Full Reviews</a><br><br>
						<a href=\"forum.php\">Forum</a><br><br>
						<a href=\"goodbye.php\">Logout</a><br><br>
					</div>
				</div>
				</center>
		    		<div class = \"middle col-lg-10 col-md-10 col-sm-3 col-xs-3\"><p>Thanks for your order. Your Order Number Is #".$order_id."</p></div>";
		
		  # Remove cart items.  
		  $_SESSION['cart'] = NULL ;
		}
		# Or display a message.
		else { echo "<center>
					<div class = \"header2\" id=\"top\">
							ProApproved
					</div>
				</center>
				
				<center>
				<div class=\"menu col-lg-2 col-md-2 col-sm-2 hidden-xs\">
					<div class=\"menuheader\">
						Menu
					</div>
				<hr>
					<div class=\"pagelinks\">
						<a href=\"home.php\">Home</a><br><br>
						<a href=\"shop.php\">Product List</a><br><br>
						<a href=\"homepage.php\">Recommended Sets</a><br><br>
						<a href=\"homepage.php\">Hardware in Action</a><br><br>
						<a href=\"homepage.php\">Full Reviews</a><br><br>
						<a href=\"forum.php\">Forum</a><br><br>
						<a href=\"goodbye.php\">Logout</a><br><br>
					</div>
				</div>
				</center>
								<div class = \"middle col-lg-10 col-md-10 col-sm-3 col-xs-3\"><p>There are no items in your cart.</p></div>" ; }
		
		# Display footer section.
		//include ( 'includes/footer.html' ) ;
		
		?>
	</body>
</html>