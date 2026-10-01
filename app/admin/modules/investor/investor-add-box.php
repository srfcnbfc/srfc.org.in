<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="my-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Investor Name</label>
                            <input type="text" name="investor_name" class="form-control"  placeholder="Investor name *" required>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Investor Image</label>
                            <input type="file" name="investor_img" class="form-control" accept="image/png, image/jpeg" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_investor" class="btn btn-primary me-3" >Add Investor</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>