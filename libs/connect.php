<?php
class Connect
{
	public $connection = array('status'=>FALSE,'connection'=>NULL);
	
	public function __construct()
	{
		$con = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
		if(!$con->connect_errno)
		{
			$this->connection['status'] = TRUE;
			$this->connection['connection'] = $con;
		}else{
			$this->connection['status'] = FASLE;
			$this->connection['connection'] = $con->connect_errno.' '.$con->connect_error;
		}
	}
}
?>