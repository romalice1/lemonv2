<?php
	/* Include Initialization file */
	require_once("../init.php");
	
	// This variables contains the database connection
	$conn = lemon_init();
	
	/* Include controllers */
	require_once("../controller/document.php");	
	require_once("../controller/admin.php");
	
	//Getting the intranet name
	$intranet = $admin->get_intranet($conn);
	
	// Data Has been sent through ajax get method
	$document_id = $_REQUEST['document_id'];
	
	// Updating the document
	if( isset( $_REQUEST['doc_update'] ) ){
		$alert = $document->update_document_status($conn, $document_id);
	}
	
	//document details based on the first sender
	$sql = "SELECT `document`.*, `doc_type`.`doc_type_name`, `box`.`doc_sender_user_id`,`box`.`date`, `box`.`description`, `doc_status_name`,
					`user`.`firstname`, `user`.`lastname`, date_format(DATE_ADD(`date_created`, INTERVAL `doc_type`.`doc_type_duration` DAY), '%D %M %Y') AS deadline 
			FROM `document`,`doc_type`, `user`, `box` , `document_status`
			WHERE `document`.`document_id`='$document_id' AND `document`.`doc_type_id`=`doc_type`.`doc_type_id` 
					AND `document`.`document_id` = `box`.`document_id` AND `user`.`user_id` = `box`.`doc_sender_user_id`
					AND `document_status`.`doc_status_id`=`document`.`doc_status_id` ORDER BY `box`.`date` ASC ";
			
	$details = mysqli_fetch_array( mysqli_query($conn, $sql) );
	
	// Fetching documemnt statuses for action listing
	$action  = $admin->get_status($conn, $intranet['intranet_id']);
?>

<!------------------------->
<!--- Displaying errors -->
<!------------------------->
<?php	
if(isset($alert['fail'])):
// Throw a danger warning		
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning! </strong> <?php echo $alert['fail']; ?>
</div>
<?php
endif;
if(isset($alert['success'])):
// Success
//Now go ahead and reload the page to update changes
?>

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success! </strong> <?php echo $alert['success']; ?>
</div>
<?php endif; //Done displaying error messages ?>
<!--------------------------------------------->

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<span class="panel-title text-capitalize"><?php echo $details['doc_type_name']; ?></span>
			</div>
			<div class="col-xs-4">
				<a class="btn" target="new" href="<?php echo $details['document_path']; ?>"><span class="glyphicon glyphicon-list-alt"></span> Open</a>
			</div>
			<div class="col-sm-4">
				<a class="btn"><span class="glyphicon glyphicon-share-alt"></span> Forward</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div id="left-hand" class="col-sm-6" style="border-right:1px solid #eeeeee;">
				<h3 class="text-muted">Document Details</h3>
				<div class="row">
					<label class="col-sm-5"> Document type </label>
					<div class="col-sm-7 text-capitalize">
						<?php echo $details['doc_type_name'];?>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-5">Received on </label>
					<div class="col-sm-7 text-capitalize">
						<?php echo $details['date'];?>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-5">Created by </label>
					<div class="col-sm-7 text-capitalize">
						<?php echo $details['firstname']." ".$details['lastname'];?>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-5">Deadline </label>
					<div class="col-sm-7 text-capitalize text-warning">
						<?php if($details['deadline'] == null ){ echo "No deadline"; } else { echo $details['deadline']; } ?>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-5">Current status </label>
					<div class="col-sm-7 text-capitalize">
						<span style="background:#337AB7; border-radius:2px; padding:2px;color:#FFFFFF;"><?php echo $details['doc_status_name']; ?></span>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-5">Description </label>
					<div class="col-sm-7 text-capitalize well">
						<?php if($details['description'] == null ){ echo "---"; } else { echo $details['description']; }?>
					</div>
				</div>
			</div>
			
			<!--- UPDATING THE CURRENT STATUS-- ONLY VISIBLE IN RECIEVED MODE-->
			<?php
				if(@$_GET['show'] == 'received')
				{
			?>
				<div id="right-hand" class="col-sm-6 text-center">
					<h3 class="text-muted">Update Status</h3>
					<form class="form-horizontal" method="POST" onsubmit="return updateStatus('<?php echo $details['document_id']; ?>');">
						
						<!--hidden user id---->
						<input type='hidden' id="user_id_input" value="<?php echo @$_SESSION['user_id'];?>" >
						
						<div class="form-group">
							<label class="col-sm-5" >New status* </label>
							<div class="col-sm-7 text-capitalize">
								<select class="form-control" id="new_status_input">
									<?php 
										while( $row = mysqli_fetch_array( $action ) ):
									?>
									<option value="<?php echo $row['doc_status_id']; ?>" >
										<?php echo $row['doc_status_name']; ?>
									</option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5">Observations </label>
							<div class="col-sm-7 text-capitalize">
								<textarea id="observation_input" class="form-control" name='remarks' placeholder="Enter observations"></textarea>							
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5">Close Case Now?</label>
							<div class="col-sm-7">
								<select class="form-control" id="close_doc_select">
									<option value='n' selected>No</option>
									<option value='y'>Yes</option>
								</select>
							</div>
							<!---
							<span class="text-muted small">
								If you choose to <i>Close the case now</i>, this document will move from <b>recieved</b> box to <b>closed</b> box.
							</span>
							-->
						</div>
						<p/>
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-7 text-left">
								<button class="btn btn-success" onclick="return confirm('Are you sure to changes the status of this document? '); " ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
							</div>
						</div>
					</form>
				</div>
			<?php
				} //endif 
			?>
			<!-- DONE UPDATING THE CURRENT STATUS --->
		</div>
	</div>
</div>
