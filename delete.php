<?php
include "include/db_connection.php";
if(isset($_GET["page_from"]) && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_staff where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-staff.php");
    exit();
}

?>