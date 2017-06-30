
<html>
	<body>
	
<?php

$costaGoals = array(12,35,21,16,18);
$year = 2011;

for ($i=0; $i<5;$i++)
{
	$thisYear = $year + $i;
	$goals = $costaGoals[$i];
	echo "In $thisYear Diego Costa scored $goals goals! <br/>";
}

?>

	</body>
</html>


