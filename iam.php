<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><body>

<?php
	$uname = "";
if (isset($_POST['myname'])) $uname = $_POST['myname'];
echo "hello " . $uname;
	?>
	
</body></html>