<html>
	<head>
		<style>
		img {
		width:200px; height:200px;
		}
		p {text-align:center;}
		div {float:left;border: 1px solid;margin:5px;padding:5px;}
		</style>	
	</head>
	
	<body>
	<?php

	include 'connection.php';
	
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0)
	{
		// output data of each row
		while($row = $result->fetch_assoc()) {
			
			$id = $row["ID"];
			$brand = $row["Brand"];
			$model = $row["Model"];
			$img = $row["ImageLoc"];

			echo "<div><a href=\"detailed.php\"><img src='$img'/></a><p> $brand $model </p></div>$id";
	
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	
	?>
	
	
	
	</body>
</html>