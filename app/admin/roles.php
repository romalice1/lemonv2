<?php
	//ADDING new user role
	if( isset($_POST['new_role']) ){
		$alert = $admin->new_role($conn);
	}
	
	//resultset along with the connection string
	$result  = $admin->get_role($conn, $intranet['intranet_id']);
?>
<h3>User Roles</h3>
<?php if(isset($_POST['new_role']) ) :?>
	<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?php echo @$alert; ?>.
	</div>
<?php endif; ?>
<button class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#NewRoleModal" ><span class="glyphicon glyphicon-plus"></span>New Role</button>
<!-- Table -->
  <table class="table table-striped">
    <thead>
    	<tr>
	    	<th>#</th>
	    	<th>Role name</th>
	    	<th>Description</th>
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
    		<td><?php echo $row['role_name'];?></td>
    		<td><?php echo $row['role_description'];?></td>
    		<td>
    			<a href="?view=admin&job=status_view&uid=<?php echo $row['user_id'];?>" title="Edit" alt="Edit" class="btn btn-link" >
    				<span class="glyphicon glyphicon-pencil"></span>
    			</a> 
    		</td>
    	</tr>
    	<?php } //endwhile ?>
    </tbody>
  </table>


 <!-- New status Modal -->
<div class="modal fade" id="NewRoleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New User Role</h4>
      </div>
      <div class="modal-body">
	<form action="?view=admin" method="POST">
	  <div class="form-group">
	    <label>Role name</label>
	    <input name="role_name" type="text" class="form-control" placeholder="New role name" required>
	  </div>
	  <div class="form-group">
	    <label>Sharing option</label>
	    <select name="sharing" class="form-control">
	    	<option value="y">Shared</option>
	    	<option value="n">Not Shared</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label>Description</label>
	    <textarea class="form-control" name="description" placeholder="Description..."></textarea>
	  </div>
	  <!-- Hidden input -->
	  <input type="hidden" name="new_role">
	  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
      </div>
    </div>
  </div>
</div>
