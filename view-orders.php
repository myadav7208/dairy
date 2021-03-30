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
                Order List
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="staff-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Date</th>
                            <th scope="col">Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select tc.name name, t_o.quantity quantity, t_o.order_fill_date ofd, t_o.remark remark from tbl_client tc inner join tbl_order t_o ON tc.id = t_o.client_id";
                            $i = 1;
            
                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $name = $row['name'];
                                        $quantity = $row['quantity'];
                                        $date = $row['ofd'];
                                        $remark = $row['remark'];
                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td>$name</td>
                                            <td>$quantity</td>
                                            <td>$date</td>
                                            <td>$remark</td>
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