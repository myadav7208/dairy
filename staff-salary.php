<?php 
    session_start();
    if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
        header("Location: index.php" );
    }  
    ob_start();
    include "include/db_connection.php";
    include "include/header.php";
    error_reporting(1);
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Staff Salary</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Staff Salary</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Staff Salary Details";

                }else{
                    echo "Add New Staff Salary";
                } ?>
            </div>
            <div class="card-body">
            <form id="staff_salary-form" method="POST">
                 <input type="hidden" id="salary_id" name="salary_id" value="">
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Staff ID</label>
                        <select class="form-control" id="staff_id" name="staff_id" required>
                            <option value="">Select Staff</option>

                      <?php
                          $querys = "Select * from tbl_staff";
                          $result = mysqli_query($conn, $querys);
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<option value='.$row["id"].'>'.$row["name"].'( '.$row["mobile"].' )'.'</option>';
                          }
                       ?>
                    </select>
                    
                </div>
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">Date</label>
                        <input type="date" class="form-control" id="date" name="dates" placeholder="Email">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                </div>
            
            </div>
           

            <?php if($_GET["page_from"] == "update"){ ?>
                <input type="submit" class="btn btn-primary" name="update_staff_salary" value="Update">

               <?php }else{
                    ?>
                    <input type="submit" class="btn btn-primary" name="add_staff_salary" value="Add Staff Salary">

               <?php } ?>
            <input type="button" class="btn btn-primary" name="clear_staff_salary" value="Clear">
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
        if($_GET["page_from"] == "update" && $_GET["id"] != ""){
            $id = $_GET['id'];
            $query = "select * from tbl_staff_salary where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $staff_id = $row["staff_id"];
                        $date = $row["dates"];
                        $amount = $row["amount"];
                        
                    }

                    echo "<script>
                            ('#salary_id').val($id);
                            $('#staff_id').val('$staff_id');
                            $('#date').val('$date');
                            $('#amount').val('$amount');
                            
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
    <script>
    $(document).ready(function(){
        $("#staff_salary-form").validate({

                rules:{

                    date:{
                        required:true,
                    },
                    amount:{
                        required : true,
                       
                    },
                },
                messages:{
                   
                    date:{
                        required : "Select a valid date",
                    },
                    amount:{
                        required :"Please, Enter your Amount"
                    },

                },

            });
    });
</script>

<?php

    if(isset($_POST['add_staff_salary'])){
        $staff_id = $_POST["staff_id"];
        $date = $_POST["dates"];
        $amount = $_POST["amount"];
      

        $query = "insert into tbl_staff_salary (staff_id, dates, amount) values('$staff_id','$date', '$amount')";
        mysqli_query($conn, $query);
        header("Location: view-staff_salary.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_staff_salary'])){
        $id = $_POST["salary_id"];
        $staff_id = $_POST["staff_id"];
        $date = $_POST["dates"];
        $amount = $_POST["amount"];

        $query = "update tbl_staff_salary set staff_id=$staff_id, dates='$date', amount='$amount' where id=$id";
       // echo $query;
        mysqli_query($conn, $query);
        header("Location: view-staff_salary.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>