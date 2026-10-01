<?php
@ob_start();
session_start();
if (isset($_SESSION['EmpSessionID'])) {
    header("Location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <!------------------------------------------------------------------------------>
    <body class="bg-light">
        <div class="sign-in p-4">
            <div class="d-flex align-items-start justify-content-between mb-4">
                <div>
                    <span class="mdi mdi-account-circle-outline display-1 text-primary"></span>
                    <h2 class="my-3 fw-bold">Let's Sign in</h2>
                    <p class="text-muted mb-0">Welcome Back, You've<br>been missed!</p>
                </div>
            </div>
            <form id="login-form" action=""method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlemployeeid" class="form-label mb-1">Employee ID</label>
                    <div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlemployeeid">
                        <span class="input-group-text bg-transparent rounded-0 border-0" id="mail">
                            <span class="mdi mdi-account-circle-outline mdi-18px text-muted"></span>
                        </span>
                        <input type="text" name="employeeID" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Enter Your Employee ID" aria-label="Enter Your Employee ID" aria-describedby="employeeid" value="" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlMobile" class="form-label mb-1">Mobile</label>
                    <div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlMobile">
                        <span class="input-group-text bg-transparent rounded-0 border-0" id="password">
                            <span class="mdi mdi-lock-outline mdi-18px text-muted"></span></span>
                        <input type="tel" name="employeeMobile" maxlength="10" minlength="10" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Enter your Mobile No." aria-label="Enter your Mobile No." aria-describedby="mobile" value="" required>
                    </div>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Remember Me</label>
                </div>
                <div>
                    <button type="submit" name="login" class="btn btn-info btn-lg w-100 rounded-4 mb-2">Login</button>
                   
                </div>
            </form>
            <div id="response"></div>
        </div>

        <!------------------------------------------------------------------------------>
        <?php include 'footer-scripts.php'; ?>
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
                            if (data[0].login === 1) {
                                $("#login-form")[0].reset();
                                window.location.href = "verify";
                            } else {
                                console.log('invaild');
                                $("#login-form")[0].reset();
                                $("#response").html("<p class='text-danger text-center medium'>Login failed. Please check your credentials.</p>");
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>