<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
     <?php
    $video_sql = "SELECT * FROM video_tutorial LIMIT 6";
    $video_row = getData($video_sql);
    ?>
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
                <?php include 'elements/home-slider.php'; ?>

                <div class="p-3 mb-2">
                    <div class="row row-cols-4 g-2">
                        <div class="col">
                            <div class="bg-white text-center rounded-4 p-2 shadow-sm">
                                <a href="tutorial" class="link-dark">
                                    <img src="upload/icon/tutorial.png" alt="Tutorial" class="img-fluid px-2">
                                    <p class="text-truncate small pt-2 m-0">Tutorial</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="bg-white text-center rounded-4 p-2 shadow-sm">
                                <a href="blog" class="link-dark">
                                    <img src="upload/icon/blog.png" alt="Blog" class="img-fluid px-2">
                                    <p class="text-truncate small pt-2 m-0">Blog</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="bg-white text-center rounded-4 p-2 shadow-sm">
                                <a href="#" onclick="return false;" class="link-dark">
                                    <img src="upload/icon/lead.png" alt="Lead" class="img-fluid px-2">
                                    <p class="text-truncate small pt-2 m-0">Leads</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="bg-white text-center rounded-4 p-2 shadow-sm">
                                <a href="imp-contact"  class="link-dark">
                                    <img src="upload/icon/contact.png" alt="Contacts" class="img-fluid px-2">
                                    <p class="text-truncate small pt-2 m-0">Contacts</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                     <div class="mb-3">
                    <h6 class="mb-2 pb-1 fw-bold px-3 text-black">Latest Tutorial Video</h6>
                    <div class="top-doctors ps-2 ms-1">
                        <?php foreach ($video_row as $key => $video) {
                            ?>
                            <div class="top-doctor-item">
                                <a href="video-play/<?= $video['video_id']; ?>" class="link-dark">
                                    <div class="card bg-white border-0 rounded-4 shadow-sm overflow-hidden">
                                        <img src="<?= $remote_url . 'upload/tutorial-video/' . $video['video_thumb']; ?>" class="card-img-top top-doctor-img" alt="...">
                                        <div class="card-body small p-3 osahan-card-body">
                                            <p class="card-title fw-semibold mb-0 text-truncate fs-14"><?= $video['video_title']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>



            <?php include 'elements/footer-navbar.php'; ?>
        </div>


        <!--------------------------------------->

        <?php include 'footer.php'; ?>
    </body>
</html>