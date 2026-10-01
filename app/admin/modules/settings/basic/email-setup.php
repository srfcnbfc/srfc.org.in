<?php
$mailsql = "SELECT * FROM mail_setup WHERE 1";
$mail_data = getsingleData($mailsql);
?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Email Setup Details</h5>
    </div>
    <div class="card-body">

        <div class="form theme-form">
            <form autocomplete="off" id="email-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>SMTP Hostname</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-envelope"> </i></span>
                                <input name="smtp_host" value="<?= $mail_data['smtp_host']; ?>"class="form-control" type="text" placeholder="SMTP hostname" required>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                            <label>SMTP Port</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-bars"> </i></span>
                                <input name="smtp_port" value="<?= $mail_data['smtp_port']; ?>" class="form-control" type="number" min="50" placeholder="SMTP Port" required>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                            <label>SMTP Secure</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-lock"> </i></span>
                                <select name="smtp_secure" class="form-control" required title="Please Select SMTP Security">
                                    <option value="TLS" <?= $mail_data['smtp_secure']=="TLS"?'selected':''; ?> >TLS</option>
                                    <option value="SSL" <?= $mail_data['smtp_secure']=="SSL"?'selected':''; ?>  >SSL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Sender Name</label>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-building"> </i></span>
                                <input name="sender_name" value="<?= $mail_data['sender_name']; ?>" class="form-control" type="text" placeholder="Enter Sender Name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Sender Email/Username</label>
                           <div class="input-group"><span class="input-group-text"><i class="fa fa-mail-forward"> </i></span>
                               <input name="mail_username" value="<?= $mail_data['username']; ?>" class="form-control" type="text" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Sender Password</label>
                           <div class="input-group"><span class="input-group-text"><i class="fa fa-key"> </i></span>
                               <input name="mail_password" value="<?= $mail_data['password']; ?>" class="form-control" type="text" placeholder="Email Password" required>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Default Email Message</label>
                             <textarea name="default_mail" id="summernote" class="form-control" placeholder="Default Email" rows="5" cols="5" required><?= $mail_data['default_email']; ?></textarea>
                        </div>
                        
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <button type="submit"  name="update_email" class="btn btn-primary me-3" >Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>