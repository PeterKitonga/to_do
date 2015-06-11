<?php
session_start();
?>
<?php
require_once 'constants.php';
require_once 'connect.php';
/*------required lib files--------*/

function new_connection()
{
	$connect = new Connect();
	if($connect->connection['status'] == TRUE)
	{
		return $connect->connection['connection'];
	}else{
		return FALSE;
	}
}

function clean_data($data)
{
	if($new_connection = new_connection())
	{
		$data = $new_connection->real_escape_string($data);
	}else{
		$data = $data;
	}
	return $data;
}
function validate_email($email)
{
	if($email = filter_var($email,FILTER_SANITIZE_EMAIL))
	{
		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}	
}
function logged_in()
{
	if(isset($_SESSION['user_id']))
	{
		if(isset($_SESSION['user_id']))
		{
			return true;
		}else{
			unset($_SESSION['user_id']);
			return false;
		}	
	}else{
		return false;
	}
}

function br2nl($input){return preg_replace('/<br\\s*?\/??>/i', '', $input);}