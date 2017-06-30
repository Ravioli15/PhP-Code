<?php # Show User account

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'account' ;
//include ( 'includes/header.html' ) ;

if (isset($_REQUEST['user_id']))
{
	$id = $_REQUEST['user_id'];
}

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve items from 'users' database table.
$q = "SELECT * FROM users WHERE user_id=$id" ;
$r = mysqli_query( $dbc, $q ) ;