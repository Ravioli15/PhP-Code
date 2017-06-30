<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<body>
	<?php
	$percentage = "";
	
	if (isset($_POST['myscore'])) $percentage = $_POST['myscore'];
	
	if ($percentage < 30) 
	{
		echo "Clear Fail.";
	}
	else if ($percentage > 29 && $percentage < 40)
	{
		echo "Marginal Fail";
	}
	
	else if ($percentage > 39 && $percentage < 60)
	{
		echo "Pass";
	}
	
	else if ($percentage > 59 && $percentage < 70)
	{
		echo "Very Good";
	}
	
	else if ($percentage > 69 && $percentage < 80)
	{
		echo "Excellent";
	}
	
	else if ($percentage > 80)
	{
		echo "outstanding";
	}
	?>		
	</body>
</html>