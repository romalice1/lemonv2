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
	
	// After login, change login status to "on(1)"
	public function login_status($conn, $user_id){
		$login_time = date('Y-m-d h:m:s');
		$sql = "UPDATE `user` SET `session`='1', `login_time`='$login_time' WHERE `user_id` ='$user_id'";
		@mysqli_query($conn, $sql);
	}
	
	// Logout change login status to "off(0)"
	public function logout($conn){
		$user_id = $_SESSION['user_id'];
		$logout_time = date('Y-m-d h:m:s');
		$sql = "UPDATE `user` SET `session`='0', `logout_time`='$logout_time' WHERE `user_id`='$user_id'";
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
// Starting an instance
$authenticate = new Authenticate();


