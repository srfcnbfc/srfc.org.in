<?php
$investor_sql = "SELECT * FROM investor ORDER by investor_id DESC ";
$investor_row = getData($investor_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Investor List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($investor_row as $key => $investor) {   ?>
                    <tr>
                        <td class="bd-t-none u-s-tb">
                            <div class="align-middle image-sm-size"><img class=" align-top m-r-15" src="../../upload/investor/<?= $investor['investor_img']; ?>" alt="" width="150px" height="50px">
                            </div>
                        </td>
                        <td><?= $investor['investor_name']; ?></td>
                        <td>
                            <button class="btn btn-danger btn-xs delete_data" id="<?= $investor['investor_id']; ?>"><i class="fa fa-trash"></i></button>   
                        </td>

                    </tr>
                    <?php } ?>
                    
                </tbody>
             
            </table>
        </div>

    </div>

</div>