<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "dairy";

$conn = mysqli_connect($server, $user, $password, $dbname);
if(!$conn){
    echo "Database not connected";
}

?>