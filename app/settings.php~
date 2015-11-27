<?php
	if(isset($_POST['update_profile']) && isset($_SESSION['user_id'])){
		$alert = $admin->update_profile($conn, $_SESSION['user_id']);
	}
	
	// GEt user info
	require_once("controller/admin.php");
	$user =$admin->get_user_byId($conn, $_SESSION['user_id']);
?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">
		<div class="media">
			<div class="media-left">
				<img class="img-circle media-object" src="<?php if($user['img_path']=='') { ?>data/user_data/avatar.png<?php } else{ echo $user['img_path']; }?>" alt="<?php echo $user['firstname'];?>" Title="<?php echo $user['firstname'];?>" id="user_img" style="height:50px;width:50px;"> 
				</div>
			<div class="media-body">
				<h4 class="media-heading"><?php echo $user['firstname']." ".$user['lastname']; ?></h4>
				<?php echo $user['role_name'];?>
			</div>
		</div>
	</div>
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
	<?php endif; //Done displaying login messages ?>
	<!--------------------------------------------->
	
	<div class="panel-body">
		<form action="?view=settings" enctype="multipart/form-data" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
						<input type="text" name="firstname" class="form-control" value="<?php echo $user['firstname']; ?>" placeholder="Firstname">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
						<input type="text" name="lastname" class="form-control" value="<?php echo $user['lastname']; ?>" placeholder="Lastname" />
					</div>
				</div>    	
			</div>
			<div class="row form-group">
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
						<input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" placeholder="youremail@example.com" />
					</div>	
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
						<input type="tel" name="phone" class="form-control" value="<?php echo $user['phone']; ?>" placeholder="Phone number" />
					</div>
				</div>    	
			</div>
			<hr/>
			<div class="row form-group well" style="padding:3px;" >
				<div class="col-sm-6">
					<label>Change your Profile Picture</label>
					<input type="file" name="profile_pic" placeholder="Upload a picture" />
				</div>   
				<div class="col-sm-6">
					<a class="btn btn-danger" role="button" data-toggle="collapse" href="#changePasswd" aria-expanded="false" aria-controls="collapseExample" >
						<span class="glyphicon glyphicon-lock"></span> Change your password
					</a>
					<div class="collapse" id="changePasswd">
					  <div class="well">
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-">*</span></div>
							<input type="password" name="oldPasswd" class="form-control" placeholder="Old Password" />
						</div>
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
							<input id="inputPassword1"  type="password" name="newPasswd" class="form-control" placeholder="New Password" />
							<span id="pswd_msg"></span>
						</div>
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
							<input id="inputPassword2" onkeyup="validateNewUserForm();" type="password" name="confirmNewPasswd" class="form-control" placeholder="Confirm New Password" />
						</div>	
					  </div>
					</div>
				</div>
			</div>
			
			<div class="row form-group col-xs-3">
				<button class="btn btn-info" title="Save changes"><span class="glyphicon glyphicon-floppy-disk"></span> <span class="hidden-xs">Save</span></button>
			</div>
			<div class="row form-group col-xs-3">
				<a class="btn btn-warning" title="Discard changes"><span class="glyphicon glyphicon-ban-circle"></span> <span class="hidden-xs">Discard</span></a>
			</div>
			<input type="hidden" name="update_profile">
		</form>
	</div>
</div>
