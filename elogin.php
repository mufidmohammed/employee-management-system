<?php

require('process/db_connect.php');


if (isset($_POST['submit'])) {

    $eid = $_POST['eid'];
    $pwd = $_POST['pwd'];
      
    $sql = "SELECT * FROM `employee` WHERE `id` = '$eid' AND `password` = '$pwd'";

    if (mysqli_query($conn, $sql)) {
        header("Location: employee_page.php");
    } else {
        echo "An error occured.";
    }

}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee login page</title>
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
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alogin.php">Admin</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <div class="row h-50"></div>
        <h2>Welcome</h2>
        <div class="row text-center col-sm-6">
            <form action="./elogin.php" method="POST">
                <div class="form-group">
                <input type="number" class="form-control" placeholder="Employee ID" name="eid">
                </div>
                <br>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="password" name="pwd">
                </div>

                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </form>
        </div>
    </div>

</body>
</html>
