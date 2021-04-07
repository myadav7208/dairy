<?php  
session_start(); 
if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
        header("Location: index.php" );
    }
    ob_start();
    include "../include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Order Milk</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Order Milk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                Add Milk Order
            </div>

            <div class="card-body">
            <form id="order-milk-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" autocomplete="off">
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="inputAddress">Date-Time</label>
                    <input type="date" class="form-control" id="date_time" name="date_time" placeholder="Date-Time">
                </div>
                </div>
                <div class="form-row">
                
                <div class="form-group col-sm-6 ">
                <label for="inputAddress2">Remark</label>
                <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
            </div>
            </div>
                    <button type="submit" class="btn btn-primary" name="add_order-milk">Order Milk</button>

               
            <button type="submit" class="btn btn-primary" name="clear_milk_order">Clear</button>
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
        $("#order-milk-form").validate({

                rules:{

                    quantity:{
                        required:true,
                    },
                    date_time:{
                        required : true,
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

    if(isset($_POST['add_order-milk'])){
        $client_id  = $_SESSION["id"];
        $quantity = $_POST["quantity"];
        $order_fill_date = $_POST["date_time"];
        $remark = $_POST["remark"];

        $query = "insert into tbl_order (client_id ,quantity, order_fill_date,remark) values($client_id, '$quantity', '$order_fill_date', '$remark')";
        mysqli_query($conn, $query);
        header("Location: dashboard.php", true, 301);
        exit();

    }
    
    ob_end_flush();

?>