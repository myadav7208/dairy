<?php  
    ob_start();
    include "include/db_connection.php";

    if(isset($_POST["provider_id"]) && $_POST["provider_id"] != ""){
        $provider_id = $_POST["provider_id"];
        $result = mysqli_query($conn, "select * from tbl_milk_provider_amount where milk_provider_id = $provider_id");
        $data = array();
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $data["total_amount"] = $row["total_amount"];
            }
            echo json_encode($data);
            exit();
        }
        
    }

    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Milk Provider Payment</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Milk Provider Payment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
            Add Milk Provider Payment
            </div>

            <div class="card-body">
            <form id="milk-provider-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                    <label for="inputAddress">Milk Provider</label>
                        <select class="form-control" id="milk_provider" name="milk_provider" required>
                            <option value="">Select Milk Provider</option>

                      <?php
                          $querys = "Select * from tbl_milk_provider";
                          $result = mysqli_query($conn, $querys);
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<option value='.$row["id"].'>'.$row["name"].'</option>';
                          }
                       ?>
                    </select>
                    
                </div>
                    <div class="form-group col-sm-6">
                    <label for="inputAddress">Payment Type</label>
                        <select class="form-control" id="payment_type" name="payment_type" required>
                            <option value="">Select Payment Type</option>
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="UPI">UPI</option>
                            <option value="Bank Account">Bank Account</option>
                    </select>  
                </div>
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">Amount</label><span id="show_amount" style="color:red;margin-left:15px;"></span>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="inputAddress">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Date-Time">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6 ">
                <label for="inputAddress2">Remark</label>
                <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
            </div>
            </div>
            
            <button type="submit" class="btn btn-primary" name="add_milk_payment">Add Payment</button>

            <button type="submit" class="btn btn-primary" name="clear_milk_loss">Clear</button>
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
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
        $("#milk-provider-form").validate({

                rules:{

                    milk_provider:{
                        required:true,
                    },
                    date:{
                        required : true,
                    },
                    remark :{
                        required : true,
                    },  
                    amount :{
                        required : true,
                    },  
                    payment_type :{
                        required : true,
                    },  
                },
                messages:{
                    milk_provider :{
                        required :"Please , Enter Quantity",
                    },
                    date:{
                        required : "Choose date",
                    },
                    remark:{
                        required :"Enter your Remark"
                    },
                    payment_type:{
                        required :"Select payment type"
                    },
                    amount:{
                        required :"Enter amount"
                    },
                   
                },

            });


    });
</script>

<?php

    if(isset($_POST['add_milk_payment'])){
        $milk_provider  = $_POST["milk_provider"];
        $amount = $_POST["amount"];
        $date_time = $_POST["date"];
        $remark = $_POST["remark"];
        $payment_type = $_POST["payment_type"];
    
        $result = mysqli_query($conn, "select total_amount from tbl_milk_provider_amount where milk_provider_id = $milk_provider");
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $total_amount = $row["total_amount"];
            }

        }
        if($amount > $total_amount){
            $msg = 'Amount should not be greater than balance amount.';
            echo "<script>alert('$msg')</script>";
        }else{
            $new_total_amount = $total_amount - $amount;
            mysqli_query($conn, "insert into tbl_milk_provider_payment (milk_provider_id, payment_type, amount, remark, date_time) values($milk_provider, '$payment_type', $amount, '$remark', '$date_time')");
            mysqli_query($conn, "update tbl_milk_provider_amount set total_amount = $new_total_amount where milk_provider_id = $milk_provider");
        }
        header("Location: view-milk-provider-payment.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>


<script>
    $(document).ready(function(){
    var balance_amount = null
        $("#milk_provider").change(function(){
            var provider_id = $("#milk_provider").val();
          
            $.ajax({
                url:"milk-provider-payment.php",
                method:"POST",
                dataType:"json",
                data:{provider_id:provider_id},
                success:function(response){
                    if(Object.keys(response).length > 0){
                        balance_amount = response.total_amount
                        $("#show_amount").text("₹ "+response.total_amount);
    
                    }
                    else{
                        balance_amount = 0
                        $("#show_amount").text("₹ 0");
                
                    }
                }
            });
        });

        $("#amount").keyup(function(){
            if(balance_amount != null){
                let new_balance = (balance_amount - $("#amount").val())
                $("#show_amount").text("₹ "+new_balance)
            }
        });


    });



</script>