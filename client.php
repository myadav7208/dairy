<?php  
    ob_start();
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Client</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Client</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Clients Details";

                }else{
                    echo "Add New Clients";
                } ?>
            </div>

            <div class="card-body">
            <form id="client-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id" name="id" >
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">

                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">

                </div>
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Milk Type</label>
                        <select class="form-control" id="milk_type" name="milk_type" required>
                            <option value="">Select milk type</option>

                      <?php
                          $querys = "Select * from tbl_milk_type";
                          $result = mysqli_query($conn, $querys);
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<option value='.$row["id"].'>'.$row["type"].'</option>';
                          }
                       ?>
                    </select>
                    
                </div>
            </div>
            <div class="form-group col-sm-12 ">
                <label for="inputAddress2">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>

            </div>

            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <input type="submit" class="btn btn-primary" name="update_client" value="Update" id = "update">

               <?php }else{
                    ?>
                    <input type="submit" class="btn btn-primary" name="add_client" value="Add Clients" id="add">

               <?php } ?>
            <input type="button" class="btn btn-primary" name="clear_client" value="Clear">
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php 
        if(isset($_GET["page_from"]) && $_GET["id"] != ""){
            $id = $_GET['id'];
            $query = "select * from tbl_client where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row["name"];
                        $mobile = $row["mobile"];
                        $email = $row["email"];
                        $address = $row["address"];
                        $milk_type = $row["milk_type"];
                    }

                    echo "<script>
                            $('#id').val('$id');
                            $('#name').val('$name');
                            $('#mobile').val('$mobile');
                            $('#email').val('$email');
                            $('#address').val('$address');
                            $('#milk_type').val('$milk_type');
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
        $("#client-form").validate({

                rules:{

                    name:{
                        required:true,
                    },
                    email:{
                        required : true,
                        email : true ,
                    },
                   
                    mobile:{
                        required :true,
                        minlength:10,
                    },
                    address:{
                        required :true,
                    }

                },
                messages:{
                   
                    mobile:{
                        required : "Enter valid mobile number",
                    },
                    email:{
                        required :"Enter your Email id"
                    },
                    address :{
                        required :"Enter your Address"
                    },
                    name:{
                        required : "Enter Your Name"
                    },
                },

            });


    });
</script>


<?php

    if(isset($_POST['add_client'])){
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $milk_type = $_POST["milk_type"];

        $query = "insert into tbl_client (name,mobile, email,address,milk_type) values('$name', '$mobile', '$email', '$address',$milk_type)";
        mysqli_query($conn, $query);
        header("Location: view-client.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_client']) && $_POST['id'] != ""){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $milk_type = $_POST["milk_type"];

        $query = "update tbl_client set name ='$name', mobile ='$mobile', email ='$email', address ='$address' , milk_type = '$milk_type' where id = $id";
        mysqli_query($conn, $query);
        header("Location: view-client.php", true, 301);
        exit();
    
    }
    ob_end_flush();


?>

