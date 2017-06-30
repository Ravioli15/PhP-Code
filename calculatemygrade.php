<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><body>

<?php
$percentage = "";
if (isset($_POST['myscore'])) $percentage = $_POST['myscore'];
if ($percentage > 70) 
{
echo "Well done, you got a first.";
}
else 
{
echo "You did not get a first.";
}
?>
	
</body></html>