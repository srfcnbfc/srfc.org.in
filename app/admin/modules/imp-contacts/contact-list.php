<?php
$contact_sql = "SELECT * FROM imp_contact ORDER by contact_id DESC ";
$contact_row = getData($contact_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Important Contact List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Person Name</th>
                        <th>Mobile</th>
                        <th>Designation</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($contact_row as $key => $contact) {
                        ?>
                        <tr>
                            <td class="bd-t-none u-s-tb">
                                <?= $i++; ?>
                            </td>
                            <td><?= $contact['person_name']; ?></td>
                            <td><?= $contact['person_mobile']; ?></td>
                            <td><?= $contact['person_designation']; ?></td>
                            <td><?= $contact['person_location']; ?></td>

                            <td>
                                <button class="btn btn-danger btn-xs delete_data" id="<?= $contact['contact_id']; ?>"><i class="fa fa-trash"></i></button>   
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>

    </div>

</div>