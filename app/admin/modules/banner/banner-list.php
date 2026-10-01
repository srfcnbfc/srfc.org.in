
<div class="card-body pb-0">
    <div class="details-bookmark text-center">
        <div class="row" id="bookmarkData">
            <?php
            $banner_sql = "SELECT * FROM banner ORDER BY banner_id DESC";
            $banner_row = getData($banner_sql);
            foreach ($banner_row as $banner) {
                ?>

                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 xl-50 box-col-6">
                    <div class="card bookmark-card o-hidden">
                        <div class="details-website"><img  src="../../upload/slider/<?= $banner['banner_img']; ?>" alt="<?= $banner['b_main_heading']; ?>" height="250px" width="100%">
                            <button class="favourite-icon favourite_0 btn btn-danger delete_data" id="<?= $banner['banner_id']; ?>"><a href="javascript:void(0)"><i class="fa fa-trash"></i></a></button>
                            <div class="desciption-data">
                                <div class="title-bookmark">
                                    <p><?= $banner['banner_top_msg']; ?></p>
                                    <h6><?= $banner['banner_headline']; ?></h6>
                                    <p><?= $banner['banner_btm_msg']; ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
