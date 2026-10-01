
<!--==================================================-->
<!-- Start Contact Location Section -->
<!--===================================================-->
<!--==================================================-->
<!-- Start consen Skills Area Css -->
<!--==================================================-->
<div class="skill-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="extra-animation-div wow fadeInDown" data-wow-delay="0.5s">
                    <div class="consen-section-title white">
                        <h2> Join the Community to learn </h2>
                        <h2> About our <span>Company</span></h2>
                    </div>
                    <div class="lines style-three upper pt-30 pb-10">
                        <div class="line"></div>
                    </div>
                </div>
                <form action="#" method="POST" id="dreamit-form">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <select class="form-control" id="city" name="city" required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <button class="btn btn-success form-control" type="submit"> <i class="fa fa-search"></i> Search Now
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 wow fadeInDown" data-wow-delay="0.5s">
                        <h5 class=" text-white">Branch Name: Headquarter</h5>
                        <p class=" text-white">
                            <strong><span><i class="fa fa-phone fa-flip-horizontal"></i> </span> Mobile: </strong> <?= $mobile_no; ?>  <br/>
                            <strong><span><i class="fa fa-envelope"></i> </span> Email: </strong> <?= $email; ?>  <br/>
                            <strong><span><i class="fa fa-map"></i> </span> Address: </strong><?= $office_hq_adress; ?> <br/>
                        </p>
                    </div>
                    
                    
                </div>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-delay="0.5s">
                <div class="slill-single-thumb mt-4 mt-lg-0 pl-50 ml-1">
                    <iframe
                        src="<?= $office_hq_map; ?>"
                        width="100%" height="450" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End consen Skill Area Css -->
<!--==================================================-->
