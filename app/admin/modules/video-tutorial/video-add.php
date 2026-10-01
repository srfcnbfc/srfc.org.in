<div class="card">
    <div class="card-header">
        <h5 class="card-title">Please Fill All the Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="video-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Video Title</label>
                            <input type="text" name="video_title" class="form-control"  placeholder="Enter Video Title*" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Video ID</label>
                            <input type="text" name="video_link" class="form-control"  placeholder="Enter Video ID *" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Video Category</label>
                            <select name="video_category" class="form-control"   required>
                                <option value="" disabled selected>--Select Category--</option>
                                <?php
                                $cat_sql = "SELECT * FROM category";
                                $cat_row = getData($cat_sql);
                                foreach ($cat_row as $key => $category) {
                                    echo '<option value="'.$category['category_slug'].'">'.$category['category_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Video Thumbnail</label>
                            <input type="file" name="video_img" class="form-control" accept="image/png, image/jpeg" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit" name="add_video" class="btn btn-primary me-3" >Add Video</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>