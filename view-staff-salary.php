<?php  
    include "include/db_connection.php";
    include "include/header.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Staff Salary</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Staff Salary</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

        <div class="card">
            <div class="card-header">
                Staff Salary List
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="staff_salary-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Staff Name</th>
                            <th scope="col">Dates</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select tss.id id, tss.staff_id sid, tss.dates dt, tss.amount amt, ts.name names from tbl_staff_salary tss inner join tbl_staff ts on ts.id = tss.staff_id";
                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $name = $row['names'];
                                        $staff_id = $row['sid'];
                                        $date = $row['dt'];
                                        $amount = $row['amt'];

                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td><a href='staff_salary.php?page_from=update&id=$id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                <a href='delete.php?page_from=staff_salary&id=$id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                            </td>
                                            <td>$name</td>
                                            <td>$date</td>
                                            <td>$amount</td>
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
        var staff_salary_table = $("#staff_salary-table").DataTable({
            
        });
    });
</script>