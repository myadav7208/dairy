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
                Recieved Milk Report
            </div>
            <div class="card-body">

            <form id="staff-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" id="id" name="id" >
                        <label for="inputEmail4">From Date</label>
                        <input type="date" class="form-control" id="fromdate" name="fromdate">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="inputPassword4">To Date</label>
                        <input type="date" class="form-control" id="todate" name="todate" >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <div id="temp_div">
        <?php
            if(isset($_POST["submit"])){
                $from_date = $_POST['fromdate'];
                $todate = $_POST['todate'];
                $from_date2 = $from_date;
                $todate2 = $todate;
                echo "<center><h4 style='color:green;'>Report From $from_date To $todate</h4><center>";
                ?>

            <div class="table-responsive" style="max-width:1000px;">
                <table class="table table-bordered text-center" id="staff-table">
                    <thead>
                        <tr>
                            <?php
                                echo "<th scope='col' style='width:130px;background-color:#ff969d;'>Date</th>";
                                        $query_recieve_milk = "select * from tbl_milk_provider";
                                        $res = mysqli_query($conn, $query_recieve_milk);
                                        $milk_provder_arr = array();
                                        if($res){
                                            while($row = mysqli_fetch_assoc($res)){
                                                array_push($milk_provder_arr, $row["id"]);
                                                $name = $row["name"];
                                                echo "<th style='width:130px;background-color:#ff969d;' scope='col'>$name</th>";
                                            }
                                        }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while (strtotime($from_date) <= strtotime($todate)) {
                                $new_row = "<tr>";
                                $new_td = "";
                                $new_td .= "<td style='width:130px;background-color:#a3b4c2'>$from_date</td>";
                                for($i=0; $i<sizeof($milk_provder_arr);$i++){
                                    $id = $milk_provder_arr[$i];
                                    $query2 = "select sum(trm.quantity) total_quantity, sum(trm.quantity)*tmp.rate tamount from tbl_recieved_milk trm inner join tbl_milk_provider tmp on trm.milk_provider_id = tmp.id where trm.milk_provider_id=$id and cast(trm.date_time as date) like '%$from_date%'";
            
                                    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                    // echo $result2;
                                    if($result2){
                                        while($row2 = mysqli_fetch_assoc($result2)){
                                            $tquantity = $row2["total_quantity"];
                                            $amount = $row2["tamount"];
                                            if(!$tquantity){
                                                $new_td .= "<td style='width:130px;background-color:#fff'>----- <br/>
                                                    -----             
                                                </td>"; 
                                            }
                                            else{
                                                $new_td .= "<td style='width:130px;background-color:#f7f697;'>Quantity : $tquantity<br/>
                                                Amount :  $amount            
                                             </td>"; 
                                            }
                                        }
                                    }
                                }
                                $new_row .= $new_td;
                                $new_row .= "</tr>";
                                echo $new_row;
                                $from_date = date ("Y-m-d", strtotime("+1 days", strtotime($from_date)));
                            }
                        }
                    
                        ?>
                    </tbody>
                    <tfoot>
                        
                            <tr>
                            <td style='background-color:#ff969d;font-weight:bold'>Total</td>
                            <?php
                                sort($milk_provder_arr);
                                $query3 = "select trm.milk_provider_id id, sum(trm.quantity)*tmp.rate tamount, sum(trm.quantity) total_quantity from tbl_recieved_milk trm left join tbl_milk_provider tmp on trm.milk_provider_id = tmp.id where DATE_FORMAT(cast(trm.date_time as date), '%Y-%m-%d') BETWEEN '$from_date2' and '$todate2' group by trm.milk_provider_id order by trm.milk_provider_id";
                                $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
                    
                                if($result3){
                                    for($i = 0; $i<sizeof($milk_provder_arr); $i++){
                                        $new_td2 = "";
                                        while($row3 = mysqli_fetch_assoc($result3)){
                                            if($row3["id"] == $milk_provder_arr[$i]){
                                                $tquantity = $row3["total_quantity"];
                                                $amount = $row3["tamount"];
                                                $new_td2 = "<td style='width:130px;background-color:#ff969d;font-weight:bold'>Quantity : $tquantity<br/>
                                                            Amount :  $amount           
                                                        </td>";
                                            }
                                        }
                                        if($new_td2 == ""){
                                            $new_td2 = "<td style='width:130px;background-color:#ff969d;font-weight:bold'> Total Quantity : 0 <br/>
                                                Total Amount : 0            
                                            </td>"; 
                                        }
                                        echo $new_td2;
                                    }
                                }

                            ?>
                            </tr>
            
                    </tfoot>
                </table>
            
</div>
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
        var num = 0;
        $('tr:nth-child(1) td').each(function () {
        if ($(this).attr('colspan')) {
          num += +$(this).attr('colspan');
        } else {
        num++;
      }
    });
    
    if(num <= 1){
        $('#temp_div').hide();
    }else{
        $('#temp_div').show();
    }
        var staff_table = $("#staff-table").DataTable({
            "scrollX": true,
            
        });
    });
</script>