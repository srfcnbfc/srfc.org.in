<?php
@ob_start();
session_start();
if (isset($_SESSION['adminemail'])) {
    header("Location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Jwellery Admin Panel.">
        <meta name="keywords" content="Admin Panel">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
        <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
        <title>Admin Panel</title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">
        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">
        <!-- Themify icon-->
        <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">
        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">
        <!-- Feather icon-->
        <link rel="stylesheet" type="text/css" href="../assets/css/feather-icon.css">
        <!-- Plugins css start-->
        <!-- Plugins css Ends-->
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
        <!-- Responsive css-->
        <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    </head>
    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">    
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
        <!-- page-wrapper Start-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5"><img class="bg-img-cover bg-center" src="../../upload/common/login.svg" alt="looginpage"></div>
                <div class="col-xl-7 p-0">
                    <div class="login-card">
                        <form class="theme-form login-form" id="login-form" action=""method="POST">
                            <h4>Admin Login</h4>
                            <h6>Welcome Admin ! Log in to your account.</h6>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Enter Your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
                                    <div class="invalid-tooltip">Please enter proper email.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                    <div class="invalid-tooltip">Please enter password.</div>

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" name="login" value="login" class="btn btn-primary btn-block" type="submit">Sign in</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- latest jquery-->
        <script src="../assets/js/jquery-3.5.1.min.js"></script>
        <!-- feather icon js-->
        <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- Sidebar jquery-->
        <script src="../assets/js/config.js"></script>
        <!-- Bootstrap js-->
        <script src="../assets/js/bootstrap/popper.min.js"></script>
        <script src="../assets/js/bootstrap/bootstrap.min.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends--><!-- Plugins JS Ends-->
        <script src="../assets/js/sweet-alert/sweetalert.min.js"></script>


        <!-- Theme js-->
        <script src="../assets/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->
      
        <script>
            $(document).ready(function () {
                $("#login-form").submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: "login-check.php",
                        method: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            var data = JSON.parse(response);
                            $("#login-form")[0].reset();
                            swal(data[0].msg, "", data[0].status);
                            if (data[0].login == 1) {
                                setTimeout(' window.location.href = "dashboard.php"; ', 2000);
                            }
                        }

                    });
                });
            });
        </script>
    </body>
</html>