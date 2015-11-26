<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<h4><span id="bigL">L</span> - Received documents</h4>
  </div>
  <div class="panel-body">
    <p>
    	These are received documents
    </p>
  </div>
  
  <!-- Table -->
  <table class="table table-striped table-hover">
    <thead>
    	<tr>
	    	<th>#</th>
	    	<th>Document</th>
	    	<th>Deadline</th>
	    	<th>Date</th>
    	</tr>
    </thead>
    <tbody>
	<?php 	
	//resultset along with the connection string
	$result  = Document::get_documents($conn, $_GET['view'], $_SESSION['user_id']);
	$row_count = 0; //initializing row count
	while( $row= mysqli_fetch_array( $result ) ){
		$row_count += 1;
	?>
    	<tr>
    		<td><?php echo $row_count;?></td>
    		<td class="text-capitalize">
    			<!-- This trigger is controlled by a javascript function in 'app/assets/js/other-scripts.js' -->
    			<!-- The popup modal is writen at the end of index.php ( of this content page) -->
    			<a style="cursor:pointer;" title="Click for Details" onclick="documentDetails('<?php echo $row['document_id']; ?>', 'received');" data-toggle="modal" data-target="#DocumentDetailsModal">
    				<span class="glyphicon glyphicon-list-alt"></span> <?php echo $row['doc_type_name']; ?>
    			</a>
    		</td>
    		<td class="text-warning"><?php if($row['deadline'] == null ){ echo "No deadline"; } else { echo $row['deadline']; }?></td>
    		<td><?php echo $row['date']?></td>
    	</tr>
    	<?php } //endwhile ?>
    </tbody>
  </table>
</div>