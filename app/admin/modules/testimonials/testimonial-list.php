<?php
$testimonial_sql = "SELECT *  FROM testimonial GROUP BY person_name ORDER by testimonial_id DESC ";
$testimonial_row = getData($testimonial_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Testimonials List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Person Name</th>
                        <th>Designation</th>
                        <th>Status</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($testimonial_row as $key => $testimonial) {
                        $testimonial_check = ($testimonial['testimonial_status'] =='ACTIVE')?'CHECKED':'';
                    ?>
                    <tr>
                        <td class="bd-t-none u-s-tb">
                            <div class="align-middle image-sm-size">
                                <img class="img-radius align-top m-r-15 rounded-circle" src="../../upload/testimonial/<?= $testimonial['person_img']; ?>" alt="<?= $testimonial['person_name']; ?>" width="50px" height="50px">
                            </div>
                        </td>
                        <td><?= $testimonial['person_name'];  ?></td>
                         <td><?= $testimonial['person_designation'];  ?></td>
                        <td>
                            <div class="media-body icon-state ">
                              <label class="switch">
                                  <input type="checkbox" <?= $testimonial_check; ?> value="<?= $testimonial['testimonial_status']; ?>" class="changestatus" id="<?= $testimonial['testimonial_id'];  ?>"><span class="switch-state"></span>
                                </label>
                            </div>
                        </td>
                        
                        <td>
                            <button class="btn btn-primary btn-xs edit_data" id="<?= $testimonial['testimonial_id']; ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-xs delete_data" id="<?= $testimonial['testimonial_id']; ?>"><i class="fa fa-trash"></i></button>   
                        </td>

                    </tr>
                    <?php } ?>
                    
                </tbody>
             
            </table>
        </div>

    </div>

</div>