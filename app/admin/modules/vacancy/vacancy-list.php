<?php
$vacancy_sql = "SELECT vacancy_id , job_title, job_designation, candidate_level,job_timing,job_img FROM vacancy GROUP BY job_title ORDER by vacancy_id DESC ";
$vacancy_row = getData($vacancy_sql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">All Vacancy List</h5>
    </div>
    <div class="card-body">
        <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Job</th>
                        <th>Designation</th>
                        <th>Level</th>
                        <th>Type</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    foreach ($vacancy_row as $key => $vacancy) {
                    ?>
                    <tr>
                        <td class="bd-t-none u-s-tb">
                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle" src="../../upload/vacancy/<?= $vacancy['job_img']; ?>" alt="" width="50px" height="50px">
                            </div>
                        </td>
                        <td><?= $vacancy['job_title']; ?></td>
                        <td><?= $vacancy['job_designation']; ?></td>
                         <td><?= $vacancy['candidate_level']; ?></td>
                          <td><?= $vacancy['job_timing']; ?></td>
                        
                        
                        <td>
                          <button class="btn btn-danger btn-xs delete_data" id="<?= $vacancy['vacancy_id']; ?>"><i class="fa fa-trash"></i></button>   
                        </td>

                    </tr>
                    <?php } ?>
                    
                </tbody>
             
            </table>
        </div>

    </div>

</div>