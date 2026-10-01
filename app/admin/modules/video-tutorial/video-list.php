<?php
$video_sql = "SELECT * FROM video_tutorial ORDER BY video_id DESC";
$video_row = getData($video_sql);
?>
<div class="card-body pb-0">
    <div class="details-bookmark text-center">
        <div class="row" id="bookmarkData">
            <?php
            foreach ($video_row as $video) {
                ?>

                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 xl-50 box-col-6">
                    <div class="card bookmark-card o-hidden">
                        <div class="details-website">
                            <iframe src="http://www.youtube.com/embed/<?= $video['video_link']?>?modestbranding=1" height=""  width="100%"></iframe>

                            <button class="favourite-icon favourite_0 btn btn-danger delete_data" id="<?= $video['video_id']; ?>"><a href="javascript:void(0)"><i class="fa fa-trash"></i></a></button>
                            <div class="desciption-data">
                                <div class="title-bookmark">
                                    <h6><?= $video['video_title']; ?></h6>
                                    <p><?= $video['video_category']; ?></p>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
