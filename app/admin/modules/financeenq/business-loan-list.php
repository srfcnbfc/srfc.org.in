<?php
$finance_sql = "SELECT * FROM business_loan ORDER by business_loan_id DESC ";
$finance_row = getData($finance_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Business Loan List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="table table-striped table-bordered table-responsive-lg " id="table_id">
                <thead>
                    <tr>
                        <th>S.NO.</th>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Sate</th>
                        <th>Location</th>
                        <th>Shop Name</th>
                        <th>Shop Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($finance_row as $key => $finance) {
                        ?>
                        <tr>
                            <td class="bd-t-none u-s-tb">
    <?= $i++; ?>
                            </td>
                            <td><?= date_format(date_create($finance['enquiry_time']),'d-m-Y'); ?></td>
                            <td><?= $finance['name']; ?></td>
                            <td><?= $finance['mobile']; ?></td>
                            <td><?= $finance['city']; ?></td>
                            <td><?= $finance['state']; ?></td>
                            <td><?= $finance['address']."<br/>".$finance['pin']; ?></td>
                            <td><?= $finance['shop_name']; ?></td>
                            <td><?= $finance['shop_location']; ?></td>
                            <td>
                                <button class="btn btn-danger btn-xs delete_data" id="<?= $finance['business_loan_id']; ?>"><i class="fa fa-trash"></i></button>   
                            </td>

                        </tr>
<?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>