<?php  
session_start(); 
if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
        header("Location: index.php" );
    } 
    ob_start();
    include("../include/db_connection.php");
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

        <div class="content mt-3" style="margin-bottom:30px;">

        <div class="card">
            <div class="card-header">
                Delivered Milk Report
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
                $dm_id = $_SESSION["id"];

            
                $from_date2 = $from_date;
                $todate2 = $todate;
                echo "<center><h4 style='color:green;'>Report From $from_date To $todate</h4><center>";
                ?>

            <div class="table-responsive" >
                <table class="table table-bordered text-center " id="staff-table" >
                    <thead>
                        <tr>
                            <th scope='col' style='width:130px;'>Date</th>
                            <th scope='col' style='width:130px;'><?php echo $_SESSION["username"]; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $query2 = "select sum(trm.quantity) total_quantity, sum(trm.quantity)*tmp.rate tamount, trm.date_time dt from tbl_recieved_milk trm inner join tbl_milk_provider tmp on trm.milk_provider_id = tmp.id where trm.milk_provider_id=$dm_id and cast(trm.date_time as date) between '$from_date' and '$todate' group by trm.date_time order by trm.date_time";
                                $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                $quantity_arr  = array();
                                $date_arr = array();
                                $amount_arr = array();

                                if($result2){
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        $tquantity = $row2["total_quantity"];
                                        $amount = $row2["tamount"];
                                        $dt = $row2["dt"];
                                        $quantity_arr[$dt] = $tquantity;
                                        $amount_arr[$dt] = $amount;   
                                        array_push($date_arr, $dt);
                                    }
                                }
                            
                            while (strtotime($from_date) <= strtotime($todate)) {
                                $new_row = "<tr>";
                                $new_td = "";
                                $new_td  .= "<td >$from_date</td>";
                                if(in_array($from_date, $date_arr)){
                                    $new_td .= "<td style='width:130px;'> $quantity_arr[$from_date] <br/>
                                    $amount_arr[$from_date]            
                                                    </td>";
                                } else{
     
                                $new_td .= "<td style='width:130px;'>Quantity : 0<br/>
                                                Amount :  0            
                                             </td>"; 
                                }
                                             
                                $new_row .= $new_td;
                                $new_row .= "</tr>";
                                echo $new_row;
                                $from_date = date ("Y-m-d", strtotime("+1 days", strtotime($from_date)));
                            }
                         
                    
                        ?>
                    </tbody>
                    <tfoot>
                        
                            <tr>
                            <td style='font-weight:bold'>Total</td>
                            <?php
                        
                                $query3 = "select sum(trm.quantity)*tmp.rate tamount, sum(trm.quantity) total_quantity from tbl_recieved_milk trm left join tbl_milk_provider tmp on trm.milk_provider_id = tmp.id where trm.milk_provider_id=$dm_id and DATE_FORMAT(cast(trm.date_time as date), '%Y-%m-%d') BETWEEN '$from_date2' and '$todate2'";
                                $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));

                                while($row3 = mysqli_fetch_assoc($result3)){
                                        $tquantity = $row3["total_quantity"];
                                        $amount = $row3["tamount"];
                                        if($tquantity){
                                            echo "<td style='width:130px;font-weight:bold'>Quantity : $tquantity<br/>
                                            Amount :  $amount           
                                        </td>";
                                        }else{
                                            echo "<td style='width:130px;font-weight:bold'> Total Quantity : 0 <br/>
                                            Total Amount : 0            
                                        </td>"; 
                                        }
                                    
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
            dom: 'fBrtip',
            buttons: [{
                extend: 'print',
                footer: true
            }]
        });

    });
</script>