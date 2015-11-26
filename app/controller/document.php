<?php
/***** A file to take care of documents operations***********/

/* The $conn variable comes from app/init.php called from header.php */

class Document{
	//////////////////////////////////
	// NEW DOCUMENT
	/////////////////////////////////
	public function new_doc($conn, $intranet_id){
		$fileName = $_FILES['new_doc_file']['name']; 
		@$extn = end(explode('.', $fileName));
		$file_temp = $_FILES["new_doc_file"]["tmp_name"]; 
		$fileType = $_FILES["new_doc_file"]["type"]; 
		$fileSize = $_FILES["new_doc_file"]["size"];
		$fileErrorMsg = $_FILES["new_doc_file"]["error"];

		// Generating random document and box id
		$doc_id = $box_id = substr(md5(time()), 0, 10);
		
		$sender = $_SESSION['user_id'];
		$receiver= $_POST['recipient'];
		$branch = $_POST['branch'];
		$doc_type = $_POST['doc_type'];
		$client_number = addslashes($_POST['client_number']);
		$description = addslashes($_POST['description']);
		
		//$date_created = date('Y-m-d', strtotime('- 1 days'));
		$date_created = date('Y-m-d');

		if (!$file_temp) {
		    $error =  "The file size is probably too big! Please try again.";
		    exit();
		}
		/*
		if(!mkdir('data/documents/intranet-'.$intranet.'/branch-'.$branch , 0777)){
			mkdir('data/documents/intranet-'."$intranet".'/branch-'."$branch" , 0777);
		}

		$path = "data/documents/intranet-".$intranet."/branch-".$branch."/" . substr(md5(time()), 0, 10) . '.' . $extn;
		*/
		
		$doc_path = "data/documents/" . substr(md5(time()), 0, 10) . '.' . $extn;

		if(!move_uploaded_file($file_temp, $doc_path) ){
			$alert['fail'] =  "Unable to uplaod your file.";
			exit();
		}else{
			
			// First insert the document the put it in the box later
			$sql = "INSERT INTO `lemonv2`.`document` (`document_id`, `doc_type_id`, `document_path`, `client_id`, `branch_id`, `intranet_id`) 
			VALUES ('$doc_id', '$doc_type', '$doc_path', '$client_number', '$branch','$intranet_id') ";	
			
			if(mysqli_query($conn, $sql)){
				
				// Insert now into the box
				$sql = "INSERT INTO `lemonv2`.`box` (`box_id`, `document_id`, `doc_sender_user_id`, `doc_receiver_user_id`,`description`,`intranet_id`) 
				VALUES ('$box_id', '$doc_id', '$sender', '$receiver','$description','$intranet_id') ";
				
				if(mysqli_query($conn, $sql)){
					$alert['success'] = "Successfully submittedsss ".$fileName = $_FILES['new_doc_file']['name'];
				}else{
					$alert['fail'] = "Unable to complete the operation";
				}				
			}else{
				$alert['fail'] =  mysql_error();
			}
		}
			
		return $alert;	
	} //end new doc

	/////////////////////////////////////////////////////
	// New external document submittion
	/////////////////////////////////////////////////////
	public function new_doc_external($conn, $intranet_id){
	
		$fileName = $_FILES['new_doc_file']['name']; 
		@$extn = end(explode('.', $fileName));
		$file_temp = $_FILES["new_doc_file"]["tmp_name"]; 
		$fileType = $_FILES["new_doc_file"]["type"]; 
		$fileSize = $_FILES["new_doc_file"]["size"];
		$fileErrorMsg = $_FILES["new_doc_file"]["error"];

		// Generating random document and box id
		$doc_id = $box_id = substr(md5(time()), 0, 10);
		
		// Personal info
		@$firstname = addslashes($_POST['firstname']);
		@$lastname= addslashes($_POST['lastname']);
		$email= addslashes($_POST['email']);
		@$phone= addslashes($_POST['phone']);
		$client_number = addslashes($_POST['client_number']);
		$user_id = $doc_id;
		// Recipient info
		$branch = $_POST['branch'];
		//receiver id. 1st user whose role is receptionist from branch named '$branch'
		$receiver = mysqli_fetch_array( mysqli_query($conn, "SELECT `user_id` FROM `user` WHERE `role_id`='001' AND `branch_id`='$branch' AND `intranet_id`='$intranet_id' ") );
		$receiver = $receiver['user_id'];
		// Doc info
		$doc_type = $_POST['doc_type'];
		$description = addslashes($_POST['description']);
		$date_created = date('Y-m-d');

		if (!$file_temp) {
		    $error =  "The file size is probably too big! Please try again.";
		    exit();
		}
		/*
		if(!mkdir('data/documents/intranet-'.$intranet.'/branch-'.$branch , 0777)){
			mkdir('data/documents/intranet-'."$intranet".'/branch-'."$branch" , 0777);
		}

		$path = "data/documents/intranet-".$intranet."/branch-".$branch."/" . substr(md5(time()), 0, 10) . '.' . $extn;
		*/
		
		$doc_path = "app/data/documents/" . substr(md5(time()), 0, 10) . '.' . $extn;

		if(!move_uploaded_file($file_temp, $doc_path) ){
			$alert['fail'] =  "Unable to uplaod your file. Please try again";
			exit();
		}else{
			// The file was uploaded successfully now operations can continue...
			
			// RECORDING CLIENT INFORMATION AS ANONYMOUS USER IF NOT YET RECORDED
			$sql = "INSERT INTO `lemonv2`.`user` (`user_id`, `firstname`, `lastname`, `email`, `phone`, `function_id`, `role_id`, `intranet_id`) 
			VALUES ('$user_id', '$firstname', '$lastname', '$email', '$phone', '4', '003', '$intranet_id')";
			
			if(!mysqli_query($conn, $sql)){
				// IF the email[UNIQUE] exist already, proceed!
				$user_id = mysqli_fetch_array( mysqli_query($conn, "SELECT `user_id` FROM `user` WHERE `email`='$email' ") );
				$user_id = $user_id['user_id'];
				
				// Then create the document then put it in the box later
				$sql = "INSERT INTO `lemonv2`.`document` (`document_id`, `doc_type_id`, `document_path`, `client_id`, `branch_id`, `intranet_id`) 
				VALUES ('$doc_id', '$doc_type', '$doc_path', '$user_id', '$branch', '$intranet_id') ";	
				
				if(mysqli_query($conn, $sql)){
					
					// Insert now into the box
					$sql = "INSERT INTO `lemonv2`.`box` (`box_id`, `document_id`, `doc_sender_user_id`, `doc_receiver_user_id`, `description`, `intranet_id`) 
					VALUES ('$box_id', '$doc_id', '$user_id', '$receiver','$description', `$intranet_id`) ";
					
					if(mysqli_query($conn, $sql)==true){
						$alert['success'] = "Successfully submitted";
					}else{
						$alert['fail'] = "Unable to complete the operation";
					}				
				}else{
					$alert['fail'] =  mysql_error();
				}
			}else{
				// Do the same as if the user existed already
				$user_id = mysqli_fetch_array( mysqli_query($conn, "SELECT `user_id` FROM `user` WHERE `email`='$email' ") );
				$user_id = $user_id['user_id'];
				
				// Then create the document then put it in the box later
				$sql = "INSERT INTO `lemonv2`.`document` (`document_id`, `doc_type_id`, `document_path`, `client_id`, `branch_id`, `intranet_id`) 
				VALUES ('$doc_id', '$doc_type', '$doc_path', '$client_number', '$branch', '$intranet_id') ";	
				
				if(mysqli_query($conn, $sql)){
					
					// Insert now into the box
					$sql = "INSERT INTO `lemonv2`.`box` (`box_id`, `document_id`, `doc_sender_user_id`, `doc_receiver_user_id`, `intranet_id`) 
					VALUES ('$box_id', '$doc_id', '$user_id', '$receiver', '$intranet_id') ";
					
					if(mysqli_query($conn, $sql)){
						$alert['success'] = "Successfully submitted";
					}else{
						$alert['fail'] = "Unable to complete the operation";
					}				
				}else{
					$alert['fail'] =  mysql_error();
				}
			}
		}
			
		return $alert;	
	}
	
	/////////////////////////////
	// Get All documents by requested view
	//////////////////////////////
	public static function get_documents($conn, $view, $user_id){
		$result = null; // initiating
		
		if($view=='manager'){
			//Get all documents
			$sql = "SELECT `b`.*, `d`.*, `dt`.`doc_type_name`, `ds`.`doc_status_name`, DATE_ADD(`date_created`, INTERVAL `dt`.`doc_type_duration` DAY) AS deadline
			FROM `document` d,`box` b,`doc_type` dt, `document_status` ds
			WHERE `d`.`document_id`=`b`.`document_id` AND `dt`.`doc_type_id` = `d`.`doc_type_id` AND `d`.`doc_status_id`=`ds`.`doc_status_id`";
			
			$result = mysqli_query($conn, $sql);
		}elseif( $view=='received'){
			
			//Get document received by $user_id
			$sql = "SELECT `box`.*, `document`.*, `doc_type`.`doc_type_name`, date_format(DATE_ADD(`date_created`, INTERVAL `doc_type`.`doc_type_duration` DAY), '%D %M %Y') AS deadline
			FROM `document`,`box`,`doc_type` 
			WHERE `doc_receiver_user_id`='$user_id' 
				AND `document`.`document_id`=`box`.`document_id` AND `doc_type`.`doc_type_id` = `document`.`doc_type_id` AND `closed` = 'n'";
			
			$result = mysqli_query($conn, $sql);
		}elseif($view=='sent'){
	
			// Get documents sent by $user_id
			$sql = "SELECT `document`.*, `box`.*, `user`.`firstname`, `user`.`lastname`, `doc_status_name`, `doc_type_name`, DATE_ADD(`date_created`, INTERVAL `doc_type`.`doc_type_duration` DAY) AS deadline 
			FROM `document`,`box`, `user`, `document_status`, `doc_type`
			WHERE `doc_sender_user_id`='$user_id' AND `doc_sender_user_id`=`user_id` AND `document`.`document_id`=`box`.`document_id` AND `document_status`.`doc_status_id` = `document`.`doc_status_id` AND `doc_type`.`doc_type_id`=`document`.`doc_type_id`";
	
			$result = mysqli_query($conn, $sql);
		}elseif( $view=='closed' ){
			
			// Get all docuements closed by $user_id
			$sql = "SELECT * FROM `document`,`box` 
			WHERE `closedby_user_id`='$user_id' AND `closed`='y' AND `document`.`document_id`=`box`.`document_id`";
			
			$result = mysqli_query($conn, $sql);
		}
		
		return $result;
	}
	
	
	//////////////////////////////////
	// Updating the document
	/////////////////////////////////
	public function update_document_status($conn, $document_id){
		$new_status = $_REQUEST['new_status'];
		$observation = $_REQUEST['observation'];
		$close_doc = $_REQUEST['close_doc']; // 'y' by default
		
		if($close_doc == 'y'){
			$user_id = $_REQUEST['user_id'];
		}else{
			$user_id = null;
		}
		
		$date_updated = date('Y-m-d H:i:s');
		
		$sql = "UPDATE `document` 
				SET `doc_status_id` = '$new_status', `date_closed`='$date_updated', 
					`observation`='$observation', `closed`='$close_doc',
					`closedby_user_id` = '$user_id' 
				WHERE `document_id` = '$document_id' "; 
		
		if( mysqli_query($conn, $sql) ){
			$alert['success'] = "New status successfuly updated";
		}else{
			$alert['fail'] = "Status not updated. Please try again";
		}
		
		return $alert;
	}
}

$document = new Document();


?>
