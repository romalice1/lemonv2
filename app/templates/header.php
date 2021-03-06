<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="" class="navbar-brand" alt="Brand" href="#"><?php echo $intranet['intranet_name']; ?> <span id="bigL">L</span> </a>
      
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
    		<li><a href><span title="Messages" class="glyphicon glyphicon-comment"></span></a><li>
    		<li><a href><span title="Notifications" class="glyphicon glyphicon-bell"></span></a><li>
    	</ul>
      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search people,documents,...">
          <button><span class="glyphicon glyphicon-search"></span></button>
        </div>
      </form>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<img class="img-circle media-object" src="<?php if($_SESSION['user_image']=='') { ?>data/user_data/avatar.png<?php } else{ echo $_SESSION['user_image']; }?>" alt="<?php echo $_SESSION['user_name'];?>" Title="<?php echo $_SESSION['user_name'];?>" id="user_img" style="height:50px;width:50px;"> 
          </a>
          <ul class="dropdown-menu">
            <li><a href="?view=settings">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
