<div class="row pt-50">
    <div class="col-lg-12">
        <div class="dreamits-top-title text-center">
            <h3> Our Investor</h3>
            <p>We partner with forward-thinking corporations, suppliers, associations and businessmen to ensure our various client base has the connections needed to handle the multiple demands of operating a full-service business.</p>
        </div>
    </div>
</div>
<div class="row pt-30">
    <div class="brand-list owl-carousel">
    <?php foreach ($investor_row as $key => $investor) {?>
        <div class="col-lg-12">
            <div class="brand-single-box">
                <div class="brand-thumb">
                    <img src="upload/investor/<?= $investor['investor_img']; ?>" alt="<?= $investor['investor_name']; ?>">
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>