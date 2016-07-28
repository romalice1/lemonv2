<?php
//////////////////////////////////////////////////
// THE ORDER OF FUNCTION CALLS MUST NOT BE CHANGED
//////////////////////////////////////////////////

/* Include Initialization file */
require_once("init.php");
// This variables contains the database connection
$conn = lemon_init();

// Enabling session
session_start();

/* Include the controllers */
require_once("controller/authenticate.php");
require_once("controller/document.php");
require_once("controller/manager.php");
require_once("controller/task.php");
require_once("controller/admin.php");

/** If the seesion is off, go back to login page **/
if( isset( $_SESSION['user_id'] )==false && isset( $_SESSION['role_id'] )==false ){
	$authenticate->protect();
}

//Getting the intranet name
$intranet = $admin->get_intranet($conn);

// Logging out
if( isset( $_REQUEST['logout'] )==true ){
	$authenticate->logout($conn);
}

?>

<!DOCTYPE html>
<html>
	<head>
	
		<title><?php echo $intranet['intranet_name']; ?> - Lemon</title>
		<link rel="icon" href="assets/images/lemon-logo.png" />
		<!-- Cascading style sheet-->
		<link rel='stylesheet' href='../app/assets/bootstrap/css/bootstrap.min.css' type="text/css"/>
		<link rel='stylesheet' href='../app/assets/css/layout.css' type="text/css"/>

		<!-- scripts-->
		<script src="../app/assets/js/jquery-1.11.3.min.js"></script>
		<script src="../app/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="../app/assets/js/other-scripts.js"></script>
	</head>
	<body>
	
		<?php
			/* Header section of the page */
			require("templates/header.php");
		?>
		<div class="container-fluid" id="home_content">
			<div class="col-md-2" id="page_left_navigation">
				<?php 
					/* Right navigation bar */
					require("templates/nav.php");
				?>
			</div>
			<div class="col-md-8" id="page_middle_content">
				<?php
					/* Content pages */
					/* Display each page by REQUEST[] from the controller pages.php*/
					if( isset( $_REQUEST['view'] )== true ){
						switch( $_REQUEST['view'] ){
							case "new_doc": require("view/new_doc.php"); break;
							case "received": require("view/received.php"); break;
							case "sent": require("view/sent.php"); break;
							case "closed": require("view/closed.php"); break;
							case "tasks": require("view/tasks.php"); break;
							case "settings": require("settings.php"); break;
							case "manager": require("view/manager.php"); break;
							case "admin": require("admin/home.php"); break;
							default: require("view/index.html");
						}
					}else{
						require("view/received.php");
					}
				?>
			</div>
			<div  class="col-md-2" id="page_right_adds">
				<?php require("templates/right_adds.php"); ?>
			</div>
		</div>
		<?php
			/* Footer section of the page */
			require("templates/footer.php");
		?>

	</body>
	
	<!-- Document details popup modal-->
	<div class="modal fade" id="DocumentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="DocumentDetailsModal">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="DocumentDetailsModalLabel">Document details</h4>
	      </div>
			<div class="modal-body" id="DocumentDetailsModalBody">
				<p class="text-center">
					<img src="assets/images/ajax-loader.gif" />
				</p>
		      </div>
		      
		</form>
	    </div>
	  </div>
	</div>
	<!------------------------------------------>
	
</html>
