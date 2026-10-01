<?php
$category_sql = "SELECT category_code, category_name, category_icon, category_status FROM category GROUP BY category_name ORDER by category_id DESC ";
$category_row = getData($category_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Category List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Status</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($category_row as $key => $category) {
                        $category_check = ($category['category_status'] =='ACTIVE')?'CHECKED':'';
                    ?>
                    <tr>
                        <td class="bd-t-none u-s-tb">
                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../../upload/icon/<?= $category['category_icon']; ?>" alt="" width="50px" height="50px">
                            </div>
                        </td>
                        <td><?= $category['category_name']; ?></td>
                        <td>
                            <div class="media-body icon-state ">
                              <label class="switch">
                                  <input type="checkbox" <?= $category_check; ?> value="<?= $category['category_status']; ?>" class="changestatus" id="<?= $category['category_code']; ?>"><span class="switch-state"></span>
                                </label>
                            </div>
                        </td>
                        
                        <td>
                            <button class="btn btn-primary btn-xs edit_data" id="<?= $category['category_code']; ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-xs delete_data" id="<?= $category['category_code']; ?>"><i class="fa fa-trash"></i></button>   
                        </td>

                    </tr>
                    <?php } ?>
                    
                </tbody>
             
            </table>
        </div>

    </div>

</div>