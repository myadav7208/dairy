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
                Recieved Milk
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="staff-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Date Time</th>
                            <th scope="col">Provider</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select trm.quantity quant, trm.date_time dt, trm.id id, tmp.name name, tmp.id tmp_id from tbl_recieved_milk trm, tbl_milk_provider tmp where trm.milk_provider_id = tmp.id";
                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $date_time = $row['dt'];
                                        $name = $row['name'];
                                        $quantity = $row['quant'];
                                        $trm_id = $row["id"];
                                        $tmp_id = $row["tmp_id"];

                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td><a href='recieved-milk.php?page_from=update&trm_id=$trm_id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                <a href='delete.php?page_from=recieved_milk&trm_id=$trm_id&quantity=$quantity&tmp_id=$tmp_id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
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