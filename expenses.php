<?php  
    ob_start();
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Expenses</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Expenses</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Expenses";

                }else{
                    echo "Add New Expenses";
                } ?>
            </div>
            <div class="card-body">
            <form id="expenses" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id" name="id" >
                        <label for="inputEmail4">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                       

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                       
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-12">
                <label for="inputdetails2">Details</label>
                <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                
                </div>
                
            </div>
           

            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <button type="submit" class="btn btn-primary" name="update_expenses">Update</button>

               <?php }else{
                    ?>
                    <button type="submit" class="btn btn-primary" name="add_expenses">Add Expenses</button>

               <?php } ?>
            <button type="button" class="btn btn-primary" name="clear_expenses">Clear</button>
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php 
        if(isset($_GET["page_from"]) && $_GET["id"] != ""){
            $id = $_GET['id'];
            $query = "select * from tbl_expenses where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $date = $row["date"];
                        $amount = $row["amount"];
                        $details = $row["details"];
                       }

                    echo "<script>
                            $('#id').val('$id');
                            $('#date').val('$date');
                            $('#amount').val('$amount');
                            $('#details').val('$details');
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
        $("#expenses").validate({

                rules:{

                    date:{
                        required:true,
                    },
                    amount:{
                        required : true,
                       
                    },
                   
                    details:{
                        required :true,
                    }

                },
                messages:{
                   
                    date:{
                        required : "Select a valid date",
                    },
                    amount:{
                        required :"Please, Enter your Amount"
                    },
                    
                    details:{
                        required : "Enter Required Details"
                    },
                },

            });
    });
</script>


<?php

    if(isset($_POST['add_expenses'])){
        $date = $_POST["date"];
        $amount = $_POST["amount"];
        $details = $_POST["details"];

        $query = "insert into tbl_expenses (date,amount,details) values('$date', '$amount', '$details')";
        mysqli_query($conn, $query);
        header("Location: view-expenses.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_expenses']) && $_POST['id'] != ""){
        $id = $_POST["id"];
        $date = $_POST["date"];
        $amount = $_POST["amount"];
        $details = $_POST["details"];

        $query = "update tbl_expenses set date='$date', amount='$amount', details='$details' where id=$id";
        mysqli_query($conn, $query);
        header("Location: view-expenses.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>