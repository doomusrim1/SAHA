<?php
include('db/db.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM audit 
		WHERE Id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["code"] = $row["code"];
        $output["firstname"] = $row["firstname"];
        $output["Lastname"] = $row["Lastname"];
        $output["Amount"] = $row["Amount"];
        $output["Balance"] = $row["Balance"];
        $output["Track"] = $row["Track"];
        $output["Fname"] = $row["Fname"];
	}
	echo json_encode($output);
}
?>