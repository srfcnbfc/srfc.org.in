<!DOCTYPE html>
<html lang="en">
    <?php include 'header.php'; ?>
    <?php
    $videoplay_id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    $video_play_sql = "SELECT * FROM video_tutorial WHERE video_id = '$videoplay_id'";
    $video_play_row = getsingleData($video_play_sql);

    $cat_sql = "SELECT * FROM category";
    $cat_row = getData($cat_sql);

    $video_sql = "SELECT * FROM video_tutorial WHERE video_id !='$videoplay_id' LIMIT 6";
    $video_row = getData($video_sql);
    ?>
    <body class="bg-light">
        <!--------------------------------------->

        <div class="home d-flex flex-column vh-100">
            <div class="bg-white shadow-sm">
                <div class="d-flex align-items-center justify-content-between mb-auto p-3 bg-white shadow-sm border-bottom osahan-header">
                    <a href="tutorial" class="text-dark bg-white shadow rounded-circle icon">
                        <span class="mdi mdi-arrow-left mdi-18px"></span></a>
                    <h6 class="mb-0 ms-3 me-auto fw-bold"> <?= $video_play_row['video_title']; ?></h6>
                    <div class="d-flex align-items-center gap-2">
                        <a href="notification" class="bg-white shadow rounded-circle icon">
                            <span class="mdi mdi-bell-outline mdi-18px text-primary"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="vh-100 my-auto overflow-auto body-fix-osahan-footer">
                <div class="p-2 text-center ">
                    <h6 class="fw-bold text-black">Video Tutorial</h6>
                </div>
                <div class="p-3 mb-2">
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $video_play_row['video_link'] ?>?modestbranding=1&showinfo=0" title="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>
                </div>
                <div class="p-3 mb-2">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-department" role="tabpanel" aria-labelledby="pills-department-tab" tabindex="0">
                            <div class="row row-cols-4 g-2">
                                <?php foreach ($cat_row as $key => $category) { ?>
                                    <div class="col">
                                        <div class="bg-white rounded-4 text-center p-1 shadow-sm">
                                            <a href="tutorials/<?= $category['category_slug']; ?>">
                                                <img src="<?= $remote_url . 'upload/icon/' . $category['category_icon']; ?>" alt="" class="img-fluid">
                                                <p class="text-truncate pt-2 m-0 small"><?= $category['category_name']; ?></p>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
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