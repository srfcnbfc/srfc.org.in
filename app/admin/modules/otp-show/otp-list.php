<?php
$otplist_sql = "SELECT * FROM guest_enquiry ORDER by guest_id DESC ";
$otplist_row = getData($otplist_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All OTP List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="table table-striped table-bordered table-responsive-lg " id="table_id">
                <thead>
                    <tr>
                        <th>S.NO.</th>
                        <th>OTP Time</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($otplist_row as $key => $otplist) {
                        ?>
                        <tr>
                            <td class="bd-t-none u-s-tb">
                                <?= $i++; ?>
                            </td>
                            <td><?= date_format(date_create($otplist['otp_timing']), 'd-m-Y'); ?></td>
                            <td><?= $otplist['guest_mobile']; ?></td>
                            <td><?= $otplist['guest_verify_status']; ?></td>
                            <td>
                                <button class="btn btn-danger btn-xs delete_data" id="<?= $otplist['guest_id']; ?>"><i class="fa fa-trash"></i></button>   
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>