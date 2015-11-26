<?php
	//ADDING new document type
	if( isset($_POST['new_document_type']) ){
		$alert = $admin->new_type($conn, $intranet['intranet_id']);
	}
	
	// Getting all document types
	$result  = $admin->get_type($conn, $intranet['intranet_id']);
?>
<h3>Document types</h3>
<?php if(isset($_POST['new_document_type']) ):?>
	<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?php echo @$alert; ?>.
	</div>
<?php endif; ?>
<button class="btn btn-success" style="float:right;"  data-toggle="modal" data-target="#NewDocumentTypeModal" ><span class="glyphicon glyphicon-plus"></span>New Type</button>
 <!-- Table -->
  <table class="table table-striped">
    <thead>
    	<tr>
	    	<th>#</th>
	    	<th>Type name</th>
	    	<th>Description</th>
	    	<th>Duration</th>
	    	<th>Action</th>
    	</tr>
    </thead>
    <tbody>
	<?php 	
	$row_count = 0; //initializing row count
	while( $row= mysqli_fetch_array( $result ) ){
		$row_count += 1;
	?>
    	<tr>
    		<td><?php echo $row_count;?></td>
    		<td class="text-capitalize"><?php echo $row['doc_type_name']?></td>
    		<td><?php echo $row['doc_type_description']?></td>
    		<td><?php if($row['doc_type_duration']==NULL || $row['doc_type_duration']==0 ){ echo "Unlimited"; } else{ echo $row['doc_type_duration']." days"; }?></td>
    		<td>
    			<a href="?view=admin&job=status_view&uid=<?php echo $row['user_id'];?>" title="Edit" alt="Edit" class="btn btn-link" >
    				<span class="glyphicon glyphicon-pencil"></span>
    			</a> 
    		</td>
    	</tr>
    	<?php } //endwhile ?>
    </tbody>
  </table>
  
   <!-- New document type Modal -->
<div class="modal fade" id="NewDocumentTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Document Type</h4>
      </div>
      <div class="modal-body">
	<form action="?view=admin" method="POST">
	  <div class="form-group">
	    <label>Type name</label>
	    <input name="type_name" type="text" class="form-control" placeholder="Document type name" required>
	  </div>
	  <div class="form-group">
	    <label>Type duration. <small class="text-muted">Leave blank if duration is unlimited</small></label>
	    <input name="type_duration" type="number" class="form-control">
	  </div>
	  <div class="form-group">
	    <label>Description</label>
	    <textarea class="form-control" name="description" placeholder="Description..."></textarea>
	  </div>
	  <!-- Hidden input -->
	  <input type="hidden" name="new_document_type">
	  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
      </div>
    </div>
  </div>
</div>
