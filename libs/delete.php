<?php 
  require_once 'core.php';
  if(isset($_GET['item'])) 
  {
	  $item = trim($_GET['item']);
	  
	  if(!empty($item)) 
	  {
		if($new_connection = new_connection())
		{
			 $query = "DELETE FROM items WHERE ItemID = {$item} AND User = ".$_SESSION['user_id']." LIMIT 1";
			 if($result = $new_connection->query($query))
			 {
				$status = 'success';
				$msg = 'Item successfully deleted';
				 
				header("Location: ../index.php?status={$status}&msg={$msg}");
			}else{
				$status = 'danger';
				$msg = 'Error updating to do list';
			}
		}
	  }else{
		  $status = 'danger';
		  $msg = 'No Item added';
	  }
  }
 header("Location: ../index.php?status={$status}&msg={$msg}");
?>