<?php  
    session_start();
    if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
        header("Location: index.php" );
    } 
    ob_start();
    include "include/db_connection.php";
    include "include/header.php";
?>

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

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["trm_id"] != ""){
                    echo "Update Recieved Milk Details";

                }else{
                    echo "Add New Recieved Milk Details";
                } ?>
            </div>
            <div class="card-body">
            <form id="recieved-milk-form" method="POST" action="recieved-milk.php">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id1" name="id1" >
                        <input type="hidden" id="old_quantity" name="old_quantity" >
                        <label for="inputEmail4">Name</label>
                        <select class="form-control" id="name" name="name" required>
                            <option value="">Select provider</option>
                            <?php
                                $query = "select * from tbl_milk_provider";
                            
                                if($result = mysqli_query($conn, $query)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $mid = $row["id"];
                                            $name = $row["name"];
                                            $mobile = $row["mobile"];
                                            echo "<option value='$mid'>".$name."( ".$mobile." )"."</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">Quantity</label>
                        <input type="number" class="form-control" step="any" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Date Time</label>
                    <input type="date" class="form-control" id="date-time" name="datetime">
                </div>
            </div>

            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <input type="submit" class="btn btn-primary" name="update_recieved_milk" value="Update">

               <?php }else{
                    ?>
                    <input type="submit" class="btn btn-primary" name="add_recieved_milk" value ="Add Recieved Milk">

               <?php } ?>
            <input type="reset" class="btn btn-primary" name="clear_recieved_milk" value="Clear">
        </form>
        </div>
        </div>
        </div> <!-- .content -->
        
        <div class="container footer">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <span ><strong>Copyright &copy; 2020-2021 <a href="http://clpinfotech.com/" target="_blank">CLP INFOTECH PVT LTD</a>.</strong></span>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php 
        if(isset($_GET["page_from"]) && ($_GET["page_from"] == "update") && $_GET["trm_id"] != ""){
            $id = $_GET['trm_id'];
            $query = "select * from tbl_recieved_milk where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $idd = $row["id"];
                        $name = $row["milk_provider_id"];
                        $quantity = $row["quantity"];
                        $datetime = $row["date_time"];
                    }
                
            

                    echo "<script>
                            $('#quantity').val('$quantity');
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
    $("#recieved-milk-form").validate({

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


        $query = "insert into tbl_recieved_milk (milk_provider_id, quantity, date_time) values('$id', '$quantity', '$datetime')";
        mysqli_query($conn, $query);

        $result = mysqli_query($conn, "select rate from tbl_milk_provider where id = $id");
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $rate = $row["rate"];
            }
            $result2 = mysqli_query($conn, "select total_amount from tbl_milk_provider_amount where milk_provider_id = $id");
            if(mysqli_num_rows($result2) < 1){
                $amount = $rate * $quantity;
                mysqli_query($conn, "insert into tbl_milk_provider_amount (milk_provider_id, total_amount) values ($id, $amount)");
            }else{
                while($row2 = mysqli_fetch_assoc($result2)){
                    $last_amount = $row2["total_amount"];
                    $amount = $last_amount + ($rate * $quantity);
                    mysqli_query($conn, "update tbl_milk_provider_amount set total_amount = $amount where milk_provider_id = $id");

                }
            }

        }

        header("Location: view-recieved-milk.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_recieved_milk'])){
        // $id = $_POST["id"];
        $id = $_POST["name"];
        $trm_id = $_POST['id1'];
        $old_quantity = $_POST["old_quantity"];
        $quantity = $_POST["quantity"];
        $datetime1 = $_POST["datetime"];
    
        $result_update1 = mysqli_query($conn, "select total_amount from tbl_milk_provider_amount where milk_provider_id = $id");
        if($result_update1){
            while($row_up1 = mysqli_fetch_assoc($result_update1)){
                $tamount = $row_up1["total_amount"];
            }
        
            $result_update2 = mysqli_query($conn, "select * from tbl_milk_provider where id = $id");
            if($result_update2){
                while($row = mysqli_fetch_assoc($result_update2)){
                    $rate = $row["rate"];
                }
            }
            
            $tamount1 = $tamount - ($old_quantity * $rate);
            $tamount2 = $tamount1 + ($quantity * $rate);
           
            mysqli_query($conn, "update tbl_recieved_milk set quantity = $quantity, date_time = '$datetime1' where id = $trm_id");
            mysqli_query($conn, "update tbl_milk_provider_amount set total_amount = $tamount2 where milk_provider_id = $id");  
        }
        header("Location: view-recieved-milk.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>