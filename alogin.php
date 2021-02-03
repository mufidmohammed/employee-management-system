<?php

require('process/db_connect.php');

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ems";

// $conn = mysqli_connect($servername, $username, $password, $dbname);

// if (mysqli_connect_error()) {
//     die("Unable to connect to database : " . mysqli_connect_error());
// }

$sql = "SELECT * FROM `employee` WHERE 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error occured");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<br>";
    echo "Name: " . $row['firstName'] . " " . $row['lastName'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Password: " . $row['password'] . "<br>";
}

if (isset($_POST['submit'])) {    

    $name = $_POST['name'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT name, password FROM alogin WHERE name = $name AND password = $pwd";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_page.php");
    } else {
        echo "Connection error";
    }
}

mysqli_close($conn);

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
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="elogin.php">Employee</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <div class="row h-50"></div>
        <h2>Welcome</h2>
        <div class="row text-center col-sm-6">
            <form action="alogin.php" method="POST">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="name" name="name">
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