<!-- User Tasks -->
<div class="panel panel-info"> 
  <div class="panel-heading"><span class="glyphicon glyphicon-bullhorn"></span> My Tasks</div>
  <div class="panel-body">
    <p>
    	<a href="#new_task" class='btn' data-toggle="modal" data-target="#myModal">New <span class="badge">0</span></a>
    	<a class='btn' data-toggle="modal" data-target="#myModal">Started <span class="badge">0</span></a>
    	<a class='btn' data-toggle="modal" data-target="#myModal">Finished <span class="badge">0</span></a>
    </p>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">My Tasks</h4>
      </div>
      <div class="modal-body">
        <h4 id="new_task">New tasks</h4>
        Here
        <hr/>
        <h4>Sarted tasks</h4>
        
        Here
        <hr/>
        <h4 id="finished_task">Finished tasks</h4>
        Here
        <hr/>
      </div>
      <div class="modal-footer">
      	Show all tasks
      </div>
    </div>
  </div>
</div>

<!-------------------------->

<!-- Symbols & Meaning -->
<div class="panel panel-warning"> 
  <div class="panel-heading">Symbols & Meaning</div>
  <div class="panel-body">
    <p class="text-muted">
    	<span class="glyphicon glyphicon-warning-sign"></span> Deadline soon <br/>
    	<span class="glyphicon glyphicon-warning-sign text-danger"></span> Deadline expired</br>
    </p>
  </div>
</div>


