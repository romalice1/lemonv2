<form id="new_user_form" class="form-horizontal" action="" method="POST">	
	<div class="form-group">
		<label for="inputFirstName" class="col-sm-2 control-label">Firstname*</label>
		<div class="col-sm-10">
			<input name="firstname" type="text" class="form-control" id="inputFirstName" placeholder="First name" required >
		</div>
	</div>
	<div class="form-group">
		<label for="inputLastName" class="col-sm-2 control-label">Lastname*</label>
		<div class="col-sm-10">
			<input name="lastname" type="text" class="form-control" id="inputLastName" placeholder="Last name" required>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPhone" class="col-sm-2 control-label">Phone</label>
		<div class="col-sm-10">
			<input name="phone" type="tel" class="form-control" id="inputPhone" placeholder="EX: +250787152156">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail" class="col-sm-2 control-label">Email*</label>
		<div class="col-sm-10">
			<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" required >
		</div>
	</div>
	<div class="form-group">
		<label for="inputPhone" class="col-sm-2 control-label">Branch*</label>
		<div class="col-sm-10">
			<select name="branch_id" class="form-control" required>
				<?php 
					$branch = $admin->get_branch($conn, $intranet['intranet_id']);
					while($row = mysqli_fetch_array($branch)):
				?>
				<option value="<?php echo $row['branch_id'];?>"><?php echo $row['branch_name'];?></option>
				<?php endwhile; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPhone" class="col-sm-2 control-label">Role*</label>
		<div class="col-sm-10">
			<select name="role" class="form-control">
				<?php 
					$role = $admin->get_role($conn);
					while($row = mysqli_fetch_array($role)):
					if($row['role_id']=='003' || $row['role_id']=='004' ): //anonymous or administrator
					else:
				?>
				<option value="<?php echo $row['role_id'];?>"><?php echo $row['role_name'];?></option>
				<?php endif; endwhile; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword2" class="col-sm-2 control-label">Password*</label>
		<div class="col-sm-10">
			<input onkeyup="validateNewUserForm();" name="password" type="password" class="form-control" id="inputPassword1" placeholder="Password">
		</div>
	</div>
	<!--- Password validation --->
	<div id="pswd_msg"></div> <!-- Validation msg goes here-->
	
	<div class="form-group">
		<label for="inputPassword2" class="col-sm-2 control-label">Confirm Password*</label>
		<div class="col-sm-10">
			<input onkeyup="validateNewUserForm();" type="password" class="form-control" id="inputPassword2" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<input type="hidden" name="new_user">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
		</div>
	</div>
</form>
