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
                        <h1>Staff</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Staff</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Staff Details";

                }else{
                    echo "Add New Staff";
                } ?>
            </div>
            <div class="card-body">
            <form id="staff-form" method="POST" action="staff.php" >
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id" name="id" >
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" autocomplete="off">
                </div>
                <div class="form-group col-sm-6">
                    <label for="inputAddress">Password</label>
                    <?php 
                       if(isset($_GET["page_from"]) && $_GET["id"] != ""){?>
                            <input type="password" class="form-control" id="update_password" name="password" placeholder="Password" readonly>

                      <?php } else{ ?>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                    <?php } ?>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="inputAddress2">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" autocomplete="off"></textarea>
            </div>
            

            <?php if(isset($_GET["page_from"]) && $_GET["page_from"] == "update"){ ?>
                <input type="submit" class="btn btn-primary" name="update_staff" value="Update">

               <?php }else{
                    ?>
                    <input type="submit" class="btn btn-primary" name="add_staff" value="Add Staff">

               <?php } ?>
            <input type="button" class="btn btn-primary" name="clear_staff" value="Clear">
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
        if(isset($_GET["page_from"]) && $_GET["id"] != ""){
            $id = $_GET['id'];
            $query = "select * from tbl_staff where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row["name"];
                        $email = $row["email"];
                        $mobile = $row["mobile"];
                        $address = $row["address"];
                        $password = $row["password"];
                    }

                    echo "<script>
                            $('#id').val('$id');
                            $('#name').val('$name');
                            $('#email').val('$email');
                            $('#mobile').val('$mobile');
                            $('#address').val('$address');
                            $('#update_password').val('$password');
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
        $("#staff-form").validate({

                rules:{

                    name:{
                        required:true,
                    },
                    email:{
                        required : true,
                        email : true ,
                    },
                    password :{
                        required : true,
                        minlength : 5
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
                    password :{
                        required :"Please , enter your password",
                        minlength :"Password must be 5 character long"
                    },
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

    if(isset($_POST['add_staff'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $address = $_POST["address"];
        $password = $_POST["password"];

        $query = "insert into tbl_staff (password, name, email, mobile, address) values('$password', '$name', '$email', '$mobile', '$address')";
        mysqli_query($conn, $query);
        header("Location: view-staff.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_staff']) && $_POST['id'] != ""){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $address = $_POST["address"];

        $query = "update tbl_staff set name='$name', mobile='$mobile', email='$email', address='$address' where id=$id";
        mysqli_query($conn, $query);
        header("Location: view-staff.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>




