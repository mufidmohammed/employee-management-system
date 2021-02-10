<?php

require("process/db_connect.php");

$sql = "SELECT * FROM `employee` WHERE 1";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="navbar bg-dark navbar-dark">
        <div class="font-weight-bolder">MD</div>
        <nav class="navbar navbar-expand-sm">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled" href="admin_page.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Add employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assign.php">Assign project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="status.php">Project status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Logout</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="row my-3 py-3"></div>


	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Full Name</th>
					<!-- <td>Project status</td> -->
					<th>Points</th>
					<th>Salary</th>
					<th>Points</th>
					<th>Remove Employee</th>
					<th>Edit Employee</th>
				</tr>
			</thead>
		<?php
			$counter = 1;
			while ($row = mysqli_fetch_assoc($query)) {
				$id = $row['id'];
				echo "<tbody>";
					echo "<tr>";
						echo "<td>" . $counter++ . "</td>";
						echo "<td>" . $id . "</td>";
						echo "<td>" . $row['lastName'] . " " . $row['firstName'] . "</td>";
						// echo "<td>" . $row['status'] . "</td>";
						echo "<td>" . $row['salary'] . "</td>";
						echo "<td>" . $row['points'] . "</td>";
						echo "<td><a href=" . "edit.php?employee_id=$id>" . "Edit</a>" . "</td>";
						// echo "<td><a href=" . "remove.php?employee_id=$id>" . "Remove</td>" . "</td>";
						echo "<td>";
							echo "<form method='POST' action=" . "remove.php?employee_id=" . $id . ">";
								echo "<button type='submit' name='remove' value='remove' onclick=\"return confirm('You are about to remove an employee. Proceed? ');\">Remove</button>";
							echo "</form>";
						echo "</td>";
					echo "</tr>";
				echo "</tbody>";
			}
		?>
		</table>
	</div>
</body>
</html>