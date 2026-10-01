<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
    <body class="bg-light">
        <!--------------------------------------->

        <div class="home d-flex flex-column vh-100">
            <div class="bg-white shadow-sm">
                <div class="d-flex align-items-center justify-content-between mb-auto p-3 osahan-header">
                    <div class="d-flex align-items-center gap-2 me-auto">
                        <a href="profile"><img src="img/favorite/favorite-4.jpg" alt="" class="img-fluid rounded-circle icon"></a>
                        <div class="ps-1">
                            <p class="text-orange m-0 small">Welcome</p>
                            <p class="fw-bold mb-0 text-primary fw-bold">Hey, <?= $emp_name; ?> !</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="notification" class="bg-white shadow rounded-circle icon">
                            <span class="mdi mdi-bell-outline mdi-18px text-primary"></span>
                        </a>
                    </div>
                </div>               
            </div>


            <div class="vh-100 my-auto overflow-auto body-fix-osahan-footer">
                <div class="p-3">
                    <div class="bg-white rounded-4 px-3 pt-3 overflow-hidden edit-profile-back shadow mb-3">
                        <h6 class="pb-2">Personal Info</h6>
                        <div class="d-flex">
                            <div class="col">
                                <p><span class="text-muted small">Name</span><br><?= $emp_name; ?></p>
                            </div>
                            <div class="col">
                                <p><span class="text-muted small">ID</span><br><?= $emp_code; ?></p>
                            </div>
                            <div class="col">
                                <p><span class="text-muted small">Job Type</span><br><?= $emp_job_type; ?></p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col">
                                <p><span class="text-muted small">Department</span><br><?= $emp_department; ?></p>
                            </div>
                            <div class="col">
                                <p><span class="text-muted small">Phone</span><br><?= $emp_mobile; ?></p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col">
                                <p><span class="text-muted small">Designation</span><br><?= $emp_designation; ?></p>
                            </div>
                            <div class="col">
                                <p><span class="text-muted small">Loaction</span><br><?= $emp_location; ?></p>
                            </div>
                        </div>
                        <a href="#" class="link-dark">
                            <div class="edit-profile-icon bg-primary text-white">
                                <span class="mdi mdi-square-edit-outline h2 m-0 pt-3 pe-2"></span>
                            </div>
                        </a>
                    </div>
                    <div class="rounded-4 shadow overflow-hidden">
                        <a href="notification" class="link-dark">
                            <div class="bg-white d-flex align-items-center justify-content-between p-3 border-bottom">
                                <h6 class="m-0">Notification</h6>
                                <span class="mdi mdi-chevron-right mdi-24px icon shadow rounded-pill"></span>
                            </div>
                        </a>
                        <a href="imp-contact" class="link-dark">
                            <div class="bg-white d-flex align-items-center justify-content-between p-3 border-bottom">
                                <h6 class="m-0">Important Contacts</h6>
                                <span class="mdi mdi-chevron-right mdi-24px icon shadow rounded-pill"></span>
                            </div>
                        </a>
                        <a href="tutorial" class="link-dark">
                            <div class="bg-white d-flex align-items-center justify-content-between p-3">
                                <h6 class="m-0">Tutorial</h6>
                                <span class="mdi mdi-chevron-right mdi-24px icon shadow rounded-pill"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>



            <?php include 'elements/footer-navbar.php'; ?>
        </div>


        <!--------------------------------------->

        <?php include 'footer.php'; ?>
    </body>
</html>