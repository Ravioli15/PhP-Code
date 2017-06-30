<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports4.jpg">

		<?php # DISPLAY COMPLETE PRODUCTS PAGE.

		# Access session.
		session_start() ;
		
		# Redirect if not logged in.
		if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		
		# Set page title and display header section.
		$page_title = 'Shop' ;
		//include ( 'includes/header.html' ) ;
		
		# Open database connection.
		require ( 'connect_db.php' ) ;
		
		# Retrieve items from 'shop' database table.
		$q = "SELECT * FROM shop" ;
		$r = mysqli_query( $dbc, $q ) ;
		
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
							<a href=\"account.php\"> My Account </a><br><br>
							<a href=\"shop.php\">Product List</a><br><br>
							<a href=\"home.php\">Recommended Sets</a><br><br>
							<a href=\"forum.php\">Forum</a><br><br>
							<a href=\"goodbye.php\">Logout</a><br><br>
						</div>
					</div>
					</center>
		
					<div class = \"middle col-lg-10 col-md-10 col-sm-3 col-xs-3\">
					<h2>Product Catalog</h2>
					<font size=\"+2\"><p align=\"right\"><a href=\"cart.php\">View Cart</a> </p></font>
					<div class = searchbar width=\"70%\">
					<form>
						<fieldset>
				    	<legend>Search</legend>
						<input type=\"text\" name=\"Keywords\">
						by brand
						<select name=\"Brand\">
						  <option value=\"any\" selected>Any</option>
						  <option value=\"Asus\">Asus</option>
						  <option value=\"Azza\">Azza</option>
						  <option value=\"Corsair\">Corsair</option>
						  <option value=\"Gladiator\">Gladiator</option>
						  <option value=\"Logitech\">Logitech</option>
						</select>
						component
						<select name=\"Component\">
						  <option value=\"any\" selected>Any<option>
						  <option value=\"Headphones\">Headphones</option>
						  <option value=\"Pc mouses\">Pc Mouses</option>
						  <option value=\"Keyboards\">Keyboards</option>
						  <option value=\"Screens\">Screens</option>
						  <option value=\"Microphones\">Microphones</option>
						  <option value=\"PcCases\">PC Cases</option>
						</select>
						price
						<select name=\"Price\">
						  <option value=\"any\" selected>Any</option>
						  <option value=\"Below 50\">Below 50</option>
						  <option value=\"50 to 100\">50 to 100</option>
						  <option value=\"100 to 150\">100 to 150</option>
						  <option value=\"150 to 200\">150 to 200</option>
						  <option value=\"200 to 300\">200 to 300</option>
						  <option value=\"300 to 500\">300 to 500</option>
						  <option value=\"500 to 1000\">500 to 1000</option>
						  <option value=\"1000 to 2000\">1000 to 2000</option>
						  <option value=\"Above 2000\">Above 2000</option>
						</select>
						<input type=\"submit\" value=\"search\">
						</fieldset>
					</form>";
		if ( mysqli_num_rows( $r ) > 0 )
		{
		  # Display body section.
		  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
		  {
		  	$name = $row['item_name'];
		  	$desc = $row['item_desc'];
		  	$img = $row['item_img'];
		  	$price = $row['item_price'];
		  	$id = $row['item_id'];
		  	
		    echo 
		   '<div class="col-md-6 col-sm-6">
		  		<strong>' . $name .'</strong><br>
		  		<span style="font-size:smaller">'. $desc . '</span><br>
		  		<img src='. $img .'><br>
		  		$' . $price . '<br>
		  		<a href="added.php?id='.$id.'">
		  		Add To Cart</a><br><br>
		  	</div>';
		  }
		  //echo '</tr></table>';
		  
		  # Close database connection.
		  mysqli_close( $dbc ) ; 
		}
		# Or display message.
		else { echo '<p>There are currently no items in this shop.</p>' ; }
		
		# Display footer section.
		//include ( 'includes/footer.html' ) ;
		
		?>
	</body>
</html>