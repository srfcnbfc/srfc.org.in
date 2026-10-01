<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
    <?php
    $notification_sql = "SELECT * FROM emp_notification WHERE emp_code='ALL' ORDER BY notification_id DESC";
    $notification_row = getData($notification_sql);
    ?>
    <body class="bg-light">
        <!--------------------------------------->
        <div class="my-appointment d-flex flex-column vh-100">

            <div class="d-flex align-items-center justify-content-between mb-auto p-3 bg-white shadow-sm border-bottom osahan-header">
                <a href="home" class="text-dark bg-white shadow rounded-circle icon">
                    <span class="mdi mdi-arrow-left mdi-18px"></span></a>
                <h6 class="mb-0 ms-3 me-auto fw-bold">Notifications</h6>
                <div class="d-flex align-items-center gap-2">
                    <a href="notification" class="bg-white shadow rounded-circle icon">
                        <span class="mdi mdi-bell-outline mdi-18px text-primary"></span>
                    </a>
                </div>
            </div>


            <div class="vh-100 my-auto overflow-auto body-fix-osahan-footer">
                <div>
                    <h6 class="border-bottom fw-bold text-black p-3 mb-0">My Latest Notification</h6>

                    <?php foreach ($notification_row as $key => $notification) { ?>
                        <div class="d-flex gap-3 bg-white border-bottom p-3">
                            <div>
                                <span class="bg-info-subtle rounded-pill notification-icon">
                                    <span class="mdi mdi-alert-circle-check-outline text-info"></span>
                                </span>
                            </div>
                            <div>
                                <p class="text-muted mb-2"><?= $notification['notification_msg']; ?></p>
                                <a href="#"><?= date_format(date_create($notification['created_at']),"d-M-Y"); ?></a>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>

            <?php include 'elements/footer-navbar.php'; ?>
        </div>




        <!--------------------------------------->

        <?php include 'footer.php'; ?>
    </body>
</html>