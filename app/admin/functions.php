<h3>System functions</h3>
These are system deafult settings. You can not change anything, it's just for your knowledge.
 <!-- Table -->
  <table class="table table-striped">
    <thead>
    	<tr>
	    	<th>#</th>
	    	<th>Function name</th>
	    	<th>Description</th>
    	</tr>
    </thead>
    <tbody>
	<?php 	
	//resultset along with the connection string
	$result  = $admin->get_function($conn);
	$row_count = 0; //initializing row count
	while( $row= mysqli_fetch_array( $result ) ){
		$row_count += 1;
	?>
    	<tr>
    		<td><?php echo $row_count;?></td>
    		<td class="text-capitalize" ><?php echo $row['function_name'];?></td>
    		<td><?php echo $row['function_description'];?></td>
    	</tr>
    	<?php } //endwhile ?>
    </tbody>
  </table>
