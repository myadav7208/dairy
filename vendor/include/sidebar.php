    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- <a class="navbar-brand" href="./"><img src="../images/logo.png" alt="Logo"></a> -->
                <!-- <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a> -->
                <a class="navbar-brand" href="./"><span style="color:#fff">SabhaRaj Dudhalay</span></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">Daily Milk</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-left"></i>Delivered Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                        <?php if(isset($_SESSION["user_type"]) && ($_SESSION["user_type"][0] == "staff"))
                    { ?>
                            <li><i class="menu-icon fa fa-map-o"></i><a href="delivered-milk.php">Add New Delivered</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="view-delivered-milk.php">View Delivered Milk</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="milk-loss.php">Add Milk Loss</a></li>
                            
                       <?php } ?>

                    <?php if(isset($_SESSION["user_type"]) && ($_SESSION["user_type"][0] == "client")){?>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="add-order-milk.php">Order</a></li>
                     <?php  } ?>

                    <?php if(isset($_SESSION["user_type"]) && ($_SESSION["user_type"][0] == "milk_provider")){?>
                            <!-- <li><i class="menu-icon fa fa-street-view"></i><a href="milk-provider.php">Milk Provider</a></li> -->
                            <li><i class="menu-icon fa fa-arrow-left"></i><a href="report.php">Reports</a></li>
                     <?php  } ?>

                     

                        </ul>
                    </li>

                 <?php if(isset($_SESSION["user_type"]) && ($_SESSION["user_type"][0] == "staff"))
                    { ?>
                    <h3 class="menu-title">Payments</h3>
                    <li class="menu-item-has-children dropdown">
                   
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Clients</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="./clients.php">Add Payment</a></li>
                            <!-- <li><i class="menu-icon fa fa-street-view"></i><a href="add-order-milk.php">Order Milk</a></li> -->
                    <?php } ?>
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

