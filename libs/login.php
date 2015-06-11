<?php
  if (isset($_POST['Password'],$_POST['UserName']))
  {
	  $UserName =($_POST['UserName']);
	  $Password =($_POST['Password']);
	  if(!empty($UserName) && !empty($Password))
	  {
		if($new_connection = new_connection())
		{
			$query = "SELECT * ";
			  $query .= "FROM users ";
			  $query .= "WHERE UserName = '{$UserName}' AND  Password = '{$Password}'";
			  
				if($result = $new_connection->query($query))
				{
					//var_dump($result);
					$numrows = $result->num_rows; //use mysqli not mysql
				  
					  if ($numrows!==0)
					  {
						  while($row = $result->fetch_array())  //mysqli_fetch_row() fetches normal array, not associate array. use mysqli_fetch_array*()
						  { 
							  $id = $row['UserID'];
							  $dbusername = $row['UserName'];
							  $dbpassword = $row['Password'];
						  }
						  
						  if ($UserName == $dbusername && $Password == $dbpassword){
							  $_SESSION['user_id'] = $id;
							  $_SESSION['username'] = $dbusername;
							  header('Location: http://localhost/to_do/index.php?logged_in=true');
						  }else{
							  echo '<p class="bg-danger">Your password is incorrect</p>';
							 }
					  }else{
						  echo '<p class="bg-danger">Invalid login: That User does not exist</p>';
					  }
				}else{
					echo $new_connection->connect_error;
				}
		}
	  }else{
		  echo '<p class="bg-danger">Please enter a UserName and Password...</p>';
	  }
  }