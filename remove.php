<?php

$id = $_GET['employee_id'];

require('process/db_connect.php'); 

$sql = "DELETE FROM `employee` WHERE `id` = '$id'";

echo "<script>alert($id);</script>";

if (mysqli_query($conn, $sql)) {
	echo "<script>Employee with id $id has been deleted successfully </script>";
	// wait for 3 seconds
	header('Location: admin_page.php');
} else {
	die("An error occured");
}

mysqli_close($conn);

?>

<script>
	function alert(id) {
		alert("Deleting employee with ID: " + id);
	}
</script>