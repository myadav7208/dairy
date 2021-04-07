<?php  
        session_start();
        if(!(isset($_SESSION["username"])) && !(isset($_SESSION["id"]))){
            header("Location: index.php" );
        } 
    include "include/db_connection.php";
    include "include/header.php";
?>

<style>

</style>

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


        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                    <?php
                        $result1 = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result1){
                            while($row1 = mysqli_fetch_assoc($result1)){
                                $total_mp = $row1["total_mp"];
                            }
                        }
                    ?>
                        <h3> <?php  if(!$total_mp) echo 0; else echo $total_mp; ?></h3>
                        <p> Milk Providers </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <a href="view-milk-provider.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                    <?php
                        $result2 = mysqli_query($conn, "select count(*) total_tc from tbl_client");
                        if($result2){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $total_tc = $row2["total_tc"];
                            }
                        }
                    ?>
                        <h3> <?php  if(!$total_tc) echo 0; else echo $total_tc; ?> </h3>
                        <p> Happy Clients </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <a href="view-client.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                    <?php
                        $today = date("Y/m/d");
                        $result3 = mysqli_query($conn, "select count(*) total_od from tbl_order where cast(timestamp as date) like '$today'");
                        if($result3){
                            while($row3 = mysqli_fetch_assoc($result3)){
                                $total_od = $row3["total_od"];
                            }
                        }
                    ?>
                        <h3> <?php  if(!$total_od) echo 0; else echo $total_od; ?> </h3>
                        <p> Today's Orders </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-first-order" aria-hidden="true"></i>
                    </div>
                    <a href="view-orders.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                    <?php
                        $today = date("Y/m/d");
                        $result = mysqli_query($conn, "select sum(tmdp.amount) tmdp_amount, sum(tcp.amount) tcp_amount from tbl_client_payment tcp, tbl_milk_provider_payment tmdp where cast(tmdp.timestamp as date)='$today' and cast(tcp.timestamp as date) = '$today'");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $tmdp_amount = $row["tmdp_amount"];
                                $tcp_amount = $row["tcp_amount"];
                            }
                        }
                    ?>
                        <h3> <?php if(!$tmdp_amount+$tcp_amount) echo 0; else echo $tmdp_amount+$tcp_amount; ?> </h3>
                        <p> Today's Collection </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                    <?php
                        $today = date("Y/m/d");
                        $result5 = mysqli_query($conn, "select sum(quantity) quantity from tbl_milk_delivered where cast(timestamp as date) like '$today'");
                        if($result5){
                            while($row5 = mysqli_fetch_assoc($result5)){
                                $total_quantity = $row5["quantity"];
                            }
                        }
                    ?>
                        <h3> <?php  if(!$total_quantity) echo 0; else echo $total_quantity; ?> </h3>
                        <p> Today's Milk Delivered </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </div>
                    <a href="view-delivered-milk.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                    <?php
                        $today = date("Y/m/d");
                        $result = mysqli_query($conn, "select sum(quantity) today_total_quantity from tbl_recieved_milk where cast(timestamp as date) like '$today'");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $today_total_quantity = $row["today_total_quantity"];
                            }
                        }
                    ?>
                        <h3> <?php if(!$today_total_quantity) echo 0; else echo $today_total_quantity; ?> </h3>
                        <p> Today's Milk Recieved </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </div>
                    <a href="view-milk-provider-payment.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select sum(amount) tamount_total_collection from tbl_client_payment");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $tamount_total_collection = $row["tamount_total_collection"];
                            }
                        }
                    ?>
                        <h3> <?php if(!$tamount_total_collection) echo 0; else echo $tamount_total_collection; ?> </h3>
                        <p> Total Collections </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="view-client-payment.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_staff from tbl_staff");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_staff = $row["total_staff"];
                            }
                        }
                    ?>
                        <h3> <?php  if(!$total_staff) echo 0; else echo $total_staff; ?> </h3>
                        <p> Staff Strength </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="view-staff.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select sum(quantity) total_loss_quantity from tbl_milk_loss");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_loss_quantity = $row["total_loss_quantity"];
                            }
                        }
                    ?>
                        <h3> <?php if(!$total_loss_quantity) echo 0; else echo $total_loss_quantity;?></h3>
                        <p> Total Milk Loss </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                    </div>
                    <a href="view-milk-loss.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                    <?php
                        $today = date("Y/m/d");
                        $result = mysqli_query($conn, "select sum(quantity) today_total_loss_quantity from tbl_milk_loss where cast(timestamp as date) = '$today'");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $today_total_loss_quantity = $row["today_total_loss_quantity"];
                            }
                        }
                    ?>
                        <h3> <?php if(!$today_total_loss_quantity) echo 0; else echo $today_total_loss_quantity;  ?> </h3>
                        <p> Today’s Milk Loss </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                    </div>
                    <a href="view-milk-loss.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select sum(amount) total_expense from tbl_expenses");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_expense = $row["total_expense"];
                            }
                        }
                    ?>
                        <h3> <?php if(!$total_expense) echo 0; else echo $total_expense; ?></h3>
                        <p> Total Expenses </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="view-expenses.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                    <?php
                        $today = date("Y/m/d");
                        $result = mysqli_query($conn, "select sum(amount) today_total_expense from tbl_expenses where cast(timestamp as date) = '$today'");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $today_total_expense = $row["today_total_expense"];
                            }
                        }
                    ?>
                        <h3> <?php if(!$today_total_expense) echo 0; else echo $today_total_expense; ?> </h3>
                        <p> Today's Expense </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="view-expenses.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
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
