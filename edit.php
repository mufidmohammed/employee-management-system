<?php

if (empty($id)) {
    $id = $_GET['employee_id'];
}

require('process/db_connect.php');

$sql = "SELECT * FROM `employee` WHERE `id` = '$id'";

$query = mysqli_query($conn, $sql);

$employee = mysqli_fetch_assoc($query);


if(isset($_POST['submit'])) {
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$nid = mysqli_real_escape_string($conn, $_POST['nid']) ?? "";
	$salary = $_POST['salary'];
	$points = $_POST['points'];

    $sqlb = "UPDATE `employee` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `password` = '$password', `address` = '$address', `nid` = '$nid', `salary` = '$salary', `points` = '$points' WHERE `id` = '$id' ";


    if (mysqli_query($conn, $sqlb)) {
        echo "<script>alert('Records successfully updated');</script>";
        header('Location: admin_page.php');
    } else {
        die("An error occurred while updating employee records : " . mysqli_error($conn));
    }

    mysqli_close($conn);
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
                    <a class="nav-link" href="admin_page.html">Home</a>
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
        <h2>Edit Employee</h2>
        <div class="row text-center col-sm-6">
            <form action="<?php echo 'edit.php?employee_id='.$id; ?>" method="POST">
                <div class="form-group">
                	<div class="row">
                		<div class="col">
                			<input type="text" class="form-control" placeholder="<?php echo $employee['firstName']; ?>" name="firstName" value="<?php $employee['firstName']; ?>">
                		</div>
                		<div class="col">
                			<input type="text" class="form-control" placeholder="<?php echo $employee['lastName']; ?>" name="lastName" value="<?php $employee['lastName']; ?>">
                		</div>
                	</div>
                </div>

                <div class="form-group">
                	<input type="text" name="email" class="form-control" placeholder="email : <?php echo $employee['email'] ?>" value="<?php $employee['email']; ?>">
                </div>
                <div class="form-group">
                	<div class="row">
                		<div class="col">
                  			<input type="password" class="form-control" placeholder="password : <?php echo $employee['password']; ?>" name="password" value="<?php $employee['password']; ?>">
                  		</div>
                  		<div class="col">
                  			<input type="password" class="form-control" placeholder="password : <?php echo $employee['password']; ?>" name="confirm_password" value="<?php $employee['password']; ?>">
                  		</div>
                  	</div>
                </div>

                <div class="form-group">
                	<div class="row">
                		<div class="col">
                			<input type="text" name="address" class="form-control" placeholder="address : <?php echo $employee['address']; ?>" value="<?php $employee['address']; ?>">
                		</div>
                		<div class="col">
                			<input type="text" name="nid" class="form-control" placeholder="NID : <?php echo $employee['nid']; ?>">
                			<small class="text-info">For password reset</small>
                		</div>
                	</div>
                </div>

                <div class="form-group">
                	<div class="text-left text-primary">Date of birth:</div>
                	<input type="date" name="birthdate" class="form-control" placeholder="<?php echo $employee['birthdate']; ?>" disabled>
                </div>
				
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="number" name="salary" class="form-control" placeholder="salary : <?php echo $employee['salary']; ?>" value="<?php $employee['salary']; ?>" />
                        </div>
                        <div class="col">
                            <input type="number" name="points" class="form-control" placeholder="points : <?php echo $employee['points']; ?>" value="<?php $employee['points']; ?>" />
                        </div>
                    </div>
                </div>


                <input type="submit" name="submit" value="Edit" class="btn btn-primary">

            </form>
        </div>
    </div>

</body>
</html>
