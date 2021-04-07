<?php  
    session_start(); 
    if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
            header("Location: index.php" );
        }
    ob_start();
    include "../include/db_connection.php";

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

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
               
                    Add New Delivered Milk Details;
                
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
                                $query = "select * from tbl_client";
                            
                                if($result = mysqli_query($conn, $query)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $mid = $row["id"];
                                            $name = $row["name"];
                                            $mobile = $row["mobile"];
                                            echo "<option value='$mid'>".$name." (".$mobile.") "."</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="row">
                                <div class="col-sm-6">
                                <label for="inputPassword4">Quantity </label><span id="order" sapn></span>
                                </div>
                            
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

            <div class="form-row">
            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <div class="form-group col-sm-2">
                    <button type="submit" class="btn btn-primary" name="update_recieved_milk">Update</button>
                </div>
               <?php }else{
                    ?>
                    <div class="form-group col-sm-2">
                        <button type="submit" class="btn btn-primary" name="add_recieved_milk">Add Delivered Milk</button>
                    </div>
                    <!-- <div class="form-group col-sm-2">
                        <button type="button" class="btn btn-info" id="scan_qr_code" name="scan" >Scan QR Code</button>
                    </div> -->
               <?php } ?>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-secondary" name="clear_recieved_milk" >Clear</button>
            </div>
        </div>
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
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>

<style>
.error{
color:red;
}
</style>

<div class="modal fade" id="showQR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card" style="width: 22rem;">
            <!-- <div class="card-body" id="qrResult"> -->
                <video width="350" height="220" id="preview"></video>
            <!-- </div> -->
        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                </label>
            </div>
            <button class="btn btn-primary" id="close_scan">close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
jQuery(document).ready(function($){

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

var scanner;
function scanQr(){

$("#showQR").modal("show");
// document.getElementById("showQR").showModal();

scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
scanner.addListener('scan',function(content){
    // alert(content);
    fillValueAfterScan(content)
    scanner.stop();
    $("#showQR").modal("hide");
    //window.location.href=content;
});
Instascan.Camera.getCameras().then(function (cameras){
    if(cameras.length>0){
        console.log(cameras.length)
        scanner.start(cameras[0]);
        $('[name="options"]').on('change',function(){
            if($(this).val()==1){
                if(cameras[0]!=""){
                    scanner.start(cameras[0]);
                }else{
                    alert('No Front camera found!');
                }
            }else if($(this).val()==2){
                if(cameras[1]!=""){
                    scanner.start(cameras[1]);
                }else{
                    alert('No Back camera found!');
                }
            }
        });
    }else{
        // console.error('No cameras found.');
        alert('No cameras found.');
    }
}).catch(function(e){
    console.error(e);
    // alert(e);
});
}

$("#scan_qr_code").click(function(){
    scanQr();
});

$("#close_scan").click(function(){
    scanner.stop();
    $("#showQR").modal("hide");
});


function fillValueAfterScan(id){
    $("#name").val(id).attr('selected', 'selected');
    $('#date-time').val('<?php echo date("Y-m-d") ?>');
}


});




</script>


<?php

    if(isset($_POST['add_recieved_milk'])){
        $id = $_POST["name"];
        $quantity = $_POST["quantity"];
        $datetime = $_POST["datetime"];
        $remark = $_POST["remark"];
        $staff_id = $_SESSION["id"];


        $query = "insert into tbl_milk_delivered (staff_id, client_id, quantity, date_time, remark) values('$staff_id', '$id', '$quantity', '$datetime', '$remark')";
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
    
    
    ob_end_flush();

?>

<script>
    jQuery(document).ready(function($){
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