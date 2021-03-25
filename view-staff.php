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
                Staff List
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="staff-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "select * from tbl_staff";
                            $i = 1;

                            if($result = mysqli_query($conn, $query)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $mobile = $row['mobile'];
                                        $address = $row['address'];
                                        echo "<tr>
                                            <th scope='row'>$i</th>
                                            <td><a href='staff.php?page_from=update&id=$id'><i class='fa fa-pencil' aria-hidden='true' style='margin-left:5px;color:green'></i></a>
                                                <a href='delete.php?page_from=staff&id=$id' ><i class='fa fa-trash' aria-hidden='true' style='margin-left:10px; color:red'></i></a>
                                            </td>
                                            <td>$name</td>
                                            <td>$mobile</td>
                                            <td>$email</td>
                                            <td>$address</td>
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