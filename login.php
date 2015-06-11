<?php require 'layouts/header.php';?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title>To-Do</title>
		<meta name="description" content="A simple to-do list app for planning activities of the day">
		
        <!--Include the correct character set-->
        <meta charset="utf-8">
        
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="includes/css/LoginIndex_styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		
		<!-- Font Script -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
		
    </head>    
    
    <body>
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
	 
	 <!-- If no online access, include handcoded version of jQuery -->
	 <script>window.jQuery || document.write('<script src="includes/js/jquery-1.11.2.min.js"><\/script>')</script>
	
	 <!-- Bootstrap JS -->
	 <script src="bootstrap/js/bootstrap.min.js"></script>
	
	 <!-- Custom JS -->
	 <script src="includes/js/script.js"></script>
    
    </body>
</html>
        
<?php require 'layouts/footer.php';?>