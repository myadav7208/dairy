<?php
include "include/db_connection.php";
if($_GET["page_from"] == "staff" && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_staff where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-staff.php");
    exit();
}

if($_GET["page_from"] == "client" && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_client where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-client.php");
    exit();
}

if($_GET["page_from"] == "milk_provider" && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_milk_provider where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-milk_provider.php");
    exit();
}

if($_GET["page_from"] == "milk_type" && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_milk_type where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-milk_type.php");
    exit();
}


if($_GET["page_from"] == "staff_salary" && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_staff_salary where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-staff_salary.php");
    exit();
}


if($_GET["page_from"] == "expenses" && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_expenses where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-expenses.php");
    exit();
}

if($_GET["page_from"] == "milk_loss" && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query = "delete from tbl_milk_loss where id=$id";
    mysqli_query($conn, $query);
    header("Location: view-milk_loss.php");
    exit();
}

if(($_GET["page_from"] == "recieved_milk") && ($_GET["trm_id"] != "") && ($_GET["quantity"] != "") && ($_GET["tmp_id"] != "")){
    $id = $_GET["trm_id"];
    $tmp_id = $_GET["tmp_id"];
    $quantity = $_GET["quantity"];
    $query = "delete from tbl_recieved_milk where id=$id";
    mysqli_query($conn, $query);
    $result = mysqli_query($conn, "select rate from tbl_milk_provider where id = $tmp_id"); 
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $rate = $row["rate"];
        }
        echo $rate;
        $result2 = mysqli_query($conn, "select total_amount from tbl_milk_provider_amount where milk_provider_id = $tmp_id");
        if($result2){
            while($row2 = mysqli_fetch_assoc($result2)){
                $total_amount = $row2["total_amount"];
            }
            $tamount = $total_amount - ($quantity * $rate);
            mysqli_query($conn, "update tbl_milk_provider_amount set total_amount = $tamount where milk_provider_id = $tmp_id");
        }
    }
    header("Location: view-recieved-milk.php");
    exit();
}


if(($_GET["page_from"] == "delivered_milk") && ($_GET["tmd_id"] != "") && ($_GET["quantity"] != "") && ($_GET["tc_id"] != "")){
    $id = $_GET["tmd_id"];
    $tc_id = $_GET["tc_id"];
    $quantity = $_GET["quantity"];
    $query = "delete from tbl_milk_delivered where id=$id";
    mysqli_query($conn, $query);
    $result = mysqli_query($conn, "select rate from tbl_client where id = $tc_id"); 
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $rate = $row["rate"];
        }
        echo $rate;
        $result2 = mysqli_query($conn, "select total_amount from tbl_total_client_amount where client_id = $tc_id");
        if($result2){
            while($row2 = mysqli_fetch_assoc($result2)){
                $total_amount = $row2["total_amount"];
            }
            $tamount = $total_amount - ($quantity * $rate);
            mysqli_query($conn, "update tbl_total_client_amount set total_amount = $tamount where client_id = $tc_id");
        }
    }
    header("Location: view-delivered-milk.php");
    exit();
}

if($_GET["page_from"] == "client_payment" && ($_GET["id"] != "") && ($_GET["old_amount"] != "") && ($_GET["client_id"] != "")){
    $id = $_GET["id"];
    $client_id = $_GET["client_id"];
    $old_amount = $_GET["old_amount"];
    $result = mysqli_query($conn, "select total_amount from tbl_total_client_amount where client_id=$client_id");
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $total_amount = $row["total_amount"];
        }
    }
    $new_total_amount = $total_amount + $old_amount;
    mysqli_query($conn, "update tbl_total_client_amount set total_amount=$new_total_amount where client_id=$client_id");
    mysqli_query($conn, "delete from tbl_client_payment where id=$id");
    header("Location: view-client-payment.php");
    exit();
}

if($_GET["page_from"] == "provider_payment" && ($_GET["id"] != "") && ($_GET["old_amount"] != "") && ($_GET["client_id"] != "")){
    $id = $_GET["id"];
    $provider_id = $_GET["client_id"];
    $old_amount = $_GET["old_amount"];
    $result = mysqli_query($conn, "select total_amount from tbl_milk_provider_amount where milk_provider_id=$provider_id");
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $total_amount = $row["total_amount"];
        }
    }
    $new_total_amount = $total_amount + $old_amount;
    mysqli_query($conn, "update tbl_milk_provider_amount set total_amount=$new_total_amount where milk_provider_id=$provider_id");
    mysqli_query($conn, "delete from tbl_milk_provider_payment where id=$id");
    header("Location: view-milk-provider-payment.php");
    exit();
}


?>