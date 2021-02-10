<?php
// $inputs = array("firstName" = > "", "lastName" => "", "email" => "", "");
require('process/db_connect.php');

if(isset($_POST['submit'])) {
	$firstName = mysqli_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_escape_string($conn, $_POST['lastName']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$password = mysqli_escape_string($conn, $_POST['password']);
	$address = mysqli_escape_string($conn, $_POST['address']);
	$nid = mysqli_escape_string($conn, $_POST['nid']) ?? "";
	$birthdate = $_POST['birthdate'];
	$gender = $_POST['gender'];
	$salary = 1000;
	$points = 0;

	$sql = "INSERT INTO `employee` (`firstName`, `lastName`, `email`, `password`, `address`, `nid`, `birthdate`, `gender`, `salary`, `points`) VALUES ('$firstName', '$lastName', '$email', '$password', '$address', '$nid', '$birthdate', '$gender', '$salary', '$points')";

	if (mysqli_query($conn, $sql)) {
		echo "<script>Employee successfully added</script>";
		header('Location: admin_page.php');
	} else {
		die("Error adding employee : " . mysqli_error($conn));
	}

}

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
                    <a class="nav-link" href="admin_page.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="add.php">Add employee</a>
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

    <div class="container">
        <div class="row h-50"></div>
        <h2>Add Employee</h2>
        <div class="row text-center col-sm-6">
            <form action="add.php" method="POST">
                <div class="form-group">
                	<div class="row">
                		<div class="col">
                			<input type="text" class="form-control" placeholder="First name" name="firstName">
                		</div>
                		<div class="col">
                			<input type="text" class="form-control" placeholder="Last name" name="lastName">
                		</div>
                	</div>
                </div>

                <div class="form-group">
                	<input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                	<div class="row">
                		<div class="col">
                  			<input type="password" class="form-control" placeholder="Create password" name="password" required="">
                  		</div>
                  		<div class="col">
                  			<input type="password" class="form-control" placeholder="Confirm password" name="confirm_password" required="">
                  		</div>
                  	</div>
                </div>

                <div class="form-group">
                	<div class="row">
                		<div class="col">
                			<input type="text" name="address" class="form-control" placeholder="Address" required="">
                		</div>
                		<div class="col">
                			<input type="text" name="nid" class="form-control" placeholder="National ID (optional)">
                			<small class="text-info">For password reset</small>
                		</div>
                	</div>
                </div>

                <div class="form-group">
                	<div class="text-left text-primary">Date of birth:</div>
                	<input type="date" name="birthdate" class="form-control">
                </div>
				
				<div class="form-check text-left">
					<div class="text-primary">Gender</div>
						<input class="form-check-input" type="radio" name="gender" value="M">
					<label>Male</label>
				</div>
				<div class="form-check text-left">
					<input class="form-check-input" type="radio" name="gender" value="F">
					<label>Female</label>
				</div>


                <input type="submit" name="submit" value="Add" class="btn btn-primary">
            </form>
        </div>
    </div>

</body>
</html>
