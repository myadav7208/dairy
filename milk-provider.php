<?php  
    ob_start();
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Milk Provider</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Milk Provider</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Milk Provider ";

                }else{
                    echo "Add New Milk Provider ";
                } ?>
            </div>

            <div class="card-body">
            <form id="milk_provider-form" method="POST">
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
                <button type="submit" class="btn btn-primary" name="update_milk_provider">Update</button>

               <?php }else{
                    ?>
                    <button type="submit" class="btn btn-primary" name="add_milk_provider">Add Milk Provider</button>

               <?php } ?>
            <button type="button" class="btn btn-primary" name="clear_milk_provider">Clear</button>
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php 
        if(isset($_GET["page_from"]) && $_GET["id"] != ""){
            $id = $_GET['id'];
            $query = "select * from tbl_milk_provider where id=$id";

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
        $("#milk_provider-form").validate({

                rules:{

                    name:{
                        required:true,
                    },
                    mobile:{
                        required : true,
                        minlength : 10
                       
                    },
                   
                    email:{
                        required :true,
                        email : true
                    },

                    address:{
                        required:true,
                    }

                },
                messages:{
                   
                    name:{
                        required : "Enter Your Name",
                    },
                    mobile:{
                        required :"Enter a valid Mobile Number"
                    },
                    
                    email:{
                        required : "Enter your valid email address"
                    },

                    address:{
                        required : "Enter your address"
                    },
                },

            });
    });
</script>

<?php

    if(isset($_POST['add_milk_provider'])){
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $milk_type = $_POST["milk_type"];

        $query = "insert into tbl_milk_provider (name,mobile, email,address,milk_type) values('$name', '$mobile', '$email', '$address',$milk_type)";
        mysqli_query($conn, $query);
        header("Location: view-milk_provider.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_milk_provider']) && $_POST['id'] != ""){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $milk_type = $_POST["milk_type"];

        $query = "update tbl_milk_provider set name ='$name', mobile ='$mobile', email ='$email', address ='$address' , milk_type = '$milk_type' where id = $id";
        mysqli_query($conn, $query);
        header("Location: view-milk_provider.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>