<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>

	<body background="stylepics/esports4.jpg">
	
		<?php
		
		include 'connection.php';
		
		$sql = "SELECT * FROM products";
		$result = $conn->query($sql);
		
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
						<a href=\"products.php\">Product List</a><br><br>
						<a href=\"homepage.php\">Recommended Sets</a><br><br>
						<a href=\"homepage.php\">Hardware in Action</a><br><br>
						<a href=\"homepage.php\">Full Reviews</a><br><br>
					</div>
				</div>
				</center>
		
				<div class = \"middle col-lg-10 col-md-10 col-sm-3 col-xs-3\">
				<h2>Product Catalog</h2> 
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
				/*<img src= \"images/corsair.jpg\">
				The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!The corsair is a really dang cool mouse. Its got the yellow, the black and a full doalpad on the side so that if you start thinking about your mother while you play you can call her right up!
				</div>";*/
		
		if ($result)
		{
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				
				$id = $row["ID"];
				$brand = $row["Brand"];
				$model = $row["Model"];
				$img = $row["ImageLoc"];
				$descr =  $row["Description"];
						
				echo "$brand <a href= \"detailed.php?ID=$id\"><h3>$model</h3><br></a> <a href= \"detailed.php?ID=$id\"><img class=\"productpics\" src=\"$img\" /><br><div></div></a><br>$descr<br><br><br><br><br><br><br><br><br><br>";
		
			}
		} 
		else 
		{
			echo "problem with the query";
		}
		echo "<center><a href=\"#top\">Back to top</center>";
		
		?>
	</body>
</html>
