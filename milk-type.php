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
                        <h1>Milk Type</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Milk Type</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                <?php if(isset($_GET["page_from"]) && $_GET["id"] != ""){
                    echo "Update Milk Type ";

                }else{
                    echo "Add New Milk Type ";
                } ?>
            </div>

            <div class="card-body">
            <form id="milk_type-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id" name="id" >
                        <label for="inputEmail4">Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Name">
                    </div>
                    
                </div>
                <div class="form-row">
               
            </div>
            

            <?php if(isset($_GET["page_from"]) && isset($_GET["page_from"]) == "update"){ ?>
                <input type="submit" class="btn btn-primary" name="update_milk_type" value="Update">

               <?php }else{
                    ?>
                    <input type="submit" class="btn btn-primary" name="add_milk_type" value="Add Milk Type">

               <?php } ?>
            <input type="button" class="btn btn-primary" name="clear_milk_type" value="Clear">
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
            $query = "select * from tbl_milk_type where id=$id";

            if($result = mysqli_query($conn, $query)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $type = $row["type"];

                    }

                    echo "<script>
                            $('#id').val('$id');
                            $('#type').val('$type');
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
        $("#milk_type-form").validate({

                rules:{

                    type:{
                        required :true,
                    }

                },
                messages:{
                   
                    type:{
                        required : "Enter Type of Milk."
                    },
                },

            });
    });
</script>

<?php

    if(isset($_POST['add_milk_type'])){
        
        $type = $_POST["type"];

        $query = "insert into tbl_milk_type (type) values('$type')";
        mysqli_query($conn, $query);
        header("Location: view-milk-type.php", true, 301);
        exit();

    }
    
    if(isset($_POST['update_milk_type']) && $_POST['id'] != ""){
        $id = $_POST["id"];
        $type = $_POST["type"];

        $query = "update tbl_milk_type set type = '$type' where id = $id";
        mysqli_query($conn, $query);
        header("Location: view-milk-type.php", true, 301);
        exit();
    
    }
    ob_end_flush();

?>