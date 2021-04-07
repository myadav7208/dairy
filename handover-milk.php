<?php 
    session_start();
    if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
        header("Location: index.php" );
    }  
    ob_start();
    include "include/db_connection.php";
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
                <?php if(isset($_GET["page_from"]) && $_GET["tmd_id"] != ""){
                    echo "Update Handover Milk Details";

                }else{
                    echo "Add New Handover Milk Details";
                } ?>
            </div>
            <div class="card-body">
            <form id="handover-milk-form" method="POST">
                <input type="hidden" name="id" value="<?php echo $_GET['tmd_id']; ?>">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id1" name="id1" >
                        <input type="hidden" id="old_quantity" name="old_quantity" >
                        <label for="inputEmail4">Name</label>
                        <select class="form-control" id="name" name="name" required>
                            <option value="">Select Staff</option>
                            <?php
                                $query = "select * from tbl_staff";
                            
                                if($result = mysqli_query($conn, $query)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $sid = $row["id"];
                                            $name = $row["name"];
                                            $mobile = $row["mobile"];
                                            echo "<option value='$sid'>".$name." (".$mobile." ) "."</option>";
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
                    <button type="submit" class="btn btn-primary" name="update_handover_milk">Update</button>
                </div>
               <?php }else{
                    ?>
                    <div class="form-group col-sm-2">
                        <button type="submit" class="btn btn-primary" name="add_handover_milk">Add Handover Milk</button>
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
        if(isset($_GET["page_from"]) && ($_GET["page_from"] == "update") && $_GET["tmd_id"] != ""){
            $id = $_GET['tmd_id'];
            $query = "select * from tbl_milk_handover where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $idd = $row["id"];
                        $name = $row["staff_id"];
                        $quantity = $row["quantity"];
                        $datetime = $row["date"];
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
    // $('.whatsapp').draggable();
    $("#handover-milk-form").validate({

            rules:{

                quantity:{
                    required:true,
                },
                name:{
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

    if(isset($_POST['add_handover_milk'])){
        $id = $_POST["name"];
        $quantity = $_POST["quantity"];
        $datetime = $_POST["datetime"];
        $remark = $_POST["remark"];


        $query = "insert into tbl_milk_handover (staff_id, quantity, date, remark) values('$id', '$quantity', '$datetime', '$remark')";
        mysqli_query($conn, $query);

        header("Location: view-handover-milk.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_handover_milk'])){
        $id = $_POST["name"];
        $tmd_id = $_POST['id'];
        $quantity = $_POST["quantity"];
        $datetime1 = $_POST["datetime"];
        $remark = $_POST["remark"];
    

           
            mysqli_query($conn, "update tbl_milk_handover set quantity = $quantity, date = '$datetime1', remark = '$remark', staff_id=$id where id = $tmd_id");
            // mysqli_query($conn, "update tbl_total_client_amount set total_amount = $tamount2 where client_id = $id");  
            header("Location: view-handover-milk.php", true, 301);
            exit();
        }
    
    ob_end_flush();

?>

