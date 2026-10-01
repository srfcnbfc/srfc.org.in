<?php
/////////////////////////Banner//////////
$banner_sql = "SELECT * FROM banner ORDER by banner_id DESC ";
$banner_row = getData($banner_sql);
?>
<div class="mb-0 pt-3">
    <div class="available-doctor ps-2 ms-1">
        <?php foreach ($banner_row as $key => $banner) { ?>

            <div class="available-doctor-item" >
                <div class="bg-primary text-white rounded-4 p-3 doctor-book-back" style="height: 180px">
                    <h1 class="mb-1 doctor-book-back-title"><?= $banner['banner_top_msg']; ?><br/>
                        <span class="h4 text-warning overflow-hidden rounded-4 m-0 bg-white">
                            <b class="bg-light-subtle text-primary px-1 rounded">Get</b>
                            <b class="bg-info fw-normal text-white px-1 rounded">Now!</b>
                        </span>
                    </h1>
                    <div class="doctor-book-img">
                        <img src="<?= $remote_url.'upload/slider/'.$banner['banner_img']?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>