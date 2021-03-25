    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
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
                            <li><i class="fa fa-arrows-h"></i><a href="ui-badges.html">Assign Client</a></li>
                            <li><i class="fa fa-eye"></i><a href="view-staff.php">Staff List</a></li>
                            <li><i class="fa fa-eye"></i><a href="ui-badges.html">Assigned List</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Client</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user-plus"></i><a href="tables-data.html">Add New Client</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">View Client</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Provider</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-user-plus"></i><a href="forms-advanced.html">Add New Provider</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="forms-basic.html">View Providers</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Milk Type</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="tables-data.html">Add New Type</a></li>
                            <li><i class="fa fa-eye"></i><a href="tables-basic.html">View All Types</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Daily Milk</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-right"></i>Recieved Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Add New Recieved</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">View Recieved Milk</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-arrow-left"></i>Delivered Milk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Add New Delivered</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">View Delivered Milk</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-first-order"></i>Orders</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Add New Delivered</a></li> -->
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">View Orders</a></li>
                        </ul>
                    </li>
    
                    <h3 class="menu-title">Manage Payments</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Clients</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="font-fontawesome.html">Add Payment</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="font-themify.html">View Payment</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Provider</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="charts-chartjs.html">Add Payment</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="charts-flot.html">View Payment</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Expenses</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Staff</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="maps-gmap.html">Add Salary</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="maps-vector.html">View Staff Salary</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-random"></i>Other Expenses</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="page-login.html">Add New Expense</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="page-register.html">View Expense</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Milk Lost</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus"></i><a href="page-login.html">Add New Loss</a></li>
                            <li><i class="menu-icon fa fa-money"></i><a href="page-register.html">View Loss</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->