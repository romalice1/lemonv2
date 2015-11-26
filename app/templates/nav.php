<!-- All navigation items use query strings to be viewed by app/index.php -->
<div class="">
	<h4><span class="glyphicon glyphicon-dashboard"></span> Dashboard</h4>
	
	<a class="btn btn-success form-control" href="?view=new_doc"><span class="glyphicon glyphicon-plus"></span> New document</span></a>
	<p/>
	<div class="list-group">
		<a class="list-group-item <?php if($_REQUEST['view']=='received') echo 'active'?>" href="?view=received">Received<Received <span class="badge">0</span></a></li>
		<a class="list-group-item <?php if($_REQUEST['view']=='sent') echo 'active'?>" href="?view=sent">Sent <span class="badge"></span></a></li>
		<a class="list-group-item <?php if($_REQUEST['view']=='closed') echo 'active'?>" href="?view=closed">Closed <span class="badge"></span></a></li>
	</div>
	<div class="list-group">
		<a class="list-group-item <?php if($_REQUEST['view']=='tasks') echo 'active'?>" href="?view=tasks"><span class="glyphicon glyphicon-calendar"></span> My Tasks</a>
	</div>
	<h4><span class="glyphicon glyphicon-tree-deciduous"></span> Advanced</h4>
	<div class="list-group">
		<a class="list-group-item <?php if($_REQUEST['view']=='settings') echo 'active'?>" href="?view=settings"><span class="glyphicon glyphicon-cog"></span> Settings</a>
		<a class="list-group-item <?php if($_REQUEST['view']=='manager') echo 'active'?>" href="?view=manager&tab=documents"><span class="glyphicon glyphicon-flash"></span> Management</a>
		<a class="list-group-item <?php if($_REQUEST['view']=='admin') echo 'active'?>" href="?view=admin"><span class="glyphicon glyphicon-wrench"></span> Administration</a>
	</div>
</div>