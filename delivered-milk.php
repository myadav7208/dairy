<?php  
    ob_start();
    include "include/db_connection.php";

    if(isset($_POST["order_clientid"]) && $_POST["order_clientid"] != ""){
        $order_clientid = $_POST["order_clientid"];
        $result = mysqli_query($conn, "select * from tbl_order where client_id = $order_clientid");
        $data = array();
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $data["quantity"] = $row["quantity"];
                $data["remark"] = $row["remark"];
                $data["fill_date"] = $row["order_fill_date"];
            }
            echo json_encode($data);
            exit();
        }
        
    }

    include "include/header.php";
?>
<style>
.circle {
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 50%;
  font-size: 12px;
  color: #fff;
  text-align: center;
  background: red
}
</style>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["tmd_id"] != ""){
                    echo "Update Delivered Milk Details";

                }else{
                    echo "Add New Delivered Milk Details";
                } ?>
            </div>
            <div class="card-body">
            <form id="delivered-milk-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id1" name="id1" >
                        <input type="hidden" id="old_quantity" name="old_quantity" >
                        <label for="inputEmail4">Name</label>
                        <select class="form-control" id="name" name="name" required>
                            <option value="">Select Client</option>
                            <?php
                                $query = "select id, name from tbl_client";
                            
                                if($result = mysqli_query($conn, $query)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $mid = $row["id"];
                                            $name = $row["name"];
                                            echo "<option value='$mid'>$name</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="row">
                                <div class="col-sm-6">
                                <label for="inputPassword4">Quantity </label>
                                </div>
                                <?php if(!isset($_GET["page_from"])){ ?>
                                <div class="col-sm-6 " style="width: 50%; margin: 0 auto;" id="order">
                                <div class="circle " ></div>
                                </div>
                                <?php } ?>
                            
                        </div>
                        
                        <input type="number" class="form-control" step="any" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Date</label>
                    <input type="date" class="form-control" id="date-time" name="datetime">
                </div>
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Remark</label>
                    <textarea rows=3 class="form-control" id="remark" name="remark"></textarea>
                </div>
            </div>

            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <button type="submit" class="btn btn-primary" name="update_recieved_milk">Update</button>

               <?php }else{
                    ?>
                    <button type="submit" class="btn btn-primary" name="add_recieved_milk">Add Delivered Milk</button>

               <?php } ?>
            <button type="submit" class="btn btn-primary" name="clear_recieved_milk" style="margin-left:10px;">Clear</button>
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php 
        if(isset($_GET["page_from"]) && ($_GET["page_from"] == "update") && $_GET["tmd_id"] != ""){
            $id = $_GET['tmd_id'];
            $query = "select * from tbl_milk_delivered where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $idd = $row["id"];
                        $name = $row["client_id"];
                        $quantity = $row["quantity"];
                        $datetime = $row["date_time"];
                        $remark = $row["remark"];
                    }
                
            

                    echo "<script>
                            $('#quantity').val('$quantity');
                            $('#remark').val('$remark');
                            $('#old_quantity').val('$quantity');
                            $('#name').val('$name').attr('selected', 'selected');
                            $('#id1').val('$idd');
                            $('#date-time').val('$datetime');
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
    $("#delivered-milk-form").validate({

            rules:{

                quantity:{
                    required:true,
                },
                datetime:{
                    required : true,
                   
                },
               
                remark:{
                    required :true,
                    minlength:10,
                },
               

            },
            messages:{
               
                quantity:{
                    required : "Enter Quantity Of milk.",
                },
                datetime:{
                    required :"Choose your date.",
                },
                remark :{
                    required :"Enter Remarks."
                },
               
            },

        });


});
</script>


<?php

    if(isset($_POST['add_recieved_milk'])){
        $id = $_POST["name"];
        $quantity = $_POST["quantity"];
        $datetime = $_POST["datetime"];
        $remark = $_POST["remark"];


        $query = "insert into tbl_milk_delivered (client_id, quantity, date_time, remark) values('$id', '$quantity', '$datetime', '$remark')";
        mysqli_query($conn, $query);

        $result = mysqli_query($conn, "select rate from tbl_client where id = $id");
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $rate = $row["rate"];
            }
            $result2 = mysqli_query($conn, "select total_amount from tbl_total_client_amount where client_id = $id");
            if(mysqli_num_rows($result2) < 1){
                $amount = $rate * $quantity;
                mysqli_query($conn, "insert into tbl_total_client_amount (client_id, total_amount) values ($id, $amount)");
            }else{
                while($row2 = mysqli_fetch_assoc($result2)){
                    $last_amount = $row2["total_amount"];
                    $amount = $last_amount + ($rate * $quantity);
                    mysqli_query($conn, "update tbl_total_client_amount set total_amount = $amount where client_id = $id");

                }
            }

        }

        header("Location: view-delivered-milk.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_recieved_milk'])){
        $id = $_POST["name"];
        $tmd_id = $_POST['id1'];
        $old_quantity = $_POST["old_quantity"];
        $quantity = $_POST["quantity"];
        $datetime1 = $_POST["datetime"];
    
        $result_update1 = mysqli_query($conn, "select total_amount from tbl_total_client_amount where client_id = $id");
        if($result_update1){
            while($row_up1 = mysqli_fetch_assoc($result_update1)){
                $tamount = $row_up1["total_amount"];
            }
        
            $result_update2 = mysqli_query($conn, "select * from tbl_client where id = $id");
            if($result_update2){
                while($row = mysqli_fetch_assoc($result_update2)){
                    $rate = $row["rate"];
                }
            }
            
            $tamount1 = $tamount - ($old_quantity * $rate);
            $tamount2 = $tamount1 + ($quantity * $rate);
           
            mysqli_query($conn, "update tbl_milk_delivered set quantity = $quantity, date_time = '$datetime1', remark = '$remark' where id = $tmd_id");
            mysqli_query($conn, "update tbl_total_client_amount set total_amount = $tamount2 where client_id = $id");  
        }
        header("Location: view-delivered-milk.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>

<script>
    $(document).ready(function(){
        $("#name").change(function(){
            var client_id = $("#name").val();
            
            $.ajax({
                url:"delivered-milk.php",
                method:"POST",
                dataType:"json",
                data:{order_clientid:client_id},
                success:function(response){
                    console.log(Object.keys(response).length);
                    if(Object.keys(response).length > 0){
                        $("#order").text(response.quantity);
                        $("#order").show();
                    }
                    else{
                        $("#order").hide();
                    }
                }
            });
        });
    });

</script>