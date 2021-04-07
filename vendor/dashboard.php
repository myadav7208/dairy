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

        <?php if(isset($_SESSION["user_type"]) && ($_SESSION["user_type"][0] == "client")){ ?>
        <div class="row mx-auto">
            <div class="col-sm-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner text-center">
                 <?php
                 $id = $_SESSION["id"];
                    $query = "select *from tbl_order where client_id=$id ORDER BY order_fill_date DESC LIMIT 1";
                    $run_query = mysqli_query($conn , $query);
                    if($run_query){
                        while($row = mysqli_fetch_assoc($run_query)){
                        echo '<h1 style="font-weight:normal; color : white">'.$row["quantity"].'</h1>';
                        }
                    }

                ?>
                <h6 style="color: white">Last Order Quantity</h6>
              </div>
              <div class="icon text-center text-white">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
              <hr>
              
          </div>
          </div>
        <div class="col-sm-4">
          <div class="small-box bg-secondary">
             
              <div class="inner text-center">
                 <?php
                 $id = $_SESSION["id"];
                    $query = "select* from tbl_client_payment where client_id =$id order by date_time DESC LIMIT 1";

                    $run_query = mysqli_query($conn , $query);
                    if($run_query){
                        while($row = mysqli_fetch_assoc($run_query)){
                        echo '<h1 style="font-weight:normal; color : white">'.$row["amount"].'</h1>';

                        }
                    }

                ?>
                <h6 style="color: white">Last Payment</h6>
              </div>
              <div class="icon text-center text-white">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
              <hr>
              
          </div>
          </div>

         <!-- .content -->

            <div class="col-sm-4">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner text-center">
                 <?php
                 $id = $_SESSION["id"];
                    $query = "select * from tbl_total_client_amount where client_id=$id ORDER BY  last_updated_date DESC LIMIT 1";

                    $run_query = mysqli_query($conn , $query);
                    if($run_query){
                        while($row = mysqli_fetch_assoc($run_query)){
                        echo '<h1 style="font-weight:normal; color : white">'.$row["total_amount"].'</h1>';
                        }
                    }

                ?>
                <h6 style="color: white">Balance Amount</h6>
              </div>
              <div class="icon text-center text-white">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
              <hr>
              
          </div>

        </div> 
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php } ?>


  <!-- Staff_ View -->
        <?php if(isset($_SESSION["user_type"]) && ($_SESSION["user_type"][0] == "staff")){ ?>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                    
                       
                        <p class="text-light">Milk Delivered</p>

                        <div class="text px-3" style="height:70px;" height="70">
                        <?php
                        $id = $_SESSION["id"];
                        $query = "SELECT * FROM tbl_milk_delivered where staff_id = $id ORDER by date_time DESC limit 1";

                        $run_query = mysqli_query($conn , $query);
                          if($run_query){
                        while($row = mysqli_fetch_assoc($run_query)){
                        echo '<h1 style="font-weight:normal; color : white">'.$row["quantity"].'</h1>';

                        }
                    }

                ?>

                        </div>


                    </div>
                </div>
            </div>
            <!--/.col-->

<?php } ?>     




  <!-- Milk-Provider -->
        <?php if(isset($_SESSION["user_type"]) && ($_SESSION["user_type"][0] == "milk_provider")){ ?>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                    
                       
                        <p class="text-light">Last Delivered Quantity</p>

                        <div class="text px-3" style="height:70px;" height="70">
                        <?php
                        $id = $_SESSION["id"];
                        $query = "SELECT * FROM tbl_recieved_milk where milk_provider_id = $id ORDER by date_time DESC limit 1";

                        $run_query = mysqli_query($conn , $query);
                          if($run_query){
                        while($row = mysqli_fetch_assoc($run_query)){
                        echo '<h1 style="font-weight:normal; color : white">'.$row["quantity"].'</h1>';

                        }
                    }

                ?>

                        </div>


                    </div>
                </div>
            </div>
            <!--/.col-->


              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                    
                       
                        <p class="text-light">Amount</p>

                        <div class="text px-3" style="height:70px;" height="70">
                        <?php
                        $id = $_SESSION["id"];
                        $query = "SELECT * FROM tbl_milk_provider_amount where milk_provider_id =$id ORDER by last_updated_date DESC limit 1";

                        $run_query = mysqli_query($conn , $query);
                          if($run_query){
                        while($row = mysqli_fetch_assoc($run_query)){
                        echo '<h1 style="font-weight:normal; color : white">'.$row["total_amount"].'</h1>';

                        }
                    }

                ?>

                        </div>


                    </div>
                </div>
            </div>

<?php } ?>  

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->



<?php
    include "include/footer.php";
    ob_end_flush();
?>
