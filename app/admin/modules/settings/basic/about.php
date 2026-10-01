<?php
$sql = "SELECT * FROM website_info WHERE 1";
$contact_data = getsingleData($sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">About us</h5>
    </div>
    <div class="card-body">
        <div class="form theme-form">
            <form autocomplete="off" id="contact-form" method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Page Title</label>
                            <input type="text" name="page_title" id="page_title" class="form-control"  placeholder="Product title *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Page Slug</label>
                            <div class="input-group"><span class="input-group-text txt-success "><?= $web_url; ?> page/</span>
                                <input type="text" name="page_slug" id="page_slug" class="form-control" aria-label="url" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Short Meta Description</label>
                            <textarea name="page_shrt_descp" class="form-control" placeholder="Short Description" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Page Details</label>
                            <textarea name="page_descp" class=" summernote" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="update_about" class="btn btn-primary me-3" >Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>