<?php 

  require_once 'core.php';
  
  if(isset($_POST['name'])) 
  {
	  $name = trim($_POST['name']);
	  
	  if(!empty($name)) 
	  {
		if($new_connection = new_connection())
		{
			 $query = "INSERT INTO items (itemID,ItemName,User,Done,Created) VALUES (NULL,'{$name}',".$_SESSION['user_id'].",0,NOW())";
			 if($result = $new_connection->query($query))
			 {
				$status = 'success';
				$msg = 'List successfully updated';
				 
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