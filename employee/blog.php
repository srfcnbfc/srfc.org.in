<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
    <?php
    $blog_sql = "SELECT blog_id,blog_title,blog_slug, blog_img FROM blog ORDER BY blog_id DESC";
    $blog_row = getData($blog_sql);
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
                <div class="p-3">
                    <h6 class="mb-2 pb-2 fw-bold text-black">SRFC Blogs</h6>
                    <div class="row row-cols-2 g-3">
                        <?php
                        foreach ($blog_row as $key => $blog) {
                            ?>
                            <div class="col">
                                <div class="card rounded-4 border-0 position-relative shadow-sm overflow-hidden">
                                    <img src="<?= $remote_url.'/upload/blog/'. $blog['blog_img']; ?>" alt="" class="card-img-top top-doctor-img">
                                    <div class="card-body small p-3 osahan-card-body">
                                        <h6 class="card-title fs-14 mb-1"><?= $blog['blog_title']; ?></h6>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 p-0 cf-btn">
                                        <a href="blogs/<?= $blog['blog_slug']; ?>" class="btn btn-sm btn-primary d-flex align-items-center justify-content-between small">
                                            <span class="small">Read More</span>
                                            <span class="mdi mdi-eye mdi-18px"></span>
                                        </a>
                                    </div>
                                </div>
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