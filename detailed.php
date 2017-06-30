<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="PAstyles.css">
	</head>
	
	<body background="stylepics/esports4.jpg">
	
	<?php
	
	if (isset($_REQUEST['ID']))
	{
		
	$ID = $_REQUEST['ID'];
	
	include 'connection.php';
	
	$sql = "SELECT * FROM products WHERE Id=$ID";
	$result = mysqli_query($conn, $sql);
	
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
					<a href=\"homepage.php\">Home</a><br><br>
					<a href=\"products.php\">Product List</a><br><br>
					<a href=\"homepage.php\">Recommended Sets</a><br><br>
					<a href=\"homepage.php\">Hardware in Action</a><br><br>
					<a href=\"homepage.php\">Full Reviews</a><br><br>
				</div>
			</div>
		</center>";
	
	if ($result)
	{
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			
			$id = $row["ID"];
			$brand = $row["Brand"];
			$model = $row["Model"];
			$img = $row["ImageLoc"];
			$descr =  $row["Description"];
			
		echo "<div class=\"middle col-lg-10 col-md-10 col-sm-3 col-xs-3\"><center>$brand <h3>$model</h3><img class=\"detailedpics\"src=\"$img\"></center><br>$descr<div>";
		}	
	}
	
	
	
	}
	else
	{
		echo "<center><div class=\"header\">Sorry! The item you are looking for has been removed does not exists.<br><a href=\"products.php\">Back to Products<div></a></center>";
	}
	?>
	</body>
</html>