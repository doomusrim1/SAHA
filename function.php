<?php

function get_total_all_records()
{
	include('db/db.php');
	$statement = $connection->prepare("SELECT * FROM audit");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>