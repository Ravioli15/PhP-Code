<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports6.jpg">
		<?php # DISPLAY SHOPPING CART PAGE.

		# Access session.
		session_start() ;
		
		# Redirect if not logged in.
		if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		
		# Set page title and display header section.
		$page_title = 'Cart' ;
		//include ( 'includes/header.html' ) ;
		
		# Check if form has been submitted for update.
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
		{
		  # Update changed quantity field values.
		  foreach ( $_POST['qty'] as $item_id => $item_qty )
		  {
		    # Ensure values are integers.
		    $id = (int) $item_id;
		    $qty = (int) $item_qty;
		
		    # Change quantity or delete if zero.
		    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
		    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
		  }
		}
		
		# Initialize grand total variable.
		$total = 0; 
		
		# Display the cart if not empty.
		if (!empty($_SESSION['cart']))
		{
		  # Connect to the database.
		  require ('connect_db.php');
		  
		  # Retrieve all items in the cart from the 'shop' database table.
		  $q = "SELECT * FROM shop WHERE item_id IN (";
		  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
		  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
		  $r = mysqli_query ($dbc, $q);
		
		  # Display body section with a form and a table.
		  echo "<center>
					<div class = \"header2\" id=\"top\">
							ProApproved
					</div>
				</center>
									  		
		  		<div class=\"middle\"><form action=\"cart.php\" method=\"post\"><font size=+2>Items in your cart:</font><br><br>";
		  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
		  {
		  	$name = $row['item_name'];
		  	$desc = $row['item_desc'];
		  	$img = $row['item_img'];
		  	$price = $row['item_price'];
		  	$id = $row['item_id'];
		  	
		    # Calculate sub-totals and grand total.
		    $subtotal = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];
		    $total += $subtotal;
		
		    # Display the row/s:
		    echo "<u>{$name}</u><br>
		    <img class=\"productpics\" src= \"$img\"><br><br><br>
		    Quantity: <input type=\"text\" size=\"3\" name=\"qty[{$id}]\" value=\"{$_SESSION['cart'][$id]['quantity']}\"><br>
		    Price = ".number_format ($subtotal, 2)."<br><br><br><br><br><br><br><br>";
		  }
		  
		  # Close the database connection.
		  mysqli_close($dbc); 
		  
		  # Display the total.
		  echo '<input type="submit" name="submit" value="Update My Cart"><br>Total = '.number_format($total,2).'<br></form> 
		    <font size="+2"><b><a href="checkout.php?total='.$total.'">Checkout</a> | <a href=\"shop.php\">Back to Shop</a></b></font></div>';
		}
		else
		# Or display a message.
		{ echo '<center><div class="middle"><p>Your cart is currently empty. <br>
		  		<a href="shop.php">Back to shop</a></p></div></center>' ; }
	
		
		# Display footer section.
		//include ( 'includes/footer.html' ) ;
		
		?>
	</body>
</html>