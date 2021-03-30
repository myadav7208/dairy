<?php  
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Expenses</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Expenses</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                Expenses List
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="expenses-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Details</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select * from tbl_expenses";
                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $date = $row['date'];
                                        $amount = $row['amount'];
                                        $details = $row['details'];
                                     
                                        
                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td><a href='expenses.php?page_from=update&id=$id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                <a href='delete.php?page_from=expenses&id=$id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                            </td>
                                            <td>$date</td>
                                            <td>$amount</td>
                                            <td>$details</td>
                                          
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
        var expenses_table = $("#expenses-table").DataTable({
            
        });
    });
</script>