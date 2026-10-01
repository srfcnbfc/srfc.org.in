<!--==================================================-->
<!-- Start faq Area -->
<!--==================================================-->
<div class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 pl-0">
                <!-- Start Accordion -->
                <div class="tab_container">
                    <div class="consen-section-title white pb-40 mb-1">
                        <h5> Career </h5>
                        <h2>Latest Job <span> Updates </span></h2>
                    </div>
                    <div id="tab1" class="tab_content">
                        <ul class="accordion">
                            <?php foreach ($vacancy_row as $key => $vacancy) {
                                $btn_path = 'job/'.$vacancy['job_title_slug'];
                                ?>
                                <li>
                                    <a><i class="fa fa-check-circle"></i> <?= $vacancy['job_title']; ?> </a>
                                    <p class="text-white"><strong>Designation :</strong>   <?= $vacancy['job_designation']; ?> <br/>
                                        <strong>Level :</strong>   <?= $vacancy['job_designation']; ?> <br/>
                                        <strong>Timing :</strong>   <?= $vacancy['job_timing']; ?> <br/>
                                        <button class="btn btn-primary mt-2" onclick="location.href='<?=$btn_path; ?>';"><i class="fa fa-eye"></i> &nbsp; Read More</button>
                                    </p>
                                    
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- End Accordion -->
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contract-form-bg">
                    <div class="contact-form-title">
                        <h4> Work with us </h4>
                        <p>Please fill the form carefully</p>
                    </div>
                    <div class="contact_from">
                        <form action="" method="POST" id="job-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form_box mb-20">
                                        <input type="text" name="candidate_name" pattern="([A-z0-9À-ž\s]){3,}" placeholder="Name*" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_box mb-20">
                                        <input type="email" name="candidate_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Your E-Mail*" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_box mb-20">
                                        <input type="text" name="candidate_mobile" maxlength="10" pattern="[6-9]{1}[0-9]{9}" placeholder="Phone Number*" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_box mb-20">
                                        <select name="job_vacancy" class="form-box input" required>
                                            <option value="" selected disabled">Select Job</option>
                                            <!--<option value="Network Administrator">Network Administrator</option>-->
                                            <option value="Operation Executive">Operation Executive</option>
                                            <option value="Sales Executive">Sales Executive</option>
                                            <option value="IT">IT</option>
                                            <option value="Branch Manager">Branch Manager</option>
                                            <option value="Company Secretary">Company Secretary</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_box mb-20">
                                        <input type="file" name="candidate_resume" placeholder="Phone Number*" accept=".pdf" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_box mb-20">
                                        <textarea name="candidate_address" id="message" pattern="" cols="30" rows="10" placeholder="Enter Your Address"></textarea>
                                    </div>
                                    <div class="quote_button">
                                        <button class="btn" type="submit"> <i class="fa fa-upload "></i> Apply Now </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="status"></div>
                    </div>
                </div>
            </div>
            <div class="form-shape">
                <div class="testi-shape-thumb">
                    <img src="assets/images/resource/all-shape5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End consen faq Area -->
<!--==================================================-->