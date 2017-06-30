
<html>
	<head>
		<style>
		
		.tennisball {width:15px;height:15px;}
		.graphbar {background-color:bbaad7;color:white;padding:5px;margin:5px;height:30px;width:100%}
		
		</style>
	</head>
<body>

<?php

$tennisPlayersEarnings = array(
		"WILLIAMS, SERENA"=>84,
		"SHARAPOVA, MARIA"=>36,
		"WILLIAMS, VENUS"=>35,
		"AZARENKA, VICTORIA"=>28,
		"RADWANSKA, AGNIESZKA"=>26
);

foreach($tennisPlayersEarnings as $player => $earnings) {
	//echo "In her life, $player earned $earnings million dollars <br/>";
	echo "<div  class= \"graphbar\">";
	echo drawTennisBalls($earnings);
	echo "</div>";
	
}

function drawTennisBalls($numberOfTimes)
{
	for ($i=0;$i<$numberOfTimes;$i++)
	{
		echo "<img src='tennisball.jpg' class='tennisball'/>";
	}
}
?>

</body>
</html>