<?php  
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

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Staff Details";

                }else{
                    echo "Add New Staff";
                } ?>
            </div>
            <div class="card-body">
            <form id="staff-form" method="POST">
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
                    <label for="inputAddress">Password</label>
                    <?php 
                       if(isset($_GET["page_from"]) && $_GET["id"] != ""){?>
                            <input type="password" class="form-control" id="update_password" name="password" placeholder="Password" readonly>

                      <?php } else{ ?>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php } ?>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="inputAddress2">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>

            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <button type="submit" class="btn btn-primary" name="update_staff">Update</button>

               <?php }else{
                    ?>
                    <button type="submit" class="btn btn-primary" name="add_staff">Add Staff</button>

               <?php } ?>
            <button type="submit" class="btn btn-primary" name="clear_staff">Clear</button>
        </form>
        </div>
        </div>
            

        </div> <!-- .content -->
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

<script>
    
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