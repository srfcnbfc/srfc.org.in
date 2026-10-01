<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <!------------------------------------------------------------------------------>
<body class="bg-light">
    <div class="sign-in p-4">
        <div class="d-flex align-items-start justify-content-between mb-4">
            <div>
                <span class="mdi mdi-lock-open-variant-outline text-primary display-1"></span>
                <h2 class="my-3 fw-bold">Reset Password</h2>
                <p class="text-muted mb-0">Enter a new Password</p>
            </div>
            <a class="toggle text-dark d-flex align-items-center justify-content-center bg-white shadow rounded-circle icon" href="#"><i class="bi bi-list fs-3 d-flex"></i></a>
        </div>
        <form>
            <div class="mb-3">
                <label for="exampleFormControlPassword" class="form-label mb-1">New Password</label>
                <div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlPassword">
                    <span class="input-group-text bg-transparent rounded-0 border-0" id="password">
                        <span class="mdi mdi-lock-open-variant-outline mdi-18px text-muted"></span>
                    </span>
                    <input type="password" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your password" aria-label="Type your password" aria-describedby="password" value="123456789">
                </div>
            </div>
            <div class="mb-4">
                <label for="exampleFormControlPassword1" class="form-label mb-1">Confirm Password</label>
                <div class="input-group border bg-white rounded-3 py-1" id="exampleFormControlPassword1">
                    <span class="input-group-text bg-transparent rounded-0 border-0" id="password1">
                        <span class="mdi mdi-lock-outline mdi-18px text-muted"></span>
                    </span>
                    <input type="password" class="form-control bg-transparent rounded-0 border-0 px-0" placeholder="Type your confirm password" aria-label="Type your confirm password" aria-describedby="password1" value="123456789">
                </div>
            </div>
        </form>
    </div>

    <div class="footer fixed-bottom m-4">
        <a href="login" class="btn btn-info btn-lg w-100 rounded-4">Reset Password</a>
    </div>


    <!------------------------------------------------------------------------------>
    <?php include 'footer-scripts.php'; ?>
</body>
</html>