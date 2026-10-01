<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
    <?php
    $impcontact_sql = "SELECT * FROM imp_contact ORDER BY contact_id DESC";
    $impcontact_row = getData($impcontact_sql);
    ?>
    <body class="bg-light">
        <!--------------------------------------->
        <div class="my-appointment d-flex flex-column vh-100">

            <div class="d-flex align-items-center justify-content-between mb-auto p-3 bg-white shadow-sm border-bottom osahan-header">
                <a href="home" class="text-dark bg-white shadow rounded-circle icon">
                    <span class="mdi mdi-arrow-left mdi-18px"></span></a>
                <h6 class="mb-0 ms-3 me-auto fw-bold">My Leads</h6>
                <div class="d-flex align-items-center gap-2">
                    <a href="notification" class="bg-white shadow rounded-circle icon">
                        <span class="mdi mdi-bell-outline mdi-18px text-primary"></span>
                    </a>
                </div>
            </div>

            
            <div class="vh-100 my-auto overflow-auto body-fix-osahan-footer">
                <?php foreach ($impcontact_row as $key => $impcontact) { ?>
                    <a href="tel:<?= $impcontact['person_mobile'] ?>" class="link-dark">
                        <div class="bg-white d-flex align-items-center gap-3 p-3 mb-1 shadow-sm">
                            <img src="upload/icon/user.png" alt="" class="img-fluid rounded-4 voice-img">
                            <div>
                                <h6 class="mb-1"><?= $impcontact['person_name'] ?></h6>
                                <p class="text-muted mb-2"><?= $impcontact['person_designation'] ?></p>
                                <p class="text-muted m-0">
                                    <span class="mdi mdi-map-marker text-primary me-1"></span><?= $impcontact['person_location'] ?>
                                </p>
                            </div>
                            <div class="ms-auto">
                                <div class="d-flex justify-content-end">
                                    <div class="bg-info-subtle rounded-circle icon mb-3">
                                        <span class="mdi mdi-phone-outline mdi-24px text-info"></span>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>

     <?php include 'elements/footer-navbar.php'; ?>
        </div>
        



        <!--------------------------------------->

        <?php include 'footer.php'; ?>
    </body>
</html>