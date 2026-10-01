<?php
$sql = "SELECT * FROM social_links WHERE 1";
$social_data = getsingleData($sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Social Media Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="social-form" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Facebook</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-facebook"> </i></span>
                                <input class="form-control" name="facebook_link" value="<?= $social_data['facebook']; ?>" type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Instagram</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-instagram"> </i></span>
                                <input class="form-control" name="instagram_link" value="<?= $social_data['instagram']; ?>" type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Twitter</label>
                           <div class="input-group"><span class="input-group-text"><i class="fa fa-twitter"> </i></span>
                              <input class="form-control" name="twitter_link" type="text" value="<?= $social_data['twitter']; ?>" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Whatsapp</label>
                           <div class="input-group"><span class="input-group-text"><i class="fa fa-whatsapp"> </i></span>
                              <input class="form-control" name="whatsapp_link" type="text" value="<?= $social_data['whatsapp']; ?>" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Linkedin</label>
                           <div class="input-group"><span class="input-group-text"><i class="fa fa-linkedin"> </i></span>
                              <input class="form-control" name="linkedin_link" type="text" value="<?= $social_data['linkedin']; ?>" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="update_social" class="btn btn-primary me-3" >Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>