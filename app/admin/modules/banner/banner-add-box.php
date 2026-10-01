<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="banner-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Banner Top Message(&lt;span&gt;  &lt;/span&gt;)</label>
                            <input type="text" name="banner_top_msg" class="form-control"  placeholder="Banner Top message*" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Banner Headline</label>
                            <input type="text" name="banner_headline" class="form-control"  placeholder="Banner  Headline *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Banner Bottom Message</label>
                            <textarea name="banner_btm_msg"class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Banner Bottom Message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Banner Image(1920x936px) </label>
                            <input type="file" name="banner_img" class="form-control" accept="image/png, image/jpeg" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>Banner Button</label>
                            <select class="form-control" name="banner_button" required>
                                <?php foreach ($service_menu_row as $key => $service) { ?>
                                    <option value="<?= $service['service_slug'] ?>">Get <?= $service['service_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_banner" class="btn btn-primary me-3" >Add Banner</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>