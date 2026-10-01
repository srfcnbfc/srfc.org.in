<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $category_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    $sql = "SELECT * FROM category WHERE category_id= '$category_id'";
    $category_data = getsingleData($sql);
    ?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit the Category Details</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form theme-form">
                 <form autocomplete="off" id="edit-form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Category Name</label>
                                <input type="hidden" name="category_id" value="<?= $category_data['category_id']; ?>" required>
                                <input type="text" name="category_name" value="<?= $category_data['category_name']; ?>" id="editcategory_name" class="form-control"  placeholder="Category name *" required>
                            </div>
                        </div>
                    </div>
                  <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Category Url</label>
                                <input type="text" name="category_slug" value="<?= $category_data['category_slug']; ?>" id="editcategory_slug" class="form-control"  placeholder="Category Slug *" required>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Category Image 
                                    <span class="form-check-inline text-info"> ( <input type="checkbox" name="enableimg" id="chkimg" value="img_enable">If you want to Change)</span></label>
                                <input type="file" name="category_img" class="form-control" accept="image/png, image/jpeg" id="imagechange" disabled required>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="updatedata" value="category_update">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $("#editcategory_name").keyup(function () {
                var str = $(this).val();
                var trims = $.trim(str);
                var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
                $("#editcategory_slug").val(slug.toLowerCase());
            });

            $('.addAttr').click(function () {
                var title = $(this).data('editcategory_name');
                $('#editcategory_name').val(title);
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#chkimg').change(function () {
                var changeimg = document.getElementById("imagechange");
                changeimg.disabled = chkimg.checked ? false : true;
                if (!changeimg.disabled) {
                    changeimg.focus();
                }
            });
        });
    </script>
<script>
    $(document).ready(function () {
        $("#edit-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "modules/video-category/category-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response)
                    var data = JSON.parse(response);
                    $("#edit-form")[0].reset();
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
