<?php
$sql = "SELECT * FROM website_seo WHERE 1";
$seo_data = getsingleData($sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="seo-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Website Header  JS/CSS only</label>
                            <textarea name="website_header" class="form-control" rows="4"  placeholder="Please enter <head>---</head> content" ><?= $seo_data['web_header']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Website Footer  JS/CSS</label>
                            <textarea name="website_footer" class="form-control" rows="4" placeholder="Please enter <body>---</body> content" ><?= $seo_data['web_footer']; ?></textarea>
                        </div>
                    </div>

                </div>
           
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="update_seo" class="btn btn-primary me-3" >Setup</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>