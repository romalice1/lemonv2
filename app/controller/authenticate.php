<?php
//////////////////////////////////
// Authentiating
//////////////////////////////////

class Authenticate {
	// Check user existence [ email is unique ] and account status
	public function user_check($conn, $username, $password){
		$sql = "SELECT `user`.*, `role`.`role_name` FROM `user`, `role` WHERE `email`='$username' AND `password`='$password' AND `user`.`role_id` = `role`.`role_id`";
		$result = mysqli_fetch_array( mysqli_query($conn, $sql) );
		// return account status: 1 or 0
		return $result;
	}
	
	// Logout
	public function logout($conn){
		$last_login = date('Y-m-d h:m:s');
		$user_id = $_SESSION['user_id'];
		
		$sql = "UPDATE `user` SET `last_login` ='$last_login' WHERE `user_id` = '$user_id'";
		// If not executed or not, everything else continues
		mysqli_query($conn, $sql);
		
		session_destroy();
		header("Location: /lemonv2/");
	}
	
	// Protect agains unauthorized access
	public function protect(){
		if( isset( $_SESSION['user_id'] )==true && isset( $_SESSION['role_id'] )==true ){
			header("Location: /lemonv2/app/");
		}else{
			header("Location: /lemonv2/");
		}
	}
	
	
}
// Creating an instance
$authenticate = new Authenticate();


