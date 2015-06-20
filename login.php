<?php require 'layouts/header.php';?>

     <div class="well well-sm" id="header_well"><h1>SimpleDo</h1><i>A simple to do app to manage your day's work.</i></div>
         <div class="container" id="main">
		 <div class="well col-sm-12" id="form_well">
		  <ul class="nav nav-tabs">
		    <li role="presentation" class="active"><a href="#">Login</a></li>
		  </ul>
		  <div class="alert alert-error">
			  <?php require "libs/login.php";?>
		  </div>
		    <form class="form-horizontal" action="" method="post">   
			     <div class="form-group">
				  <label class="col-lg-2 control-label" for="inputName">UserName</label>
				  <div class="col-lg-10">
				   <input class="form-control" id="inputName" placeholder="Username..." type="text" name="UserName">
				  </div><!-- end of col-lg-10 -->
			     </div><!-- end of form-group -->
			     <div class="form-group">
				  <label class="col-lg-2 control-label" for="inputPassword">Password</label>
				  <div class="col-lg-10">
					  <input class="form-control" id="inputPassword" placeholder="Password..." type="password" name="Password">
				  </div><!-- end of col-lg-10 -->
				  <div class="col-sm-2">
				      <button class="btn btn-success" id="submitbtn" type="submit">Log In</button>
			      </div>
			     </div><!-- end of form-group -->      
		    </form>
		  </div><!-- end of well -->
	
	 </div><!-- end of main container -->
	 
<?php require 'layouts/footer.php';?>
