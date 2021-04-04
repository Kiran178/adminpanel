<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "adminpanel";

// Connection
$con = mysqli_connect("$host","$username","$password","$database");

//Check Connection
if(!$con)
{
    header("Location: ../errors/db.php");
    die();
    // die(mysqli_connect_error($con));
}
// else{
//     echo "Database Connected.!";
// }
?>