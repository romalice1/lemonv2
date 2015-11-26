<?php
	//Getting user information
	$user = $admin->get_user_byId($conn, $_GET['uid']);
?>
<a href="?view=admin"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back to all users</a>
<div class="media jumbotron">
	<div class="media-left">
		<?php if($user['img_path']== NULL):?>
			<img class="img-circle media-object" src="data/user_data/avatar.png" alt="Rommy" id="user_img" style="height:100px;width:100px;"> 
    		<?php else:?>
			<img class="img-circle media-object" src="<?php echo $user['img_path'];?>" alt="Rommy" id="user_img" style="height:100px;width:100px;"> 
    		<?php endif;?>
    	</div>
	<div class="media-body text-capitalize">
		<h2 class="media-heading"><?php echo $user['firstname'].' '.$user['lastname'];  ?></h2>
		<b>Role:</b> <span <?php if($user['role_id']=='004'){ echo "class='bg-primary' style='border-radius:3px;padding:2px;' "; } ?> ><?php echo $user['role_name'];?></span> <br/>
		<b>Branch:</b> <?php echo $user['branch_name'];?> <br/>
		<span class="glyphicon glyphicon-earphone"></span> <?php echo $user['phone'];?><br/>
		<b><span class="glyphicon glyphicon-envelope"></span></b> <span class="text-lowercase"><a href="mailto:<?php echo $user['email'];?>"><?php echo $user['email'];?></a></span><br/>	
		<b>Account State: </b>
		<?php if($user['acc_status']=='1'){?> 
			<span style="background:#22AA22;color:white;padding:2px;border-radius:3px;">Active</span>
			<hr/>
			<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span>Deactivate Account</a>
			
		<?php }else{?>
			<span style="background:#C81E1E none repeat scroll 0% 0%;color:white;padding:2px;border-radius:3px;">Inactive</span>
			<hr/>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Activate Account</a>
		<?php } //endif?>
	</div>
</div>
 <form class="form-inline" action="?view=admin" method="POST">	
	<div class="form-group bg-success">
		<label for="inputPhone" class="col-sm-3 control-label">Update Role</label>
		<div class="col-sm-3">
			<select name="role_id">
				<?php 
					$role = $admin->get_role($conn);
					while($row = mysqli_fetch_array($role)):
					if($row['role_id']=='003'): // !anonymous - !admin
					else:
				?>
				<option value="<?php echo $row['role_id'];?>" <?php if($row['role_id']==$user['role_id']){ echo "selected"; }?> >
					<?php echo $row['role_name'];?>
				</option>
				<?php endif; endwhile; ?>
			</select>
		</div>
	</div>
	<div class="form-group bg-info">
		<label for="inputPhone" class="col-sm-3 control-label">Update Branch</label>
		<div class="col-sm-3">
			<select name="branch_id">
				<?php 
					$branch = $admin->get_branch($conn, $intranet['intranet_id']);
					while($row = mysqli_fetch_array($branch)):
				?>
				<option value="<?php echo $row['branch_id'];?>" <?php if($row['branch_id']==$user['branch_id']){ echo "selected"; }?> >
					<?php echo $row['branch_name'];?>
				</option>
				<?php endwhile; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<!-- hidden values -->
		<input type="hidden" name="update_user">
		<input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>" >
		
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
	</div>
</form>
