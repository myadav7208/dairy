<?php  
    ob_start();
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Assign Client</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Assign Client</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Assigned Clients Details";

                }else{
                    echo "Assign New Clients";
                } ?>
            </div>

            <div class="card-body">
            <form id="client-form" method="POST">
                <input type="hidden" id="id" name="id">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="inputAddress">Staff</label>
                        <select class="form-control" id="staff_id" name="staff_id" required>
                            <option value="">Select Staff</option>

                      <?php
                          $querys = "Select * from tbl_staff";
                          $result = mysqli_query($conn, $querys);
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<option value='.$row["id"].'>'.$row["name"].'</option>';
                          }
                       ?>
                    </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="inputAddress">Clients</label>
                        <select class="form-control" id="client_id" name="client_id" required>
                            <option value="">Select Clients</option>

                      <?php
                          $querys = "Select * from tbl_client";
                          $result = mysqli_query($conn, $querys);
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<option value='.$row["id"].'>'.$row["name"].'</option>';
                          }
                       ?>
                    </select>

                    </div>
                </div>
                
            
            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <input type="submit" class="btn btn-primary" name="update_assign-client" value="Update" id = "update">

               <?php }else{
                    ?>
                    <input type="submit" class="btn btn-primary" name="assign_client" value="Add Clients" id="add">

               <?php } ?>
            <input type="reset" class="btn btn-primary" name="clear_assign-client" value="Clear">
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php 
        if(isset($_GET["page_from"]) && $_GET["id"] != ""){
            $id = $_GET['id'];
            $query = "select * from tbl_assign_client where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $staff_id = $row["staff_id"];
                        $client_id = $row["client_id"];
                        
                    }

                    echo "<script>
                            $('#id').val('$id');
                            $('#staff_id').val('$staff_id');
                            $('#client_id').val('$client_id');
                           
                        </script>";
                }
            }

        }



    include "include/footer.php";


?>


  <!-- Jquery Validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

<style>
.error{
    color:red;
}
</style>

<?php

    if(isset($_POST['assign_client'])){
        $staff_id = $_POST["staff_id"];
        $client_id = $_POST["client_id"];
       

        $query = "insert into tbl_assign_client (staff_id, client_id) values($staff_id, $client_id)";
        mysqli_query($conn, $query);
        header("Location: view-assigned-client.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_assign-client']) && $_POST['id'] != ""){
        $id = $_POST["id"];
        $staff_id = $_POST["staff_id"];
        $client_id = $_POST["client_id"];
        

        $query = "update tbl_assign_client set staff_id =$staff_id, client_id =$client_id where id = $id";
        mysqli_query($conn, $query);
        header("Location: view-assigned-client.php", true, 301);
        exit();
    
    }
    ob_end_flush();


?>

