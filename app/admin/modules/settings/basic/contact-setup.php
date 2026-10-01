<?php
$contactsql = "SELECT * FROM contact WHERE 1";
$contact_data = getsingleData($contactsql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Website Contact Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="contact-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Contact No.</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-whatsapp"> </i></span>
                                <input class="form-control" name="contact_no" value="<?= $contact_data['contact_no']; ?>" type="tel"   placeholder="Please Enter your Whatsapp Number" required>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                            <label>Office Short Address</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-location-arrow"> </i></span>
                                <input class="form-control" name="contact_shrt_location" value="<?= $contact_data['contact_shrt_location']; ?>" type="tel"   placeholder="Please Enter City and State" placeholder="">
                            </div>
                        </div>
                    </div>
                     
                </div>
                  <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Office Email</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-envelope"> </i></span>
                                <input class="form-control" name="contact_email" value="<?= $contact_data['contact_email']; ?>" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Office Email" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Office Address</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-location-arrow"> </i></span>
                                <input class="form-control" name="contact_address" value="<?= $contact_data['contact_address']; ?>" type="text" placeholder="Office Locaiton" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Map Location</label>
                           <div class="input-group"><span class="input-group-text"><i class="fa fa-map"> </i></span>
                               <input class="form-control" name="contact_map" value="<?= htmlspecialchars($contact_data['contact_map']) ; ?>" type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="update_contact" class="btn btn-primary me-3" >Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>