<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports3.jpg">
		<?php # DISPLAY COMPLETE LOGGED IN PAGE.
		
		include 'connect_db.php';
		# Access session.
		session_start() ; 
		
		# Redirect if not logged in.
		if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
		
		# Set page title and display header section.
		$page_title = 'Home' ;
		//include ( 'includes/header.html' ) ;
		
		# Display body section.
		echo "
		
		 		<center>
						<div class = \"header homebanner\">
						Welcome To ProApproved
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
				<p>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']}</p>
					<h2>You've come to the right place</h2> <hr> ProApproved is dedicated to providing you with the most highly regarded and pro-preferred computer hardware at the beginning of each new season. Whether you're in need of high grade mechanical keyboard feedback, or a high sensitivity customizable mouse, ProApproved has got you covered. Every product has been tested and tried by professional engineers and major league esports players alike to ensure they deliver only the best performance. Below, you can see our featured product for the month with a preview of the specs that you'll definitely want to be aware of before you buy. On the left side, that big blue bar you see is the site navigation menu, designed to provide quick access between different pages of our site; Because we know that quick, informed decisions have just as much value in high stakes matches as they do when searching for proper equipment. Each button will take you to a page on our site with information or examples of our products to give you comprehensive idea of what all your options are. The first button, 'Home' will always return you to the site homepage- the one you're currently on, where you can take a look at the featured product or read about the function of our site. The second button, 'Products List' will take you to our catalog where you can search for any products that we currently have in stock. You can filter your search by Brand, Price, or computer component. e.g. 'Razor, keyboards, under 50 pounds'. If you're not familiar with computer specs and you don't know exactly what you're looking for, that's fine too. The 'Recommended Sets' button will take you to a page which offers  user suggested full sets of computer equipment and user reviews. A typical set might include a keyboard, mouse, moniter, microphone, headphones, and case. The 'Hardware in Action' button offers a number of generally company endorsed videos that give you a close look at the mechanisms inside their products and what it takes to make a strong durable piece of equipment guranteed to give you an edge. And if none of that gives you a strong enough idea about what you want, take a look at our 'Full reviews'! Sponsored esports players share their experiences with the latest hardware, and give you a full in-depth look at why every product they use is pro approved.
					</div>
			
					<div class = \"middle col-lg-10 col-md-10 col-sm-3 col-xs-3\">
					<h2>Featured product</h2> <hr>
					<img class=\"productpics\" src=\"images/proteus.jpg\"><br><br><br> The Logitech proteus has been a longtime favorite of well-known LoL champs Faker and WildTurtle as they trounced their opponents on their way to challenge tier in League of Legends. With so many different opportunities for assigning different skills to different buttons, having a wide range o reactionary movements for any situation was a trivial matter.
					</div>";
		?>
	</body>
</html>