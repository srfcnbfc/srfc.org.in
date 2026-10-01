
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please fill all the details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="investor-doc-category-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Investor Document Type</label>
                            <select name="investor_doc_type" class="form-control" required>
                                <option>Select Type</option>
                                <?php foreach ($investor_doc_row as $key => $docs) {   ?>
                                <option value="<?= $docs['doc_id']?>"><?= $docs['doc_type']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Document Category</label>
                            <input type="text" name="investor_category_name" class="form-control"  placeholder="Document Category *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_category" class="btn btn-primary me-3" >Add Category</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>