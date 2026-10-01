<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <!------------------------------------------------------------------------------>
    <body class="bg-light">
        <div class="sign-in p-4">
            <div class="d-flex align-items-start justify-content-between mb-4">
                <div>
                    <span class="mdi mdi-account-lock-outline display-1 text-primary"></span>
                    <h2 class="my-3 fw-bold">Forget Password</h2>
                    <p class="text-muted mb-0">We need your registration email account to send you password reset code!</p>
                </div>
                <a class="toggle bg-white shadow rounded-circle icon d-flex align-items-center justify-content-center fs-5" href="#"><i class="bi bi-list fs-3 d-flex"></i></a>
            </div>
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlemployeeid" class="form-label mb-1">Employee ID</label>
                    <div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlemployeeid">
                        <span class="input-group-text bg-transparent rounded-0 border-0" id="mail">
                            <span class="mdi mdi-account-circle-outline mdi-18px text-muted"></span>
                        </span>
                        <input type="text" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Enter Your Employee ID" aria-label="Enter Your Employee ID" aria-describedby="employeeid" value="" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlPassword" class="form-label mb-1">Password</label>
                    <div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlPassword">
                        <span class="input-group-text bg-transparent rounded-0 border-0" id="password">
                            <span class="mdi mdi-lock-outline mdi-18px text-muted"></span></span>
                        <input type="password" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your password" aria-label="Type your password" aria-describedby="password" value="123456789">
                    </div>
                </div>

                <div>
                    <a href="forget-otp-verify" class="btn btn-info btn-lg w-100 rounded-4 mb-2">Forget Now</a>
                </div>
            </form>
            <div>
                <a href="login" class="btn btn-info btn-lg w-100 rounded-4 mb-2"><i class="mdi mdi-arrow-left  "></i>Sign In</a>
            </div>
        </div>



        <!------------------------------------------------------------------------------>
        <?php include 'footer-scripts.php'; ?>
    </body>
</html>