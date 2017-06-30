<?php
if (strpos($_SERVER['SERVER_NAME'], "jose") !== false)
{
	$dbc = mysqli_connect("myserver", "myuser", "mypass", "mydatabase")
	OR die(mysqli_connect_error());
}
else
{
	$dbc = mysqli_connect("localhost", "root", "", "site_db") 
	OR die(mysqli_connect_error());
}


# Set encoding to match PHP script encoding.
mysqli_set_charset( $dbc, 'utf8' ) ;
?>