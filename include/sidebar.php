    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">
                <!-- <img src="images/logo.png" alt="Logo">-->
                    <span>SabhaRaj Dhudhalay</span>
                </a> 
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Master Data</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Staff</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user-plus"></i><a href="staff.php">Add New Staff</a></li>
                            <!-- <li><i class="fa fa-arrows-h"></i><a href="assign-client.php">Assign Client</a></li> -->
                            <li><i class="fa fa-eye"></i><a href="view-staff.php">Staff List</a></li>
                            <!-- <li><i class="fa fa-eye"></i><a href="view-assigned-client.php">Assigned List</a></li> -->
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Client</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user-plus"></i><a href="client.php">Add New Client</a></li>
                            <li><i class="fa fa-table"></i><a href="view-client.php">View Client</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Provider</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-user-plus"></i><a href="milk-provider.php">Add New Provider</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="view-milk-provider.php">View Providers</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Product Type</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="milk-type.php">Add New Type</a></li>
                            <li><i class="fa fa-eye"></i><a href="view-milk-type.php">View All Types</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Daily Milk</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-right"></i>Handover Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="handover-milk.php">Add</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="view-handover-milk.php">View</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-right"></i>Recieved Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="recieved-milk.php">Add New Recieved</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="view-recieved-milk.php">View Recieved Milk</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-left"></i>Delivered Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="delivered-milk.php">Add New Delivered</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="view-delivered-milk.php">View Delivered Milk</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-first-order"></i>Orders</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Add New Delivered</a></li> -->
                            <li><i class="menu-icon fa fa-table"></i><a href="view-orders.php">View Orders</a></li>
                        </ul>
                    </li>
    
                    <h3 class="menu-title">Manage Payments</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Clients</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="client-payment.php">Add Payment</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="view-client-payment.php">View Payment</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Provider</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="milk-provider-payment.php">Add Payment</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="view-milk-provider-payment.php">View Payment</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Expenses</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Staff</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="staff-salary.php">Add Salary</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="view-staff-salary.php">View Staff Salary</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-random"></i>Other Expenses</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="expenses.php">Add New Expense</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="view-expenses.php">View Expense</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Milk Lost</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="milk-loss.php">Add New Loss</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="view-milk-loss.php">View Loss</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Reports</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-right"></i>Recieved Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-clock-o"></i><a href="report-month-recieved-milk.php">Month Wise</a></li>
                            <li><i class="menu-icon fa fa-calendar"></i><a href="report-year-recieved-milk.php">Year Wise</a></li>
                            <li><i class="menu-icon fa fa-user"></i><a href="report-name-recieved-milk.php">Name Wise</a></li>

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-left"></i>Deliverd Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-clock-o"></i><a href="report-month-delivered-milk.php">Month Wise</a></li>
                            <li><i class="menu-icon fa fa-calendar"></i><a href="report-year-delivered-milk.php">Year Wise</a></li>
                            <li><i class="menu-icon fa fa-user"></i><a href="report-name-delivered-milk.php">Name Wise</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->