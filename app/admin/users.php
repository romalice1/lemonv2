<?php 
	//ADDING NEW USER
	if( isset($_POST['new_user']) )
	{
		$alert = $admin->new_user($conn);
	}
	
	//updating user
	if( isset($_POST['update_user']) )
	{
		$alert = $admin->update_user($conn, $_POST['user_id']);
	}
	
	// GETING ALL USERS
	$result  = $admin->get_user($conn, $intranet['intranet_id']);
	
?>
<h3>Users: <?php echo mysqli_num_rows($result);?></h3>
<div class="">
	<?php if(isset($_POST['new_user']) || isset($_POST['update_user']) ) :?>
		<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong> <?php echo @$alert; ?>.
		</div>
	<?php endif; ?>
	<div class="col-sm-6">
		Filter
	</div>
	<div class="col-sm-6">
		<button class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#newUserModal"><span class="glyphicon glyphicon-plus"></span> New user</button>
	</div>
</div>
<!---- VIEW & UPDATE USER -->
<?php if(isset($_GET['job']) && $_GET['job']=='user_edit')
{ 
	// Display a single user information
	require("admin/user_update.php");
} 
// Done VIEW & UPDATE USER
else 
{//DIsplay all users table 
?>
 <!-- Table -->
  <table class="table table-hover table-striped">
    <tbody>
	<?php 	
	//resultset along with the connection string
	$row_count = 0; //initializing row count
	while( $row= mysqli_fetch_array( $result ) )
	{
		$row_count += 1;
	?>
    	<tr class="text-capitalize">
    		<td><?php echo $row_count;?></td>
    		<td>
    			<?php echo $row['firstname']." ".$row['lastname'];?> <br/>
    			<span class="text-muted"><?php echo $row['role_name'];?></span>
    		</td>
    		<td>
    			<?php if($row['session']=='1'): ?> 
    				<span title="Online" alt="Online" class="glyphicon glyphicon-cloud text-success" style='color:#24D828;'></span>
    				<small>Online
    			<?php else: ?>
    				<span class="glyphicon glyphicon-cloud"></span> <small class='text-muted'>Last active <?php echo $row['logout_time']; endif; ?></small>
    		</td>
    		<td>
    			<a href="?view=admin&job=user_edit&uid=<?php echo $row['user_id'];?>" title="Edit" alt="Edit" class="btn btn-link" >
    				<span class="glyphicon glyphicon-pencil"></span>
    			</a> 
    		</td>
    	</tr>
	<?php 
	} //endwhile 
	?>
    </tbody>
  </table>
<?php 
} //endif for switching between single user view and all users list 
?>
  <!--- USER operations MODALS---->

<!-- New user Modal --->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newUserModalLabel">New user</h4>
      </div>
      <div class="modal-body">
        <?php require_once("admin/new_user.php"); ?>
      </div>
    </div>
  </div>
</div>
