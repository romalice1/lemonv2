<?php
/** Don't throw errors to the user **/
error_reporting();

/* Initializing the application */

/* Author: Romalice Ishimwe */
/* Phone: +250 787 362 618 */
/* Email: romalice91@gmail.com */
/* Starting init..*/


/* Initializing lemon */
function lemon_init(){
	
	if(!@require_once("config/database.php")){
		@require_once("app/config/database.php");
	}

	// connecting to database
	$conn = mysqli_connect( $host, $user, $password );
	if( !$conn ){
		echo "The configuration details are not matching the server details. Please review your configuration settings or contact the system provider.";
		exit();
	}
	// selecting the database
		if(!$db = mysqli_select_db($conn, $database ) ){
			echo "The database seems not to exist";
		}
	// return the conn variable for the entire system;
	
	return $conn;

}

?>
