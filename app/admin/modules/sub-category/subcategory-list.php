<?php
$subcategory_sql = "SELECT category_code, subcat_code, subcat_name, subcat_img,subcat_status FROM subcategory WHERE subcat_name !='Other'";
$subcategory_row = getData($subcategory_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Sub Category List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Status</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subcategory_row as $key => $subcategory) {
                        $subcategory_check = ($subcategory['subcat_status'] =='ACTIVE')?'CHECKED':'';
                    ?>
                    <tr>
                        <td class="bd-t-none u-s-tb">
                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../../upload/subcategory/<?= $subcategory['subcat_img']; ?>" alt="<?= $subcategory['subcat_name']; ?>" width="50px" height="50px">
                            </div>
                        </td>
                        <td><?= categorycheck($subcategory['category_code'])['cat_name']; ?></td>
                        <td><?= $subcategory['subcat_name']; ?></td>
                        <td>
                            <div class="media-body icon-state ">
                              <label class="switch">
                                  <input type="checkbox" <?= $subcategory_check; ?> value="<?= $subcategory['subcat_status']; ?>" class="changestatus" id="<?= $subcategory['subcat_code']; ?>"><span class="switch-state"></span>
                                </label>
                            </div>
                        </td>
                   

                        <td>
                            <button class="btn btn-primary btn-xs edit_data" id="<?= $subcategory['subcat_code']; ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-xs delete_data" id="<?= $subcategory['subcat_code']; ?>"><i class="fa fa-trash"></i></button>   
                        </td>

                    </tr>
                    <?php } ?>
                    <tr>
                        <td class="bd-t-none u-s-tb">
                            <div class="align-middle image-sm-size">
                                <img class="img-radius align-top m-r-15 rounded-circle" src="../../upload/subcategory/<?= $default_subcategory_img; ?>" alt="" width="50px" height="50px">
                            </div>
                        </td>
                        <td><?= $default_category_name; ?></td>
                        <td><?= $default_subcategory_name; ?></td>
                        <td>
                            <p>--Default SubCategory--</p>
                        </td>
                   

                        <td>
                            <p>--Default SubCategory--</p>
                        </td>

                    </tr>
                </tbody>
             
            </table>
        </div>

    </div>

</div>