<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">
        <div class="form theme-form">
            <form autocomplete="off" id="my-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Parent -Category Name</label>
                            <select class="form-control"  name="category_code" required>
                                <option value="" checked>-- Select Category---</option>
                                <?php
                                $cat_sql = "SELECT category_code, category_name, category_status FROM category WHERE category_status='ACTIVE'";
                                $cat_row = getData($cat_sql);
                                foreach ( $cat_row as $key => $category){
                                    echo '<option value="'.$category['category_code'].'">'.$category['category_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Sub-Category Name</label>
                            <input type="text" name="subcategory_name" id="subcategory_name" class="form-control"  placeholder="Sub-Category name *" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Sub-Category Short Description</label>
                            <textarea name="subcategory_description"class="form-control" id="exampleFormControlTextarea4" rows="3" required="" placeholder="Sub-Category Short Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Sub-Category Image</label>
                            <input type="file" name="subcategory_img" class="form-control" accept="image/png, image/jpeg" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_data" class="btn btn-primary me-3" >Add Sub-Category</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>