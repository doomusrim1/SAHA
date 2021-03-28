<?php
include('db/db.php');


if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM audit WHERE Id = :Id"
	);
	$result = $statement->execute(
		array(
			':Id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
