<?php
	//Get document types
	$doc_type = $admin -> get_type($conn, $intranet['intranet_id']);
	
	// Get branches
	$branch = $admin -> get_branch($conn, $intranet['intranet_id']);
	
	// Get recipient roles
	$user = $admin -> get_user($conn, $intranet['intranet_id']);
	
	// New DOCUMENT
	if(isset($_FILES['new_doc_file']) === true && empty($_FILES['new_doc_file']['name']) === false) {
		$alert = $document -> new_doc($conn, $intranet['intranet_id']);
	}
	
?>
<h1 class="">New document</h1>

<!--- Displaying errors -->
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
?>

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success! </strong> <?php echo $alert['success']; ?>
</div>
<?php endif; //Done displaying error messages ?>
<!--------------------------------------------->

<hr />
<form class="form-horizontal col-md-6" enctype="multipart/form-data" method="post" >
  <div class="form-group">	  
		<label for="recipient" class="col-sm-3 control-label">Recipient*</label>
		<div class="col-sm-9">
			<select name="recipient" class="form-control" id="recipient">
				<?php 
					while( $row = mysqli_fetch_array( $user ) ):
					if( $row['user_id']== $_SESSION['user_id'] ){ continue; } 
				?>
				<option value="<?php echo $row['user_id']; ?>"  class="text-capitalize" >
					<?php echo $row['role_name']." | ".$row['firstname']." ".$row['lastname']; ?>
				</option>
				<?php endwhile; ?>
			</select>
		</div>
	</div>
	  <div class="form-group">
			<label for="branch" class="col-sm-3 control-label">Branch*</label>
			<div class="col-sm-9">
				<select name="branch" class="form-control" id="branch">
					<?php while( $row = mysqli_fetch_array( $branch ) ): ?>
						<option value="<?php echo $row['branch_id']; ?>"><?php echo $row['branch_name']; ?></option>
					<?php endwhile; ?>
				</select>
			</div>
	  </div>
	  <div class="form-group">
		<label for="doc_type" class="col-sm-3 control-label">Document type*</label>
		<div class="col-sm-9">
			<select name="doc_type" class="form-control" id="doc_type">
				<?php while( $row = mysqli_fetch_array( $doc_type ) ): ?>
				<option value="<?php echo $row['doc_type_id']; ?>"><?php echo $row['doc_type_name']; ?></option>
				<?php endwhile; ?>
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<label for="client_number" class="col-sm-3 control-label">Client Number</label>
		<div class="col-sm-9">
		  <input type="text" name="client_number" id="client_number" class="form-control"  placeholder="Optional">
		</div>
	  </div>
	  <div class="form-group">
		<label for="recipient" class="col-sm-3 control-label">File*</label>
		<div class="col-sm-9">
		  <input id="new_doc_file" class="btn btn-warning" type="file" name="new_doc_file">
		</div>
	  </div>
	<div class="form-group">
		<label for="deadline" class="col-sm-3 control-label">Description*</label>
		<div class="col-sm-9">
			<textarea id="description" name="description" class="form-control" required></textarea>
		</div>
	</div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Submit</button>
    </div>
  </div>
</form>
