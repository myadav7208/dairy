<?php  
    include "include/db_connection.php";
    include "include/header.php";
?>

<style>
.footer {
   position:relative;
   bottom:0;
   width:100%;
   height:50px;   /* Height of the footer */
   background:#fff;
   text-align:center;
   color:#869099;
}

.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
    color:#fff;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
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

        <div class="content mt-3">


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
                        <h3> <?php  echo $total_mp; ?></h3>
                        <p> Milk Providers </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
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
                        <h3> <?php  echo $total_tc; ?> </h3>
                        <p> Happy Clients </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
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
                        <h3> <?php  echo $total_od; ?> </h3>
                        <p> Today's Orders </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_mp = $row["total_mp"];
                            }
                        }
                    ?>
                        <h3> 723 </h3>
                        <p> Today's Collection </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
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
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_mp = $row["total_mp"];
                            }
                        }
                    ?>
                        <h3> ₹185358 </h3>
                        <p> Today's Milk Recieved </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_mp = $row["total_mp"];
                            }
                        }
                    ?>
                        <h3> 5464 </h3>
                        <p> Total Collections </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_mp = $row["total_mp"];
                            }
                        }
                    ?>
                        <h3> 13436 </h3>
                        <p> Total Milk Loss </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_mp = $row["total_mp"];
                            }
                        }
                    ?>
                        <h3> ₹185358 </h3>
                        <p> Today’s Milk Loss </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_mp = $row["total_mp"];
                            }
                        }
                    ?>
                        <h3> 5464 </h3>
                        <p> Total Expenses </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                    <?php
                        $result = mysqli_query($conn, "select count(*) total_mp from tbl_milk_provider");
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $total_mp = $row["total_mp"];
                            }
                        }
                    ?>
                        <h3> 723 </h3>
                        <p> Today's Expense </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

<div class="footer">
    <span id="foot"><strong>Copyright &copy; 2020-2021 <a href="clpinfotech.com">CLP INFOTECH PVT LTD</a>.</strong> All rights
    reserved.</span>
  </div>
        


        </div> <!-- .content -->
    </div><!-- /#right-panel -->


    <!-- Right Panel -->

<?php
    include "include/footer.php";
?>
