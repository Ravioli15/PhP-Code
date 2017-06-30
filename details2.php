<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
img {
	height:150px;
}
</style>
<?php # DISPLAY COMPLETE PRODUCTS PAGE.
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Shop' ;
include ( 'includes/header.html' ) ;

$id = $_GET['ID'];

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve items from 'shop' database table.
$q = "SELECT * FROM shop WHERE itemid=$id" ;
$r = mysqli_query( $dbc, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )

{
	echo "<img src='someimg'/><br/> description";
	
	
}
?>