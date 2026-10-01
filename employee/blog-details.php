<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
    <?php
    $blog_slug = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_GET, 'blog', FILTER_SANITIZE_URL)));
    $blog_sql = "SELECT * FROM blog WHERE blog_slug='$blog_slug'";
    if (getNumRows($blog_sql) > 0) {
        $blog= getsingleData($blog_sql);
    } else {
        echo "<script>window.history.back();</script>";
    }
    ?>
    <body class="bg-light">
        <!--------------------------------------->
        <div class="my-appointment d-flex flex-column vh-100">

            <div class="d-flex align-items-center justify-content-between mb-auto p-3 bg-white shadow-sm border-bottom osahan-header">
                <a href="blog" class="text-dark bg-white shadow rounded-circle icon">
                    <span class="mdi mdi-arrow-left mdi-18px"></span></a>
                <h6 class="mb-0 ms-3 me-auto fw-bold">Blog</h6>
                <div class="d-flex align-items-center gap-2">
                    <a href="notification" class="bg-white shadow rounded-circle icon">
                        <span class="mdi mdi-bell-outline mdi-18px text-primary"></span>
                    </a>
                </div>
            </div>


            <div class="vh-100 my-auto overflow-auto p-3">
                <div class="overflow-hidden rounded-4 shadow-sm mb-4">
                    <div class="px-3 appointment-banner">
                        <div class="d-flex align-items-center gap-3">
                            <img src="<?= $remote_url.'upload/blog/'.$blog['blog_img'];?>" alt="" class="img-fluid ">
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="mb-4">
                        <h5 class="mb-1 text-black"><?=$blog['blog_title']; ?></h5>
                        <div class="d-flex align-items-center gap-1 text-warning">
                            <span class="mdi mdi-star"></span>
                            <span class="mdi mdi-star"></span>
                            <span class="mdi mdi-star"></span>
                            <span class="mdi mdi-star"></span>
                            <span class="mdi mdi-star"></span>
                            <span class="badge rounded-pill text-bg-warning">5</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <p class="text-muted text-justify"><?=$blog['blog_descp']; ?></p>
                        <br/><br/><br/>
                    </div>
                    
                    
                </div>
            </div>

            <?php include 'elements/footer-navbar.php'; ?>
        </div>




        <!--------------------------------------->

        <?php include 'footer.php'; ?>
    </body>
</html>