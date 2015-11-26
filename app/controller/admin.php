<?php
/***** A file to take care of all ADMINISTRATION operations *********/
/** Author Romalice Ishimwe **/

/* The $conn variable comes from app/init.php called from header.php */
class Admin{
	// Intranet name - Company name
	function get_intranet($conn){
		$result = mysqli_query($conn, "SELECT * FROM `intranet`");
		$intranet = mysqli_fetch_array($result);
		
		$output['intranet_name'] = $intranet['intranet_name'];
		$output['intranet_id'] = $intranet['intranet_id'];
		
		return $output;
	}
	
	////////////////////////////////
	// USERS */
	/////////////////////////////////
	public function new_user($conn, $intranet){
		// Default user function_id is 3 as 'internal'
	
		$firstname = addslashes($_POST['firstname']);
		$lastname = addslashes($_POST['lastname']);
		$email = addslashes($_POST['email']);
		$phone = addslashes($_POST['phone']);
		$role_id = addslashes($_POST['role']);
		$branch_id = addslashes($_POST['branch_id']);
		$password = addslashes($_POST['password']);
				
		// GENERATING the user_id
		$user_id = strtoupper( substr( md5( time() ), 0, 6 ) );
	
		$sql = "INSERT INTO `user`(`user_id`, `firstname`, `lastname`, `email`, `password`, `phone`, `role_id`,`branch_id`)
			VALUES('$user_id','$firstname','$lastname','$email','$password','$phone','$role_id','$branch_id') ";
	
		if( mysqli_query($conn, $sql) ){
			return "The new user was successfuly added.";
		}else{
			return "Could not add the new user! Please try again later.";
		}
	}
	
	public function get_user($conn, $intranet){
		$sql = "SELECT *, date_format(`last_login`, '%D %M, %Y %r') as `last_login` FROM `user`,`role` WHERE `user`.`role_id`=`role`.`role_id`";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	public function get_user_byId($conn, $id){
		$sql = "SELECT `user`.*, `branch`.`branch_name`, `role`.`role_name` FROM `user`,`role`,`branch` 
			WHERE 
			`user_id`='$id' AND `user`.`role_id`=`role`.`role_id` AND `user`.`branch_id`=`branch`.`branch_id`";
		$user = mysqli_fetch_array( mysqli_query($conn, $sql) );
		return $user;
	}
	
	public function update_user($conn, $uid){
		$branch = $_POST['branch_id'];
		$role = $_POST['role_id'];
		
		$sql = "UPDATE `user` SET `role_id`='$role', `branch_id`='$branch' WHERE `user_id`='$uid'";
		if( mysqli_query($conn, $sql) ){
			return "Successfully saved";
		}else{
			return "Saving failed";
		}
	}
	
	public function update_profile($conn, $user_id){
		$firstname = addslashes($_POST['firstname']);
		$lastname = addslashes($_POST['lastname']);
		$email = addslashes($_POST['email']);
		$phone = addslashes($_POST['phone']);
		
		$fileName = $_FILES['profile_pic']['name']; 
		@$extn = end(explode('.', $fileName));
		$file_temp = $_FILES["profile_pic"]["tmp_name"]; 
		$fileType = $_FILES["profile_pic"]["type"]; 
		$fileSize = $_FILES["profile_pic"]["size"];
		$fileErrorMsg = $_FILES["profile_pic"]["error"];
		
		if (!$file_temp) {
		    $alert['fail'] = "The image file is probably too big! Please try again.";
		    //exit();
		}
		
		$img_path = "data/user_data/image" . $user_id. '.' . $extn;

		if(!move_uploaded_file($file_temp, $img_path) ){
			// The image is probably not provided
			
			if(isset($_POST['newPasswd'])){
				//check old password
				$old_password = $_POST['oldPasswd'];
				$pswdquery = "SELECT COUNT(*) FROM `user` WHERE `password`='$old_password' AND `user_id`='$user_id' ";
				$oldpswd = mysqli_fetch_array(mysqli_query($conn, $pswdquery));
				
				if( $oldpswd['COUNT(*)'] != 0){
					$password = $_POST['newPasswd'];
					$sql = "UPDATE `user` SET 
						`firstname` = '$firstname', `lastname`='$lastname', `email`='$email', `password`='$password',`phone`='$phone' WHERE `user_id`='$user_id' ";
				}else{
					$sql = "UPDATE `user` SET 
						`firstname` = '$firstname', `lastname`='$lastname', `email`='$email', `phone`='$phone' WHERE `user_id`='$user_id' ";
					$alert['fail'] = "INCORRECT OLD PASSWORD! No change in PASSWORD";
				}
			}else{
				$sql = "UPDATE `user` SET 
					`firstname` = '$firstname', `lastname`='$lastname', `email`='$email', `phone`='$phone' WHERE `user_id`='$user_id' ";
			}
			if(!mysqli_query($conn, $sql)){
				$alert['fail'] = "Profile update failed";
			}else{
				$alert['success'] = "Profile was updated successfully!";
			}
		}else{
			// The image is provided and successfully uploaded.
			$sql = "UPDATE `user` SET 
				`firstname` = '$firstname', `lastname`='$lastname', `email`='$email', `phone`='$phone', `img_path` ='$img_path' WHERE `user_id`='$user_id' ";
			if(!mysqli_query($conn, $sql)){
				$alert['fail'] = "Profile update faileds";
			}else{
				$_SESSION['user_image'] = $img_path;
				$alert['success'] = "Profile update is successful!";
			}
		}
		return $alert;
	}
	
	////////////////////////////////
	// Roles 
	////////////////////////////////
	public function new_role($conn, $intranet){
		$role = addslashes($_POST['role_name']);
		$description = addslashes($_POST['description']);
		$sharing = addslashes($_POST['sharing']);
		//generating ID
		$role_id = strtoupper( substr( md5( time() ), 0, 3 ) );
		
		//starting insertion
		$sql = "INSERT INTO `role` (`role_id`, `role_name`, `shared`, `role_description`)
			VALUES('$role_id','$role','$sharing','$description') ";
	
		if( mysqli_query($conn, $sql) ){
			return "A new role was successfuly added.";
		}else{
			return "Could not save your changes! Please try again later".mysqli_error($conn);
		}
	}
	
	public function get_role($conn, $intranet){
		$sql = "SELECT * FROM `role`";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	public function update_role($conn){
		return 0;
	}
	
	public function delete_role($conn){
		return 0;
	}
	
	//////////////////////////////////
	// Statuses */
	/////////////////////////////////
	public function new_status($conn, $intranet){
		$status = addslashes($_POST['status_name']);
		$description = addslashes($_POST['description']);
		$status_id = strtoupper( substr( md5( time() ), 0, 3 ) );
		
		$sql = "INSERT INTO `document_status` (`doc_status_id`, `doc_status_name`, `doc_status_description`)
			VALUES('$status_id','$status','$description') ";
	
		if( mysqli_query($conn, $sql) ){
			return "A new status was successfuly added.";
		}else{
			return "Could not save your changes! Please try again later".mysqli_error($conn);
		}
	}
	
	public function get_status($conn, $intranet){
		$sql = "SELECT * FROM `document_status`";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	public function update_status(){
		return 0;
	}
	
	public function delete_status(){
		return 0;
	}
	
	////////////////////////////////////
	// Functions */	
	///////////////////////////////////
	public function get_function($conn){
		$sql = "SELECT * FROM `function`";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	public function update_function(){
		return 0;
	}
	
	public function delete_function(){
		return 0;
	}
	
	/////////////////////////////
	// Document types  */
	/////////////////////////////
	public function new_type($conn, $intranet){
		$type = addslashes($_POST['type_name']);
		$description = addslashes($_POST['description']);
		$type_duration = addslashes($_POST['type_duration']);
		
		//validating the number of days
		if($type_duration < 0){
			$type_duration = $type_duration*(-1);
		}
		
		$type_id = strtoupper( substr( md5( time() ), 0, 3 ) );
		
		$sql = "INSERT INTO `doc_type` (`doc_type_id`, `doc_type_name`, `doc_type_description`, `doc_type_duration`)
			VALUES('$type_id','$type','$description','$type_duration') ";
	
		if( mysqli_query($conn, $sql) ){
			return "A new status was successfuly added.";
		}else{
			return "Could not save your changes! Please try again later".mysqli_error($conn);
		}
	}
	
	public function get_type($conn, $intranet_id){
		$sql = "SELECT * FROM `doc_type` WHERE `intranet_id`='$intranet_id'; ";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	public function update_types(){
		return 0;
	}
	
	public function delete_type(){
		return 0;
	}
	
	//////////////////////////////
	// Branches */
	//////////////////////////////
	public function new_branch($conn, $intranet){
		$branch = addslashes($_POST['branch_name']);
		$location = addslashes($_POST['location']);
		
		$branch_id = strtoupper( substr( md5( time() ), 0, 3 ) );
		
		$sql = "INSERT INTO `branch` (`branch_id`, `branch_name`, `location`, `intranet_id`)
			VALUES('$branch_id','$branch_name','$location','$intranet') ";
	
		if( mysqli_query($conn, $sql) ){
			return "A new branch was successfuly added.";
		}else{
			return "Could not save your changes! Please try again later".mysqli_error($conn);
		}
	}
	
	public function get_branch($conn, $intranet){
		$sql = "SELECT * FROM `branch` WHERE `intranet_id`='$intranet' ";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	public function update_branch(){
		return 0;
	}
	
	public function delete_branch(){
		return 0;
	}
}

/////////////////////////////////
/* Creating an instance */
////////////////////////////////
$admin = new Admin();




