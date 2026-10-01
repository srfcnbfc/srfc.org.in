<?php 
require_once __DIR__ . '/header.php'; 
check_page_access(['SUPER_ADMIN']);
global $conn;

$admins_sql = "SELECT * FROM siteadmin ORDER BY admin_id ASC";
$admins_result = mysqli_query($conn, $admins_sql);
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-6 col-md-8">
                    <h3>Admin Users & Roles</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Admin Users & Roles</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-4 text-end">
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-add-user">
                        <i class="fa fa-user-plus"></i> Add New User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Role Overview Banner -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card bg-primary text-white p-3 mb-0" style="border-radius: 8px;">
                    <h6 class="mb-1"><i class="fa fa-shield"></i> Super Admin</h6>
                    <small>Full administrative system control & user management</small>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card bg-success text-white p-3 mb-0" style="border-radius: 8px;">
                    <h6 class="mb-1"><i class="fa fa-briefcase"></i> HR Role</h6>
                    <small>Job vacancies, candidate resume access & employee portal</small>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card bg-info text-white p-3 mb-0" style="border-radius: 8px;">
                    <h6 class="mb-1"><i class="fa fa-book"></i> CS Role</h6>
                    <small>Company Secretary: Compliance, investor docs & policies</small>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card bg-warning text-dark p-3 mb-0" style="border-radius: 8px;">
                    <h6 class="mb-1"><i class="fa fa-dollar"></i> Accounts Role</h6>
                    <small>TDS Form 121 declarations, finance queries & export</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid list-products mt-2">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Admin Accounts & Privileges</h5>
                        <span class="text-muted f-12">Assign distinct access roles for HR, CS, Accounts, and Administrators</span>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display table table-striped table-bordered" id="user-table">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Assigned Role</th>
                                        <th>Status</th>
                                        <th>Last Login</th>
                                        <th style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $serial = 1;
                                    while ($admin = mysqli_fetch_assoc($admins_result)) { 
                                        $role = $admin['admin_role'] ?? 'SUPER_ADMIN';
                                        $badge_class = 'badge-primary';
                                        $role_desc = 'Full System Access';
                                        if ($role === 'HR') {
                                            $badge_class = 'badge-success';
                                            $role_desc = 'Job Posts & Candidate Resumes';
                                        } else if ($role === 'CS') {
                                            $badge_class = 'badge-info';
                                            $role_desc = 'Compliance & Investor Documents';
                                        } else if ($role === 'ACCOUNTS') {
                                            $badge_class = 'badge-warning text-dark';
                                            $role_desc = 'Finance Queries & TDS Form 121';
                                        }
                                    ?>
                                    <tr>
                                        <td><?= $serial++; ?></td>
                                        <td><strong><?= htmlspecialchars($admin['admin_name']); ?></strong></td>
                                        <td><?= htmlspecialchars($admin['admin_email']); ?></td>
                                        <td>
                                            <span class="badge <?= $badge_class; ?>" style="font-size: 13px;">
                                                <?= htmlspecialchars(get_role_label($role)); ?>
                                            </span>
                                            <div class="text-muted f-11 mt-1"><?= $role_desc; ?></div>
                                        </td>
                                        <td>
                                            <?php if ($admin['admin_status'] === 'ACTIVE'): ?>
                                                <span class="badge badge-light-success text-success"><i class="fa fa-check-circle"></i> Active</span>
                                            <?php else: ?>
                                                <span class="badge badge-light-danger text-danger"><i class="fa fa-times-circle"></i> Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= !empty($admin['logintime']) ? date_format(date_create($admin['logintime']), "d/m/Y | H:i") : 'Never'; ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-xs edit-user-btn" 
                                                    data-id="<?= $admin['admin_id']; ?>"
                                                    data-name="<?= htmlspecialchars($admin['admin_name']); ?>"
                                                    data-email="<?= htmlspecialchars($admin['admin_email']); ?>"
                                                    data-role="<?= htmlspecialchars($role); ?>"
                                                    data-status="<?= htmlspecialchars($admin['admin_status']); ?>"
                                                    title="Edit User">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <?php if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != $admin['admin_id']): ?>
                                            <button class="btn btn-danger btn-xs delete-user-btn" 
                                                    data-id="<?= $admin['admin_id']; ?>"
                                                    data-name="<?= htmlspecialchars($admin['admin_name']); ?>"
                                                    title="Delete User">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Add New Admin User -->
<div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel"><i class="fa fa-user-plus text-primary"></i> Add New Admin User</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-add-user">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="add_name">Full Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="add_name" name="admin_name" placeholder="e.g. Rahul Sharma" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add_email">Email Address (Username) <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" id="add_email" name="admin_email" placeholder="e.g. hr@srfc.org.in" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add_password">Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" id="add_password" name="admin_password" placeholder="Create strong password" minlength="4" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add_role">Admin Role <span class="text-danger">*</span></label>
                        <select class="form-select" id="add_role" name="admin_role" required>
                            <option value="HR">HR Role (Job Vacancies, Candidate Resumes & Employee Portal)</option>
                            <option value="CS">CS Role (Company Secretary: Investor Docs, Compliance, Disclosures)</option>
                            <option value="ACCOUNTS">Accounts Role (Finance Queries, TDS Form 121 & CSV Export)</option>
                            <option value="SUPER_ADMIN">Super Admin (Full Unrestricted System Access)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add_status">Status</label>
                        <select class="form-select" id="add_status" name="admin_status">
                            <option value="ACTIVE" selected>ACTIVE</option>
                            <option value="INACTIVE">INACTIVE</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-save-user">Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Edit Admin User -->
<div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel"><i class="fa fa-pencil text-primary"></i> Edit Admin User & Role</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit-user">
                <input type="hidden" id="edit_id" name="admin_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="edit_name">Full Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="edit_name" name="admin_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_email">Email Address <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" id="edit_email" name="admin_email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_password">New Password</label>
                        <input class="form-control" type="password" id="edit_password" name="admin_password" placeholder="Leave blank to keep current password">
                        <small class="text-muted">Only fill if you want to reset this user's password.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_role">Assigned Role <span class="text-danger">*</span></label>
                        <select class="form-select" id="edit_role" name="admin_role" required>
                            <option value="HR">HR Role (Job Vacancies, Candidate Resumes & Employee Portal)</option>
                            <option value="CS">CS Role (Company Secretary: Investor Docs, Compliance, Disclosures)</option>
                            <option value="ACCOUNTS">Accounts Role (Finance Queries, TDS Form 121 & CSV Export)</option>
                            <option value="SUPER_ADMIN">Super Admin (Full Unrestricted System Access)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_status">Account Status</label>
                        <select class="form-select" id="edit_status" name="admin_status">
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="INACTIVE">INACTIVE</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" id="btn-update-user">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('elements/modal-container.php'); ?>
<?php include_once 'footer.php'; ?>

<script>
$(document).ready(function() {
    $('#user-table').DataTable({
        "paging": true,
        "ordering": true,
        "info": true
    });

    // Add user submit
    $('#form-add-user').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#btn-save-user');
        btn.prop('disabled', true).text('Creating...');

        $.ajax({
            url: 'modules/admin-user/user-save.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res) {
                btn.prop('disabled', false).text('Create User');
                if (res.status === 'success') {
                    swal("Success!", res.msg, "success").then(function() {
                        location.reload();
                    });
                } else {
                    swal("Notice", res.msg, res.status || "warning");
                }
            },
            error: function() {
                btn.prop('disabled', false).text('Create User');
                swal("Error", "Could not connect to server.", "error");
            }
        });
    });

    // Open Edit modal
    $(document).on('click', '.edit-user-btn', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var role = $(this).data('role');
        var status = $(this).data('status');

        $('#edit_id').val(id);
        $('#edit_name').val(name);
        $('#edit_email').val(email);
        $('#edit_role').val(role);
        $('#edit_status').val(status);
        $('#edit_password').val('');

        $('#modal-edit-user').modal('show');
    });

    // Edit user submit
    $('#form-edit-user').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#btn-update-user');
        btn.prop('disabled', true).text('Saving...');

        $.ajax({
            url: 'modules/admin-user/user-update.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res) {
                btn.prop('disabled', false).text('Save Changes');
                if (res.status === 'success') {
                    swal("Updated!", res.msg, "success").then(function() {
                        location.reload();
                    });
                } else {
                    swal("Notice", res.msg, res.status || "warning");
                }
            },
            error: function() {
                btn.prop('disabled', false).text('Save Changes');
                swal("Error", "Could not connect to server.", "error");
            }
        });
    });

    // Delete user
    $(document).on('click', '.delete-user-btn', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');

        swal({
            title: "Delete User?",
            text: "Are you sure you want to remove " + name + "? This cannot be undone.",
            icon: "warning",
            buttons: ["Cancel", "Yes, Delete"],
            dangerMode: true
        }).then(function(willDelete) {
            if (willDelete) {
                $.ajax({
                    url: 'modules/admin-user/user-delete.php',
                    method: 'POST',
                    data: { code: id },
                    dataType: 'json',
                    success: function(res) {
                        if (res.status === 'success') {
                            swal("Deleted!", res.msg, "success").then(function() {
                                location.reload();
                            });
                        } else {
                            swal("Error", res.msg, res.status || "warning");
                        }
                    },
                    error: function() {
                        swal("Error", "Failed to delete user.", "error");
                    }
                });
            }
        });
    });
});
</script>
