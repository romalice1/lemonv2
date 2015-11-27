<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<h4><span id="bigL">L</span> - Management</h4>
  </div>
  <div class="panel-body">
	<ul class="nav nav-pills text-right">
	  <li role="presentation" <?php if($_GET['tab']=='documents'){ echo "class='active'";}?> ><a href="?view=manager&tab=documents">Documents</a></li>
	  <li role="presentation" <?php if($_GET['tab']=='tasks'){ echo "class='active'";}?> ><a href="?view=manager&tab=tasks">Tasks</a></li>
	</ul>
  </div>
  
  <!-- Viewing documents -->
  <?php if($_GET['tab']!='tasks'){ ?>
  <!-- Table -->
  <table class="table table-hover table-striped">
    <tbody>
    <?php 	
	//resultset along with the connection string
	$result  = Document::get_documents($conn, $_GET['view'], null);	
	$row_count = 0; //initializing row count
	while( $row= mysqli_fetch_array( $result ) ){
		$row_count += 1;
    ?>
    	<tr>
    		<td><?php echo $row_count; ?></td>
    		<td>
    			<!-- This trigger is controlled by a javascript function in 'app/assets/js/other-scripts.js' -->
    			<!-- The popup modal is writen at the end of index.php ( of this content page) -->
    			<a style="cursor:pointer;" title="Click for Details" onclick="documentDetails('<?php echo $row['document_id']; ?>', '<?php echo $_GET['view'];?>');" data-toggle="modal" data-target="#DocumentDetailsModal">
    				<span class="glyphicon glyphicon-list-alt"></span> <?php echo $row['doc_type_name']; ?>
    			</a>
    		</td>
    		<td class="small text-warning" >Exp. <?php echo $row['deadline']; ?></td>
    		<td>
    			<?php echo $row['doc_status_name']; ?> 
    			
    			<?php if($row['closed']=='y'){ $txt="Closed"; $cssbg="#D82C2C";} else { $txt="Open"; $cssbg="#178E05"; } ?>
				<span style="background:<?php echo $cssbg; ?>; border-radius:8px 8px 0px 0px; padding:2px;color:#FFFFFF;">
					<?php echo $txt; ?>
				</span>
    		</td>
    	</tr>
    	<?php } //endwhile ?>
    </tbody>
  </table>
  <?php } // end if for viewing documents ?>
  <!--- Done viewing documents ---------->
  
  <!-- Viewing tasks -->
  <?php if($_GET['tab']=='tasks'){ ?>
  <!-- Table -->
  <table class="table">
    <thead>
    	<tr>
    		<th>#</th>
	    	<th>Task</th>
	    	<th>Deadline</th>
	    	<th>Status</th>
	    	<th>Creator</th>
    	</tr>
    </thead>
    <tbody>
    <?php 	
	//resultset along with the connection string
	$result  = Document::get_documents($conn, $_GET['view'], 'uid');	
	$row_count = 0; //initializing row count
	while( $row= mysqli_fetch_array( $result ) ){
		$row_count += 1;
    ?>
    	<tr>
    		<td><?php echo $row_count; ?></td>
    		<td></td>
    		<td></td>
    		<td></td>
    	</tr>
    	<?php } //endwhile ?>
    </tbody>
  </table>
  <?php } // end displaying all tasks ?>
  <!-- Done viewing tasks -->
  
</div>
