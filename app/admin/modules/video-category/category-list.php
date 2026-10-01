<?php
$category_sql = "SELECT * FROM category";
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
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($category_row as $key => $category) {
                    ?>
                    <tr>
                        <td class="bd-t-none u-s-tb">
                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../../upload/icon/<?= $category['category_icon']; ?>" alt="" width="50px" height="50px">
                            </div>
                        </td>
                        <td><?= $category['category_name']; ?></td>
                        
                        
                        <td>
                            <button class="btn btn-primary btn-xs edit_data" id="<?= $category['category_id']; ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-xs delete_data" id="<?= $category['category_id']; ?>"><i class="fa fa-trash"></i></button>   
                        </td>

                    </tr>
                    <?php } ?>
                    
                </tbody>
             
            </table>
        </div>

    </div>

</div>