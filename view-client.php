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
                        <h1>Clients</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Clients</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                Client List
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="client-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Milk Type</th>
                            <th scope="col">Client Type</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select tc.id id, tc.name name, tc.mobile mobile, tc.email email, tc.address address, tmt.type type, tc.client_type client_type from tbl_client tc inner join tbl_milk_type tmt on tc.milk_type = tmt.id";
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
                                        $client_type = $row['client_type'];
                                        
                                        echo "<tr>
                                                <th scope='row'>$i</th>
                                                    <td>
                                                        <a href='client.php?page_from=update&id=$id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                        <a href='delete.php?page_from=client&id=$id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                                        <a href='' ><i id=$id class='fa fa-qrcode view-qr' aria-hidden='true' style='margin-left:10px; color:orange'></i></a>
                                                    </td>
                                                    <td>$name</td>
                                                    <td>$mobile</td>
                                                    <td>$email</td>
                                                    <td>$address</td>
                                                    <td>$milk_type</td>
                                                    <td>$client_type</td>
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


<div class="modal fade" id="showQR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card" style="width: 12rem;">
            <div class="card-body" id="qrResult">

            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    jQuery(document).ready(function($){
        var client_table = $("#client-table").DataTable({
            
        });

        $(".view-qr").click(function(event){
            event.preventDefault();
            var id = $(this).attr("id");
            $("#qrResult").empty();
            $("#showQR").modal("show")
            $("#qrResult").qrcode({
                    width: 150,
                    height: 150,
                    text: id.toString(),
            });
        });


    });
</script>