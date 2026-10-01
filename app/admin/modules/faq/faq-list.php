<?php
$faq_sql = "SELECT * FROM faq  WHERE service_code='$service_code' ORDER by faq_id DESC ";
$faq_row = getData($faq_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><?= strtoupper($service_row['service_name']) ?> FAQ List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>FAQ Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($faq_row as $key => $faq) {
                        ?>
                        <tr>
                            <td class="bd-t-none u-s-tb">
                                <?= $i++; ?>
                            </td>
                            <td><?= $faq['faq_ques']; ?></td>
                            <td><?= $faq['faq_ans']; ?></td>

                            <td>
                                <button class="btn btn-primary btn-xs edit_data" id="<?= $faq['faq_id']; ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-xs delete_data" id="<?= $faq['faq_id']; ?>"><i class="fa fa-trash"></i></button>   
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>