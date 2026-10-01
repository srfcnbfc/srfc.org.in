  
<div class="widget-categories-box">
    <!-- categories title -->
    <div class="categories-title">
        <h4> Our Services </h4>
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
