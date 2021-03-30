<?php  
    ob_start();
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Milk Loss</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Milk Loss</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Milk Loss Details";

                }else{
                    echo "Add New Milk Loss";
                } ?>
            </div>

            <div class="card-body">
            <form id="milk_loss-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputAddress">Staff ID</label>
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
                        <label for="inputPassword4">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Date-Time</label>
                    <input type="datetime-local" class="form-control" id="date_time" name="date_time" placeholder="Date-Time">
                </div>
                <div class="form-group col-sm-6 ">
                <label for="inputAddress2">Remark</label>
                <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
            </div>
            </div>
            

            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <button type="submit" class="btn btn-primary" name="update_milk_loss">Update</button>

               <?php }else{
                    ?>
                    <button type="submit" class="btn btn-primary" name="add_milk_loss">Add Milk_Loss</button>

               <?php } ?>
            <button type="submit" class="btn btn-primary" name="clear_milk_loss">Clear</button>
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php 
        if(isset($_GET["page_from"]) && $_GET["id"] != ""){
            $id = $_GET['id'];

            $query = "select * from tbl_milk_loss where id=$id";
            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $staff_id = $row["staff_id"];
                        $quantity = $row["quantity"];
                        $date_time = $row["date_time"];
                        $remark = $row["remark"]; 

                                            }
                    
                    echo "<script>
                            $('#id').val('$id');
                            $('#staff_id').val('$staff_id');
                            $('#quantity').val('$quantity');
                            $('#date_time').val('$date_time');
                            $('#remark').val('$remark');
                        </script>";
                }
            }

        }



    include "include/footer.php";

 ?>
 <!-- Jquery Validate -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>

<style>
.error{
    color:red;
}
</style>

<script>
    $(document).ready(function(){
        $("#milk_loss-form").validate({

                rules:{

                    quantity:{
                        required:true,
                    },
                    date_time:{
                        required : true,
                        email : true ,
                    },
                    remark :{
                        required : true,
                    },  
                },
                messages:{
                    quantity :{
                        required :"Please , Enter Quantity",
                    },
                    date_time:{
                        required : "Choose your date",
                    },
                    remark:{
                        required :"Enter your Remark"
                    },
                   
                },

            });


    });
</script>

<?php

    if(isset($_POST['add_milk_loss'])){
        $staff_id  = $_POST["staff_id"];
        $quantity = $_POST["quantity"];
        $date_time = $_POST["date_time"];
        $remark = $_POST["remark"];

        $query = "insert into tbl_milk_loss (staff_id ,quantity, date_time,remark) values('$staff_id ', '$quantity', '$date_time', '$remark')";
        mysqli_query($conn, $query);
        header("Location: view-milk_loss.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_milk_loss']) && $_POST['id'] != ""){
        
        $id = $_POST["id"];
        $staff_id = $_POST["staff_id"];
        $quantity = $_POST["quantity"];
        $date_time = $_POST["date_time"];
        $remark = $_POST["remark"];

        $query = "update tbl_milk_loss set staff_id ='$staff_id', quantity ='$quantity', datetime ='$date_time' , remark = '$remark' where id = $id";
        mysqli_query($conn, $query);
        header("Location: view-milk_loss.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>