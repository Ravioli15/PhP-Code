
<html>
	<head>
		<style>
		
		.football {width:20px;height:20px;}
		.graphbar {background-color:red;color:white;padding:5px;margin:5px;height:30px}
		
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
	echo "In her life, $player earned $earnings million dollars <br/>";
	echo "Key=" . $player . ", Value=" . $earnings;
	echo "<br>";
}
?>

</body>
</html>