<?php
// check log in status

include('db/db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM audit ";
if (isset($_POST["search"]["value"])) {
	$query .= 'WHERE code LIKE "%' . $_POST["search"]["value"] . '%" ';
}
if (isset($_POST["order"])) {
	$query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
	$query .= 'ORDER BY Id DESC ';
}
if (isset($_POST["length"]) != -1) {
	$query .= 'LIMIT ' . empty($_POST["start"]) . ', ' . isset($_POST["length"]);
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
if ($filtered_rows > 0) {
	foreach ($result as $row) {
		$sub_array = array();
		$sub_array[] = $row["date"];
		$sub_array[] = $row["code"];
		$sub_array[] = $row["firstname"];
		$sub_array[] = $row["Lastname"];
		$sub_array[] = $row["Amount"];
		$sub_array[] = $row["Balance"];
		$sub_array[] = $row["Track"];
		$sub_array[] = $row["Fname"];
		$sub_array[] = '<button type="button" name="update" id="' . $row["Id"] . '" class="btn btn-warning btn-xs update">แก้ไข</button>';
		$sub_array[] = '<button type="button" name="delete" id="' . $row["Id"] . '" class="btn btn-danger btn-xs delete">ลบ</button>';
		$data[] = $sub_array;
	}
}
$output = array(
	"draw"				=> intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
