<?php

session_start();
require_once '../config/data-connect.php';

$loginemail = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'email', FILTER_DEFAULT));
$loginpassword = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
$out_stauts = 'warning';
$message = 'Something Wrong! Please Try Again';
$loginvalid = 0;
if (!empty($loginemail) && !empty($loginpassword)) {
    $stmt = $conn->prepare("SELECT * FROM siteadmin WHERE admin_email = ? AND admin_status = 'ACTIVE' LIMIT 1");
    if ($stmt) {
        $stmt->bind_param("s", $loginemail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            // Verify password (plain text legacy match or modern password_hash)
            if ($row['admin_password'] === $loginpassword || password_verify($loginpassword, $row['admin_password'])) {
                session_regenerate_id(true);
                $_SESSION['adminemail'] = $row['admin_email'];
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['admin_id']   = $row['admin_id'];
                $_SESSION['admin_role'] = !empty($row['admin_role']) ? $row['admin_role'] : 'SUPER_ADMIN';
                $_SESSION['started']    = time();

                // Update logintime
                $update_login = $conn->prepare("UPDATE siteadmin SET logintime = CURRENT_TIMESTAMP WHERE admin_id = ?");
                if ($update_login) {
                    $update_login->bind_param("i", $row['admin_id']);
                    $update_login->execute();
                    $update_login->close();
                }

                $out_stauts = 'success';
                $message = 'You are Welcome in Admin Panel';
                $loginvalid = 1;
            } else {
                $out_stauts = 'warning';
                $message = 'Username and Password Incorrect';
                $loginvalid = 0;
            }
        } else {
            $out_stauts = 'warning';
            $message = 'Username and Password Incorrect';
            $loginvalid = 0;
        }
        $stmt->close();
    }
}
$redirect = (isset($_SESSION['admin_role']) && $_SESSION['admin_role'] === 'ACCOUNTS') ? 'tds-declaration' : 'dashboard.php';
$response[] = array('status' => $out_stauts, 'msg' => $message, 'login' => $loginvalid, 'redirect' => $redirect);
echo json_encode($response);
?>