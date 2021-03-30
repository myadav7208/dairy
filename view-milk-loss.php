<?php  
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Milk Loss</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Milk Loss</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                Milk Loss List
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="milk_loss-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Staff Id</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Date-Time</th>
                            <th scope="col">Remark</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select tml.id id , ts.name name, tml.quantity quantity, tml.date_time date_time, tml.remark remark from tbl_milk_loss tml, tbl_staff ts where tml.staff_id = ts.id ";

                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){

                                        $id = $row['id'];
                                        $name = $row["name"];
                                        $quantity = $row["quantity"];
                                        $date_time = $row["date_time"];
                                        $remark = $row["remark"];
                                        
                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td><a href='milk_loss.php?page_from=update&id=$id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                <a href='delete.php?page_from=milk_loss&id=$id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                            </td>
                                            <td>$name</td>
                                            <td>$quantity</td>
                                            <td>$date_time</td>
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
        var milk_loss_table = $("#milk_loss-table").DataTable({
            
        });
    });
</script>