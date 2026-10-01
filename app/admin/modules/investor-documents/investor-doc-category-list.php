<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Investor Document Category List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display" id="">
                <thead>
                    <tr>
                        <th>Document Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($investor_doc_row as $key => $investor_doc) {
                        $doc_type_id = $investor_doc['doc_id'];
                        $doc_type_name = $investor_doc['doc_type'];

                        $investor_doc_cat_sql = "SELECT * FROM investor_doc_category WHERE investor_doc_type='$doc_type_id'";
                        $investor_doc_cat_row = getData($investor_doc_cat_sql);
                        ?>
                        <tr>
                            <th class="bd-t-none u-s-tb" colspan="2">
                                <strong><?= $doc_type_name; ?></strong>
                            </th>
                        </tr>   

    <?php foreach ($investor_doc_cat_row as $key => $investor_doc_cat) { ?> 
                            <tr>
                                <td><?= $investor_doc_cat['investor_category_name']; ?></td>
                                <td>
                                    <button class="btn btn-danger btn-xs delete_data" id="<?= $investor_doc_cat['cat_id']; ?>"><i class="fa fa-trash"></i></button>   
                                </td>
                            </tr>
    <?php } ?> 



<?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>