<?php
require_once 'libs/core.php';
if(!logged_in()){
	header('Location: http://localhost/to_do/login.php');
}
  $query = "SELECT * FROM `items` WHERE User =  ".$_SESSION['user_id']." ORDER  BY Done ASC"; 
	if($new_connection = new_connection())
	{
	  if($result = $new_connection->query($query))
	  {
		  $rows = $result->num_rows;
	  }
	}
?>

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
		
		<link href="includes/js/sweetalert/dist/sweetalert.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="includes/css/Landing_Page_styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		
		<!-- Font Script -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
		
    </head>    
    
    <body>
	 <div class="container" id="main">
      <div class="list">
		<p class="clearfix">
			<span class="pull-left">Logged In as: <?php echo $_SESSION['username'] ?></span>
			<span class="pull-right"><a class="btn btn-danger btn-sm" href="logout.php">Logout</a></span>
		</p>
		<hr>
	   <h1 class="header">To do List.</h1>
	   <?php
			if(isset($_GET['status'],$_GET['msg'])){
		?>
			<div class="bg-<?php echo $_GET['status'];?>"><?php echo $_GET['msg']?></div>
		<?php } ?>
	   <?php if(!$rows = 0): ?>
	   
	   <ul class="items list-unstyled">
	   
	    <?php while($item = $result->fetch_array()){ ?>
	   
	     <li>
		  <span class="item<?php echo $item['Done'] ? ' done' : '' ?>"><?php echo $item['ItemName']; ?></span>
		  <?php if(!$item['Done']){ ?>
		    <span class="pull-right">
			   <a href="libs/mark.php?as=done&item=<?php echo $item['ItemID']; ?>" class="btn btn-xs btn-success">Mark as done</a>
			   <a href="libs/delete.php?item=<?php echo $item['ItemID']; ?>" class="btn btn-xs btn-danger">delete</a>
			</span>
		  <?php }else{?>
			<span class="pull-right">
			   <a href="libs/unmark.php?as=done&item=<?php echo $item['ItemID']; ?>" class="btn btn-xs btn-primary">Mark as Undone</a>
			   <a href="libs/delete.php?item=<?php echo $item['ItemID']; ?>" class="btn btn-xs btn-danger">delete</a>
			</span>
		  <?php }?>
		 </li>
		
		<?php }?>
		
	   </ul><!-- end of list-unstyled -->
	   
	   <?php else: ?>
	     <p>You haven't added any items yet.</p>
	   <?php endif; ?>
	   
	   <form class="form-horizontal item-add" action="libs/add.php" method="post">
               
        <div class="form-group">
         <div class="col-lg-12">
          <input class="form-control" name="name" placeholder="Type a new item here" type="text" autocomplete="off" required>
         </div><!-- end of col-lg-12 -->
		 <div class="col-sm-12">
		  <button class="btn btn-success" id="submitbtn" type="submit">Add <span class="glyphicon glyphicon-plus"></span></button>
		 </div><!-- end of col-sm-12 -->
        </div><!-- end of form-group -->
                
       </form>
	
	  </div><!-- end of list -->
     </div><!--end of main container-->
	 
	<!-- If no online access, include handcoded version of jQuery -->
	<script src="includes/js/jquery-1.11.2.min.js"></script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	<script src="includes/js/sweetalert/dist/sweetalert.min.js"></script>
     <?php 
		if(isset($_GET['logged_in']) && $_GET['logged_in'] == 'true')
		{
	?>
			<script>
			$(document).ready(function(){
				swal("Welcome!", "You are now logged in as <?php echo $_SESSION['username'] ?>", "success")
			});
			</script>
	<?php
		}
	 ?>
    </body>
</html>
