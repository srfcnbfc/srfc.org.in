<?php
if (!empty($_POST['code'])) {
    
    ?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Product New Image</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form theme-form">
                <form autocomplete="off" id="image-form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Image Name</label>
                                <input type="hidden" name="product_code" value="<?= $_POST['code']; ?>" required>
                                <input type="text" name="image_name" value="" class="form-control"  placeholder="Image name *" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>New Image</label>
                                <input type="file" name="product_img" accept="image/*" class="form-control" aria-label="url" required>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="imageadd" value="product_image">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $("#image-form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "modules/products/other-image-save.php",
                    method: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var data = JSON.parse(response);
                        $("#image-form")[0].reset();
                        swal(data[0].msg, "", data[0].status);
                        setTimeout(function () {
                            window.location = window.location;
                        }, 2000);
                    }
                });
            });
        });

    </script>
    <?php
}
?>
