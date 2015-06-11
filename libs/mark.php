<?php 
require_once 'core.php';
  
if(isset($_GET['as'], $_GET['item']))
{
	  $as = $_GET['as'];
	  $item = $_GET['item'];
	  
	  if(!empty($as) && !empty($item))
	  {
		  if($as == 'done')
		  {
			if($new_connection = new_connection())
			{
			  $query = "UPDATE items SET done = 1 WHERE itemID = $item and User = ".$_SESSION['user_id'];
			  if($result = $new_connection->query($query))
			  {
				 $status = 'success';
				 $msg = 'List successfully updated';
				 
				 header("Location: ../index.php?status={$status}&msg={$msg}");
			  }else{
				$status = 'error';
				$msg = 'Error updating to do list';
			  }
			}
		  }
	  }else{
		  header('Location: ../index.php');
	  }	  
}