<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="upload-document-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <label>Investor Document Type</label>
                        <select name="investor_doc_cat" class="form-control" required>
                            <option>Select Type</option>
                            <?php
                            foreach ($investor_doc_row as $key => $investor_doc) {
                                $doc_type_id = $investor_doc['doc_id'];
                                $doc_type_name = $investor_doc['doc_type'];

                                $investor_doc_cat_sql = "SELECT * FROM investor_doc_category WHERE investor_doc_type='$doc_type_id'";
                                $investor_doc_cat_row = getData($investor_doc_cat_sql);
                                ?>
                                <optgroup label="<?= $doc_type_name; ?>">
                                    <?php foreach ($investor_doc_cat_row as $key => $investor_doc_cat) { ?>
                                        <option value="<?= $investor_doc_cat['cat_id'];?>"><?= $investor_doc_cat['investor_category_name']; ?></option>
                                    <?php } ?>
                                </optgroup>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Document Name</label>
                            <input type="text" name="docu_name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Document Year</label>
                            <input type="year" name="docu_year" class="form-control" pattern="^(19|20)\d{2}$" placeholder="Year" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Document (Pdf, Xlsx, PPT, Word)</label>
                            <input type="file" name="investor_doc" class="form-control" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/pdf" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="upload_document" class="btn btn-primary me-3" >Upload Document</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>