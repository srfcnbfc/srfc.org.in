  
<div class="widget-categories-box">
    <!-- categories title -->
    <div class="categories-title">
        <h4> Our Products </h4>
    </div>
    <!-- widget categories menu -->
    <div class="widget-categories-menu">
        <ul>
            <?php foreach ($service_menu_row as $service_menu) { ?>
            <li><a href="<?= 'services/' . $service_menu['service_slug']; ?>"><i class="fa fa-check-circle"></i> <?= $service_menu['service_name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<!-- categoreis thumb -->
<div class="">
    <!-- widget categories content  -->
    <img src="upload/other/side-banner.jpg" alt="Shri Ram Finance" class="img-fluid">
</div>
<div class="widget-categories-thumb">
    <!-- widget categories content  -->
    <div class="widget-categories-content text-center">
        <div class="logo-thumb">
            <a href="/"> <img src="upload/logo-mobile.png" alt="" width="250px"> </a>
        </div>
        <div class="widget-title2">
            <h3>Get Loan Fast</h3>
        </div>
        <div class="widget-button">
            <a href="https://apply.srfcnbfc.com/"> <i class="bi bi-envelope"></i> Apply Now</a>
        </div>
    </div>
</div>
