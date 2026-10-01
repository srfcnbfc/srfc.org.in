<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <!------------------------------------------------------------------------------>
    <body class="bg-light">
        <div class="verify p-4">
            <div class="d-flex align-items-start justify-content-between mb-4">
                <div>
                    <span class="mdi mdi-account-check-outline display-1 text-primary"></span>
                    <h2 class="my-3 fw-bold">Verification Code</h2>
                    <p class="text-muted mb-0">Enter The Code We Send You?</p>
                </div>
               </div>
            <div class="d-flex gap-1 mb-2">
                <div class="col">
                    <input type="text" class="form-control form-control-lg text-center py-3" value="5" maxlength="1">
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-lg text-center py-3" value="2" maxlength="1">
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-lg text-center py-3" value="7" maxlength="1">
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-lg text-center py-3" value="2" maxlength="1">
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-lg text-center py-3" value="8" maxlength="1">
                </div>
            </div>
            <p class="text-muted text-center mt-4">Didn't receive it? <a href="#" class="ml-2 text-primary">Resent Code</a></p>
        </div>

        <div class="footer fixed-bottom m-4">
            <a href="reset-password" class="btn btn-info btn-lg w-100 rounded-4">Verify</a>
        </div>


        <!------------------------------------------------------------------------------>
        <?php include 'footer-scripts.php'; ?>
    </body>
</html>