<?php
  session_start();

  include "include/db_connection.php";

  if(isset($_POST['Signin'])){
    
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    


        $result = mysqli_query($conn, "select * from tbl_admin where mobile='$mobile' and password = '$password'");
    

    // $query = "select * from user_type where email='$email' and password ='$password'";
    
    if(mysqli_num_rows($result) < 1){
        echo "<script>alert('username or password does not match.')</script>";
    }else{

        while($row = mysqli_fetch_array($result)){
            $_SESSION["username"] = $row["name"];
            $_SESSION["id"] = $row["id"];

        }
        header("Location: dashboard.php" );

    }


 }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SabhaRaj Dudhalay</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/apple-icon.png">
    <link rel="shortcut icon" href="/favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

 
</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form id="login_form" action="#" method="post">
                        
                        <div class="form-group">
                            <span>Mobile Number</span>
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off">
                        </div>                      

                        <div class="form-group">
                            <span>Password</span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">
                        </div>

                        
                        <div class="checkbox">
                            <span class="pull-right">
                            <a href="#">Forgotten Password?</a>
                            </span>

                                </div>
                                <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="Sign in" id="sigin" name="Signin">
                                <div class="social-login-content">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>     
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

   
   <!-- Jquery Validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
    
    <script>

        jQuery(document).ready(function($){

            $("#login_form").validate({
                rules:{
                    mobile:{
                        required : true,
                        minlength : 10 ,
                        maxlength : 10,
                    },
                    password :{
                        required : true,
                        minlength : 5
                    },


                },
                messages:{

                    password :{
                        required :"please enter your password",
                        minlength :"Password must be 5 character long"
                    },

                    mobile :{
                        
                        required : "Enter valid Mobile Number.",
                    },
                    
                   
                }


            });
        });

    </script>


</body>
</html>
