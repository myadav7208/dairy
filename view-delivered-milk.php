<?php  
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
                Delivered Milk
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="staff-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Date </th>
                            <th scope="col">Client</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select tmd.quantity quant, tmd.date_time dt, tmd.id id, tc.name name, tc.id tc_id from tbl_milk_delivered tmd, tbl_client tc where tmd.client_id = tc.id";
                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $date_time = $row['dt'];
                                        $name = $row['name'];
                                        $quantity = $row['quant'];
                                        $tmd_id = $row["id"];
                                        $tc_id = $row["tc_id"];

                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td><a href='delivered-milk.php?page_from=update&tmd_id=$tmd_id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                <a href='delete.php?page_from=delivered_milk&tmd_id=$tmd_id&quantity=$quantity&tc_id=$tc_id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                            </td>
                                            <td>$date_time</td>
                                            <td>$name</td>
                                            <td>$quantity</td>
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
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php
    include "include/footer.php";
?>


<script>
    jQuery(document).ready(function($){
        var staff_table = $("#staff-table").DataTable({
            
        });

    });
</script>