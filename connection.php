<?php
if (strpos($_SERVER['SERVER_NAME'], "jose") !== false)
{
	$conn = mysqli_connect("myhost", "myuser", "mypass", "mydatabase")
	OR die(mysqli_connect_error());
}
else
{
	$conn = mysqli_connect("localhost", "root", "", "mydb")
	OR die(mysqli_connect_error());
}
?>