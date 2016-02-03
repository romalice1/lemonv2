<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
  	<h4><a class="btn" href="?view=admin"><span id="bigL">L</span> - Administration</h4></a>
  </div>
	<div class="panel-body">
	<!-- Nav tabs -->
	  <ul class="nav nav-tabs tabs-justify" role="tablist">
	    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Users</a></li>
	    <li role="presentation"><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab">Roles</a></li>
	    <li role="presentation"><a href="#statuses" aria-controls="statuses" role="tab" data-toggle="tab">Statuses</a></li>
	    <li role="presentation"><a href="#functions" aria-controls="functions" role="tab" data-toggle="tab">Functions</a></li>
	    <li role="presentation"><a href="#doc_types" aria-controls="doc_types" role="tab" data-toggle="tab">Document types</a></li>
	    <li role="presentation"><a href="#branches" aria-controls="branches" role="tab" data-toggle="tab">Branches</a></li>
	  </ul>
	  
	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane fade in active" id="home"><?php require_once("users.php"); ?></div>
	    <div role="tabpanel" class="tab-pane fade in" id="roles"><?php require_once("roles.php"); ?></div>
	    <div role="tabpanel" class="tab-pane fade in" id="statuses"><?php require_once("statuses.php"); ?></div>
	    <div role="tabpanel" class="tab-pane fade in" id="functions"><?php require_once("functions.php"); ?></div>
	    <div role="tabpanel" class="tab-pane fade in" id="doc_types"><?php require_once("doc_types.php"); ?></div>
	    <div role="tabpanel" class="tab-pane fade in" id="branches"><?php require_once("branches.php"); ?></div>
	  </div>
	</div>
</div>
