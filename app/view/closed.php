<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<h4><span id="bigL">L</span> - Closed documents</h4>
  </div>
  <div class="panel-body">
    <p>
    	These are closed documents
    </p>
  </div>

  <!-- Table -->
  <table class="table table-striped table-hover">
    <thead>
    	<tr>
    		<th>#</th>
	    	<th>Document</th>
	    	<th>Date</th>
	    	<th>Status</th>
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
</div>
