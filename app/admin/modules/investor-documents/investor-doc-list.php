
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Investor Document List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Document</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    foreach ($docs_row as $key => $investor_document_row) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td class="bd-t-none u-s-tb">
                                <?= $investor_document_row['document_name']; ?>
                            </td>
                            <td><?= $investor_document_row['document_year']; ?></td>
                            <td>
                                <a href="../../upload/investor-documents/<?=$investor_document_row['document_file']?>" class="btn btn-success " download ><i class="fa fa-download"></i></a>
                                <button class="btn btn-danger btn-xs delete_data" id="<?= $investor_document_row['docid']; ?>"><i class="fa fa-trash"></i></button>   
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>