<?php 
require_once __DIR__ . '/header.php'; 
check_page_access(['SUPER_ADMIN']);
global $conn;

// Fetch all banners
$banner_sql = "SELECT * FROM banner ORDER BY banner_id DESC";
$banner_row = getData($banner_sql);
?>

<style>
    .banner-card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        margin-bottom: 25px;
        display: flex;
        flex-direction: column;
        height: calc(100% - 25px);
    }
    .banner-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .banner-img-wrap {
        position: relative;
        width: 100%;
        height: 200px;
        background: #0f172a;
        overflow: hidden;
    }
    .banner-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .banner-card:hover .banner-img-wrap img {
        transform: scale(1.03);
    }
    .banner-id-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(4px);
        color: #fff;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }
    .banner-card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .banner-top-tag {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #0284c7;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .banner-headline {
        font-size: 17px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .banner-desc {
        font-size: 13px;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 15px;
        flex-grow: 1;
    }
    .banner-btn-info {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 8px 12px;
        font-size: 12px;
        color: #334155;
        margin-bottom: 15px;
        word-break: break-all;
    }
    .banner-card-actions {
        display: flex;
        gap: 10px;
        border-top: 1px solid #f1f5f9;
        padding-top: 15px;
    }

    /* Live Preview Simulator */
    .banner-simulator {
        background: linear-gradient(135deg, #0a2540 0%, #1e40af 100%);
        border-radius: 12px;
        padding: 25px;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }
    .sim-tag {
        color: #38bdf8;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    .sim-headline {
        font-size: 20px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 8px;
        line-height: 1.3;
    }
    .sim-desc {
        font-size: 13px;
        color: #cbd5e1;
        margin-bottom: 15px;
        line-height: 1.5;
    }
    .sim-btn {
        display: inline-block;
        background: #0284c7;
        color: #fff;
        padding: 6px 16px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }
</style>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-6 col-md-8">
                    <h3>Homepage Banner Carousel</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-4 text-end">
                    <button class="btn btn-primary" id="btn-open-add-modal" type="button">
                        <i class="fa fa-plus-circle me-1"></i> Add New Banner
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Banners Grid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    Active Homepage Slides 
                    <span class="badge badge-light-primary text-primary ms-2"><?= count($banner_row); ?> Banners</span>
                </h5>
                <span class="text-muted f-12">Click "Edit" on any banner to modify its text, link, or image.</span>
            </div>
        </div>

        <div class="row">
            <?php if (empty($banner_row)): ?>
                <div class="col-12">
                    <div class="card p-5 text-center">
                        <i class="fa fa-picture-o fa-3x text-muted mb-3"></i>
                        <h5>No Banners Configured</h5>
                        <p class="text-muted">Click the button above to add your first homepage slide.</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($banner_row as $banner): ?>
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="banner-card" id="card-banner-<?= $banner['banner_id']; ?>">
                            <div class="banner-img-wrap">
                                <span class="banner-id-badge">#<?= $banner['banner_id']; ?></span>
                                <img src="../../upload/slider/<?= htmlspecialchars($banner['banner_img']); ?>" alt="<?= htmlspecialchars($banner['banner_headline']); ?>" onerror="this.src='../assets/images/banner/1.jpg';">
                            </div>
                            <div class="banner-card-body">
                                <div class="banner-top-tag">
                                    <i class="fa fa-tag me-1"></i> <?= !empty($banner['banner_top_msg']) ? strip_tags($banner['banner_top_msg']) : 'No Tag'; ?>
                                </div>
                                <h6 class="banner-headline">
                                    <?= htmlspecialchars($banner['banner_headline']); ?>
                                </h6>
                                <p class="banner-desc">
                                    <?= !empty($banner['banner_btm_msg']) ? htmlspecialchars($banner['banner_btm_msg']) : 'No description provided.'; ?>
                                </p>
                                <div class="banner-btn-info">
                                    <i class="fa fa-link text-primary me-1"></i>
                                    <strong>Button Link:</strong> 
                                    <?php if (strpos($banner['banner_button'], 'http') === 0): ?>
                                        <a href="<?= htmlspecialchars($banner['banner_button']); ?>" target="_blank" class="text-primary text-truncate d-inline-block" style="max-width: 220px; vertical-align: bottom;">
                                            <?= htmlspecialchars($banner['banner_button']); ?> <i class="fa fa-external-link f-10"></i>
                                        </a>
                                    <?php else: ?>
                                        <span class="badge badge-light-info text-info">services/<?= htmlspecialchars($banner['banner_button']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="banner-card-actions">
                                    <button class="btn btn-primary btn-sm flex-grow-1 edit-banner-btn" data-id="<?= $banner['banner_id']; ?>" type="button">
                                        <i class="fa fa-pencil me-1"></i> Edit Banner
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm delete-banner-btn" data-id="<?= $banner['banner_id']; ?>" type="button" title="Delete Banner">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal: Add / Edit Banner -->
<div class="modal fade" id="modal-banner" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bannerModalLabel">
                    <i class="fa fa-pencil-square-o text-primary me-2"></i> <span id="modal-title-text">Add New Banner</span>
                </h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="banner-form" enctype="multipart/form-data">
                <input type="hidden" id="banner_id" name="banner_id" value="">
                
                <div class="modal-body">
                    <!-- Live Simulator Card -->
                    <div class="banner-simulator">
                        <div class="sim-tag" id="sim-tag">Personal Loan</div>
                        <div class="sim-headline" id="sim-headline">Your Banner Headline Appears Here</div>
                        <div class="sim-desc" id="sim-desc">Your detailed promotional description will appear here on the homepage slider.</div>
                        <span class="sim-btn" id="sim-btn">Apply Now <i class="fa fa-arrow-right f-10 ms-1"></i></span>
                    </div>

                    <div class="row">
                        <!-- Top Tag / Category -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="banner_top_msg">Top Tag / Category</label>
                            <input type="text" class="form-control" id="banner_top_msg" name="banner_top_msg" placeholder="e.g. Personal Loan, MSME Finance">
                            <small class="text-muted">Small colored tag displayed above the headline</small>
                        </div>

                        <!-- Button Destination Type -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Button Action Type <span class="text-danger">*</span></label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="btn_type" id="btn_type_service" value="service" checked>
                                    <label class="form-check-label" for="btn_type_service">Link to Service</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="btn_type" id="btn_type_custom" value="custom">
                                    <label class="form-check-label" for="btn_type_custom">Custom URL</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Headline -->
                    <div class="mb-3">
                        <label class="form-label" for="banner_headline">Banner Headline <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="banner_headline" name="banner_headline" placeholder="e.g. Say yes to your dreams with our personal loans" required>
                    </div>

                    <!-- Bottom Message / Description -->
                    <div class="mb-3">
                        <label class="form-label" for="banner_btm_msg">Bottom Message / Description</label>
                        <textarea class="form-control" id="banner_btm_msg" name="banner_btm_msg" rows="2" placeholder="Brief supporting description for this loan or offering"></textarea>
                    </div>

                    <!-- Button Destination Selectors -->
                    <div class="mb-3" id="wrap-service-select">
                        <label class="form-label" for="select_service_slug">Choose Destination Service</label>
                        <select class="form-select" id="select_service_slug">
                            <?php if (!empty($service_menu_row)): ?>
                                <?php foreach ($service_menu_row as $srv): ?>
                                    <option value="<?= htmlspecialchars($srv['service_slug']); ?>">
                                        <?= htmlspecialchars($srv['service_name']); ?> (/services/<?= htmlspecialchars($srv['service_slug']); ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="mb-3" id="wrap-custom-url" style="display: none;">
                        <label class="form-label" for="input_custom_url">Enter Custom Destination URL</label>
                        <input type="url" class="form-control" id="input_custom_url" placeholder="https://apply.srfc.org.in/?platform=web&lead=...">
                        <small class="text-muted">Direct portal link, application link, or external landing page</small>
                    </div>

                    <!-- Hidden field sent to backend -->
                    <input type="hidden" id="banner_button" name="banner_button" value="">

                    <!-- Banner Image Upload -->
                    <div class="mb-3">
                        <label class="form-label" for="banner_img">
                            Banner Image <span id="img-required-star" class="text-danger">*</span>
                            <span class="text-muted f-12">(Recommended: 1920 x 936px, JPG or PNG)</span>
                        </label>
                        <input type="file" class="form-control" id="banner_img" name="banner_img" accept="image/png, image/jpeg, image/webp">
                        <small class="text-muted" id="img-help-text">Select an image for this banner slide.</small>

                        <!-- Preview Container -->
                        <div id="img-preview-container" class="mt-2" style="display: none;">
                            <span class="f-12 text-muted d-block mb-1" id="preview-label">Image Preview:</span>
                            <img id="img-preview" src="" alt="Preview" style="max-height: 140px; border-radius: 8px; border: 1px solid #cbd5e1; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-save-banner">
                        <i class="fa fa-save me-1"></i> <span id="save-btn-text">Save Banner</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('elements/modal-container.php'); ?>
<?php include_once 'footer.php'; ?>

<script>
$(document).ready(function () {
    var bannerModal = new bootstrap.Modal(document.getElementById('modal-banner'));

    // Synchronize simulator with inputs
    function updateSimulator() {
        var tag = $('#banner_top_msg').val().trim() || 'Personal Loan';
        var headline = $('#banner_headline').val().trim() || 'Your Banner Headline Appears Here';
        var desc = $('#banner_btm_msg').val().trim() || 'Your detailed promotional description will appear here on the homepage slider.';

        $('#sim-tag').text(tag);
        $('#sim-headline').text(headline);
        $('#sim-desc').text(desc);
    }

    $('#banner_top_msg, #banner_headline, #banner_btm_msg').on('input', updateSimulator);

    // Toggle button type: service vs custom
    $('input[name="btn_type"]').on('change', function () {
        if ($('#btn_type_service').is(':checked')) {
            $('#wrap-service-select').show();
            $('#wrap-custom-url').hide();
        } else {
            $('#wrap-service-select').hide();
            $('#wrap-custom-url').show();
        }
    });

    // Image preview on file selection
    $('#banner_img').on('change', function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-label').text('New Selected Image:');
                $('#img-preview').attr('src', e.target.result);
                $('#img-preview-container').show();
            };
            reader.readAsDataURL(file);
        }
    });

    // Open Add Modal
    $('#btn-open-add-modal').on('click', function () {
        $('#banner_id').val('');
        $('#modal-title-text').text('Add New Banner');
        $('#save-btn-text').text('Create Banner');
        $('#img-required-star').show();
        $('#banner_img').prop('required', true);
        $('#img-help-text').text('Select an image for this banner slide.');
        $('#img-preview-container').hide();
        $('#img-preview').attr('src', '');

        $('#banner-form')[0].reset();
        $('#btn_type_service').prop('checked', true).trigger('change');
        updateSimulator();

        bannerModal.show();
    });

    // Open Edit Modal
    $(document).on('click', '.edit-banner-btn', function () {
        var id = $(this).data('id');
        var btn = $(this);
        var origHtml = btn.html();
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
            url: 'modules/banner/banner-get.php',
            method: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function (res) {
                btn.prop('disabled', false).html(origHtml);
                if (res.status === 'success') {
                    var data = res.data;
                    $('#banner_id').val(data.banner_id);
                    $('#modal-title-text').text('Edit Banner #' + data.banner_id);
                    $('#save-btn-text').text('Update Banner');

                    $('#banner_top_msg').val(data.banner_top_msg);
                    $('#banner_headline').val(data.banner_headline);
                    $('#banner_btm_msg').val(data.banner_btm_msg);

                    // Image is optional on Edit
                    $('#img-required-star').hide();
                    $('#banner_img').prop('required', false).val('');
                    $('#img-help-text').html('<span class="text-info"><i class="fa fa-info-circle"></i> Leave empty to keep existing image.</span>');

                    if (data.banner_img) {
                        $('#preview-label').text('Current Banner Image:');
                        $('#img-preview').attr('src', data.img_url);
                        $('#img-preview-container').show();
                    } else {
                        $('#img-preview-container').hide();
                    }

                    // Button link check
                    var btnVal = data.banner_button || '';
                    if (btnVal.indexOf('http') === 0) {
                        $('#btn_type_custom').prop('checked', true).trigger('change');
                        $('#input_custom_url').val(btnVal);
                    } else {
                        $('#btn_type_service').prop('checked', true).trigger('change');
                        $('#select_service_slug').val(btnVal);
                    }

                    updateSimulator();
                    bannerModal.show();
                } else {
                    swal("Notice", res.msg, "warning");
                }
            },
            error: function () {
                btn.prop('disabled', false).html(origHtml);
                swal("Error", "Could not fetch banner details.", "error");
            }
        });
    });

    // Form Submit (Add or Update)
    $('#banner-form').on('submit', function (e) {
        e.preventDefault();

        // Calculate destination value
        if ($('#btn_type_service').is(':checked')) {
            $('#banner_button').val($('#select_service_slug').val());
        } else {
            var customUrl = $('#input_custom_url').val().trim();
            if (!customUrl) {
                swal("Validation Error", "Please enter the custom destination URL.", "warning");
                return;
            }
            $('#banner_button').val(customUrl);
        }

        var saveBtn = $('#btn-save-banner');
        var originalBtnText = saveBtn.html();
        saveBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-1"></i> Saving...');

        var formData = new FormData(this);

        $.ajax({
            url: "modules/banner/banner-save.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                saveBtn.prop('disabled', false).html(originalBtnText);
                var data = Array.isArray(response) ? response[0] : response;
                if (data.status === 'success') {
                    bannerModal.hide();
                    swal("Success!", data.msg, "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal("Notice", data.msg, data.status || "warning");
                }
            },
            error: function () {
                saveBtn.prop('disabled', false).html(originalBtnText);
                swal("Error", "Could not connect to server.", "error");
            }
        });
    });

    // Delete Banner
    $(document).on('click', '.delete-banner-btn', function () {
        var banner_id = $(this).data("id");
        swal({
            title: "Delete this Banner?",
            text: "Are you sure? This slide will be permanently removed from the homepage.",
            icon: "warning",
            buttons: ["Cancel", "Yes, Delete It!"],
            dangerMode: true
        }).then(function (willDelete) {
            if (willDelete) {
                $.ajax({
                    url: "modules/banner/banner-delete.php",
                    method: "POST",
                    data: { code: banner_id },
                    dataType: "json",
                    success: function (response) {
                        var data = Array.isArray(response) ? response[0] : response;
                        if (data.status === 'success') {
                            swal("Deleted!", data.msg, "success").then(function () {
                                location.reload();
                            });
                        } else {
                            swal("Error", data.msg, "warning");
                        }
                    },
                    error: function () {
                        swal("Error", "Failed to delete banner.", "error");
                    }
                });
            }
        });
    });
});
</script>