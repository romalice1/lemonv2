<?php
	//ADDING new branch
	if( isset($_POST['new_branch']) ){
		$alert = $admin->new_branch($conn, $intranet['intranet_id']);
	}
?>
<h3>
	<?php /* Intranet name */ echo $intranet['intranet_name']; ?> - Branches
</h3>
<button class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#NewBranchModal" ><span class="glyphicon glyphicon-plus"></span>New Branch</button>
 <!-- Table -->
  <table class="table table-stripedx	">
    <thead>
    	<tr>
	    	<th>#</th>
	    	<th>Branch name</th>
	    	<th>Location</th>
	    	<th>Action</th>
    	</tr>
    </thead>
    <tbody>
	<?php 	
	//resultset along with the connection string
	$result  = $admin->get_branch($conn, $intranet['intranet_id']);
	$row_count = 0; //initializing row count
	while( $row= mysqli_fetch_array( $result ) ){
		$row_count += 1;
	?>
    	<tr>
    		<td><?php echo $row_count;?></td>
    		<td class="text-capitalize"><?php echo $row['branch_name'];?></td>
    		<td><?php echo $row['branch_location'];?></td>
    		<td>
    			<a href="?view=admin&job=status_view&uid=<?php echo $row['user_id'];?>" title="Edit" alt="Edit" class="btn btn-link" >
    				<span class="glyphicon glyphicon-pencil"></span>
    			</a> 
    		</td>
    	</tr>
    	<?php } //endwhile ?>
    </tbody>
  </table>
  
 <!-- New branch Modal -->
<div class="modal fade" id="NewBranchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Branch</h4>
      </div>
      <div class="modal-body">
	<form action="?view=admin" method="POST">
	  <div class="form-group">
	    <label>Branch name</label>
	    <input name="branch_name" type="text" class="form-control" placeholder="Branch name" required>
	  </div>
	  <div class="form-group">
	    <label>Location</label>
	    <input name="location" type="text" class="form-control" placeholder="Branch location" required>
	  </div>
	  <!-- Hidden input. Important for controlling views-->
	  <input type="hidden" name="new_branch">
	  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
      </div>
    </div>
  </div>
</div>
