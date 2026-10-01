<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $subcategory_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    $sql = "SELECT * FROM subcategory WHERE subcat_code= '$subcategory_code'";
    $subcategory_data = getsingleData($sql);
    ?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit the SubCategory Details</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form theme-form">
                 <form autocomplete="off" id="edit-form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Category Name</label>
                                <input type="hidden" name="subcategory_code" value="<?= $subcategory_data['subcat_code']; ?>" required>
                            <select class="form-control"  name="category_code" required>
                                <option value="" checked>-- Select Category---</option>
                                <?php
                                $cat_sql = "SELECT category_code, category_name, category_status FROM category WHERE category_status='ACTIVE'";
                                $cat_row = getData($cat_sql);
                                $category_check = ($category['category_status'] =='ACTIVE')?'CHECKED':'';
                                foreach ( $cat_row as $key => $category){
                                    $selectoption = $subcategory_data['category_code']== $category['category_code']? 'selected': '';
                                    echo '<option value="'.$category['category_code'].'" '.$selectoption .' >'.$category['category_name'].'</option>';
                                }
                                ?>
                            </select>   
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Sub Category name</label>
                                <input type="text" name="subcategory_name" value="<?= $subcategory_data['subcat_name']; ?>" class="form-control"  placeholder="Enter Subcategory Name *" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Sub Category Short Description</label>
                                <textarea name="subcategory_description" class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Sub Category Short Description"><?= $subcategory_data['subcat_desp']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label>Sub Category Image 
                                    <span class="form-check-inline text-info"> ( <input type="checkbox" name="enableimg" id="chkimg" value="img_enable">If you want to Change)</span></label>
                                <input type="file" name="subcategory_img" class="form-control" accept="image/png, image/jpeg" id="imagechange" disabled required>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="updatedata" value="subcategory_update">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


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
                url: "modules/sub-category/subcategory-update.php",
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
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
