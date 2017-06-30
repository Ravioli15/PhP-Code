
<html>
	<head>
		<style>
		
		.football {width:20px;height:20px;}
		.graphbar {background-color:red;color:white;padding:5px;margin:5px;height:30px}
		
		</style>
	</head>
<body>

<?php

$costaGoals = array(12,35,21,16,18);
$year = 2011;

for ($i=0; $i<5;$i++)
{
	$thisYear = $year + $i;
	$goals = $costaGoals[$i];
	echo $thisYear;
	drawGoals($goals);
	for ($j=0;$j<$goals;$j++)
	echo $goals<"br/>";
}

function drawGoals($numberOfTimes)
{
	for ($i=0;$i<$numberOfTimes;$i++)
	{
		echo "<img src='football.jpg' class='football'/>";
	}
}
?>

</body>
</html>