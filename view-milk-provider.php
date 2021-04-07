<?php  
    session_start();
    if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
        header("Location: index.php" );
    } 
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

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                Milk Provider List
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="milk_provider-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Milk Type</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select tmp.id id, tmp.name name, tmp.mobile mobile, tmp.email email, tmp.address address, tmt.type type from tbl_milk_provider tmp inner join tbl_milk_type tmt on tmp.milk_type = tmt.id";
                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $mobile = $row['mobile'];
                                        $email = $row['email'];
                                        $address = $row['address'];
                                        $milk_type = $row['type'];
                                        
                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td><a href='milk_provider.php?page_from=update&id=$id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                <a href='delete.php?page_from=milk_provider&id=$id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                            </td>
                                            <td>$name</td>
                                            <td>$mobile</td>
                                            <td>$email</td>
                                            <td>$address</td>
                                            <td>$milk_type</td>
                                        </tr>";
                                        $i++;
                                    }
                                }
                            } 
                        ?>
                    </tbody>
                </table>
</div>
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


<script>
    jQuery(document).ready(function($){
        var milk_provider_table = $("#milk_provider-table").DataTable({
            
        });
    });
</script>