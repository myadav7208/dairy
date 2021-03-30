<?php  
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Clients Payment</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Clients Payment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

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
                            <th scope="col">Payment Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select tcp.id id, tc.id client_id, tc.name name, tcp.payment_type payment_type, tcp.amount amount, tcp.remark remark, tcp.date_time date from tbl_milk_provider_payment tcp inner join tbl_milk_provider tc on tcp.milk_provider_id = tc.id";
                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $provider_id = $row['client_id'];
                                        $name = $row['name'];
                                        $payment_type = $row['payment_type'];
                                        $amount = $row['amount'];
                                        $remark = $row['remark'];
                                        $date = $row['date'];
                                        
                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td>
                                                <a href='delete.php?page_from=provider_payment&id=$id&old_amount=$amount&client_id=$provider_id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                            </td>
                                            <td>$name</td>
                                            <td>$payment_type</td>
                                            <td>$amount</td>
                                            <td>$remark</td>
                                            <td>$date</td>
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
        var client_table = $("#client-table").DataTable({
            
        });
    });
</script>