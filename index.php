<!DOCTYPE html>
<?php
/* Include the Initialization file */
require_once("app/init.php");

/* Initializing lemon */
$conn = lemon_init();

/////////////////////////////////
// Get intranet details
////////////////////////////////
function get_intranet($conn){
	$result = mysqli_query($conn, "SELECT * FROM `intranet`");
	$intranet = mysqli_fetch_array($result);
	
	return $intranet;
}
// Intranet
$intranet = get_intranet($conn);

// New documnet submittion
if(isset($_POST['external_doc_submit'])){
	require_once("app/controller/document.php");
	$alert = $document->new_doc_external($conn, $intranet['intranet_id']);
}


//////////////////////////////////////
// Getting doc_types and branch lists
// For use in document submission
//////////////////////////////////////
require_once("app/controller/admin.php");
$doc_type = $admin->get_type($conn, $intranet['intranet_id']);
$branch = $admin->get_branch($conn, $intranet['intranet_id']);



// Enabling session
session_start();

/* Authentication Controller */
require_once("app/controller/authenticate.php");

/** If the seesion is "on" continue to home page **/
if( isset( $_SESSION['user_id'] )==true && isset( $_SESSION['role_id'] )==true ){
	$authenticate->protect();
}

/*** Authenticating ****/
if( isset($_POST['login']) && empty($_POST['username'])==false ){
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	// Checking user existence
	if ($user = $authenticate->user_check($conn, $username, $password)){
		// if the above statement runs successfully...
		
		if($user['acc_status']=='0'){
			// Account is not active
			$alert['fail'] = "Account not activated. Please contact the systekm administrator ";
		
		}else {
			// Account is active... then continue 
			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['user_image'] = $user['img_path'];
			$_SESSION['role_id'] = $user['role_id'];
			$_SESSION['function_id'] = $user['function_id'];
			$_SESSION['user_name'] = $user['email'];
			
			/* Description of User Functions /
			/								/
			/	1	System administrator	/
			/	2	System Auditor/Manager	/
			/								/
			/	****************************/
			
			// Set session status to "on" in the DB
			$authenticate->login_status($conn, $_SESSION['user_id']);
			header("Location: app/");
		}
	}else{
		$alert['fail'] = "Username and password are incorect. Please try again or contact your system administrator";
	}
}

?>

<html>
	<head>
		<title>Welcome to Lemon - <?php echo $intranet['intranet_name']; ?></title>
		<link rel="icon" href="app/assets/images/lemon-logo.png">
		<!-- Cascading style sheet-->
		<link rel='stylesheet' href='app/assets/css/welcome.css' type="text/css">
		<link rel='stylesheet' href='app/assets/bootstrap/css/bootstrap.min.css' type="text/css"/>
	
		<!-- scripts-->
		<script src="app/assets/js/jquery-1.11.3.min.js"></script>
		<script src="app/assets/bootstrap/js/bootstrap.js"></script>
		<script src="app/assets/js/other-scripts.js"></script>
	</head>
		
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
		    		<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" alt="Lemon" Title="Lemon" href=""><?php echo $intranet['intranet_name'];?> <span id="bigL">L</span></a>
				</div>
				<div class="navbar-right">
					<button class="btn btn-info btn-sm navbar-btn" data-toggle="modal" data-target="#TraceModal" >Trace</button>
					
					<!-- Login trigger modal -->
					<button type="button" class="btn btn-primary btn-sm navbar-btn" data-toggle="modal" data-target="#myModal">
					  Login
					</button>
				</div>
		  </div><!-- /.container-fluid -->
		  
		  <!---- DISPLAY LOGIN MESSAGES ---->
		  <div class="text-center">
			<?php	
			if(isset($alert['success'])):
			// Just a warning message		
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Congratulations! </strong> <?php echo $alert['success']; ?>
			</div>
			<?php
			endif;
			if(isset($alert['fail'])):
			// A big red message
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning! </strong> <?php echo $alert['fail']; ?>
			</div>
			<?php endif; //Done displaying login messages ?>
		</div>
		</nav>
		
		
	<!------------------------------------------------------->	
	<!----- Modals -->
	<!------------------------------------------------------->
	
	<!-- LOGIN FORM MODAL-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><span id="bigL">L</span> - Login</h4>
	      </div>
	      <form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" role="signin" method="POST" >
		      <div class="modal-body">
				<div class="form-group">
					<div class="input-group">
						<label class="sr-only" for="exampleInputEmail3">Email address</label>
						<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
						<input type="email" name="username" class="form-control" id="exampleInputEmail3" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="sr-only" for="exampleInputPassword3">Password</label>
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
						<input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password" required>
					</div>
				</div>
				<a class="btn">Forgot your password?</a>
		      </div>
		      <input type="hidden" name="login">
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-primary">Sign in</button>
		      </div>
		</form>
	    </div>
	  </div>
	</div>
	<!--- END LOGIN FORM MODAL -->
	<!------------------------------------------->
	
	<!-- Trace form modal-->
	<div class="modal fade" id="TraceModal" tabindex="-1" role="dialog" aria-labelledby="TraceModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="TraceModalLabel">Track your document</h4>
	      </div>
	      <form class="form-inline" action="app/" role="signin">
		      <div class="modal-body">
				<label>Enter your email</label>
				<input class="form-control" type="email" name="track_email" placeholder="youremail@example.com">
				<button type="submit" class="btn btn-primary">Trace</button>
		      </div>
		      
		</form>
	    </div>
	  </div>
	</div>
	<!---- End trace form modal ---->
	<!------------------------------------------>
	
	<!-- SEND DOCUMENT MODAL -->
	<div class="modal fade" id="SendDocModal" tabindex="-1" role="dialog" aria-labelledby="SendDocModalLabel">
		<div class="modal-dialog" role="document">59
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="SendDocModalLabel"><?php echo $intranet['intranet_name']; ?> new document</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" enctype="multipart/form-data" role="signin" action="" method="POST">
						<input type="hidden" name="external_doc_submit">
						<input type="hidden" name="intranet_id" value="<?php echo $intranet['intranet_id']; ?>">
						<p class="text-center">
							<a class="btn btn-danger" id="toggleInputFields">I am new here</a>
						</p>
						<div class="form-group" id="inputFname">
							<label for="recipient" class="col-sm-3 control-label">First name*</label>
							<div class="col-sm-9">
								<input id="inputFname" type="text" name="firstname" class="form-control"  placeholder="First name">
							</div>
						</div>
						<div class="form-group" id="inputLname" >
							<label for="recipient" class="col-sm-3 control-label">Last name*</label>
							<div class="col-sm-9">
								<input type="text" name="lastname" class="form-control"  placeholder="Last name" >
							</div>
						</div>
						<div class="form-group">
							<label for="recipient" class="col-sm-3 control-label">Your email*</label>
							<div class="col-sm-9">
								<small class="text-info">
									<span class="glyphicon glyphicon-info-sign"></span>You will use this email to track your documents
								</small><br/>
								<input type="email" name="email" class="form-control"  placeholder="you@example.com" required>
							</div>
						</div>
						
						<div class="form-group" id="inputPhone">
							<label for="recipient" class="col-sm-3 control-label">Phone*</label>
							<div class="col-sm-9">
								<input type="tel" name="phone" class="form-control"  placeholder="+250785614283" >
							</div>
						</div>
						<div class="form-group">
							<label for="client_number" class="col-sm-3 control-label">Roll Number</label>
							<div class="col-sm-9">
								<input type="text" name="client_number" class="form-control"  placeholder="If any...">
							</div>
						</div>
						<hr/>
						<div class="form-group">
							<label for="doc_type" class="col-sm-3 control-label">Document category*</label>
							<div class="col-sm-9">
								<select name="doc_type" class="form-control" id="doc_type" required>
									<?php
									while( $row= mysqli_fetch_array( $doc_type ) ):
									?>
										<option value="<?php echo $row['doc_type_id'] ?>"><?php echo $row['doc_type_name'] ?></option>
									<?php
									endwhile;
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="col-sm-3 control-label">Branch*</label>
							<div class="col-sm-9">
								<small class="text-warning"><?php echo $intranet['intranet_name'];?> Branch receiving your document</small><br/>
								<select name="branch" class="form-control" id="doc_type" required>
									<?php
									while( $row= mysqli_fetch_array( $branch ) ):
									?>
										<option value="<?php echo $row['branch_id'] ?>"><?php echo $row['branch_name'] ?></option>
									<?php
									endwhile;
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="recipient" class="col-sm-3 control-label">File*</label>
							<div class="col-sm-9">
								<input type="file" name="new_doc_file" multiple required>
							</div>
						</div>
						<div class="form-group">
							<label for="deadline" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-9">
								<textarea name="description" class="form-control" size="255"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--- Done send document modal --->
	<!--------------------------------------------->
	
	<div class="container-fluid">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="app/assets/images/office-worker.jpg" alt="..." style="max-height:700px;width:100%;">
		      <div class="carousel-caption">
			<div class="jumbotron text-center">
				<h1><span id="bigL">L</span>emon Documents </h1>
				<p>
					Paperless Document Processing
				</p>
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#SendDocModal">
					<span class="glyphicon glyphicon-send"></span> Request a document
				</button>
			</div>
		      </div>
		    </div>
		    
		    <div class="item">
		      <img src="app/assets/images/paperless.jpg" alt="Paperless document management" style="max-height:700px;width:100%;">
		      <div class="carousel-caption">
			<div class="jumbotron text-center">
				<h1><span id="bigL">L</span> No more trailing papers</h1>
				<p>
					Save money with a paperless technology
				</p>
				<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#SendDocModal">
					<span class="glyphicon glyphicon-send"></span> Request a document
				</button>
			</div>
		      </div>
		    </div>
		    
		    <div class="item">
		      <img src="app/assets/images/home-worker.jpg" alt="..." style="max-height:700px;width:100%;">
		      <div class="carousel-caption">
			<div class="jumbotron text-center">
				<h1><span id="bigL">L</span> Anytime Access</h1>
				<p>
					Access your documents anytime anywhere
				</p>
				<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#SendDocModal">
					<span class="glyphicon glyphicon-send"></span> Request a document
				</button>
			</div>
		      </div>
		    </div>
		    
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
	<!-- <?php require("app/templates/footer.php");?> -->
	<div class="container text-center">
		Powered by Wavysoft &copy; 2016.
	</div>
	</body>
</html>
