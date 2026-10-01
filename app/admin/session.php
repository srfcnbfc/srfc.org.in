<?php
@ob_start();
session_start();
// Check whether admin is logged in
if (!isset($_SESSION['adminemail']) || trim($_SESSION['adminemail']) === '') {
    header("location: index.php");
    exit();
}

$admin_code = $_SESSION['adminemail'];

$duration = (60 * 60);
if(isset($_SESSION['started']))
{
    $time = ($duration - (time() - $_SESSION['started']));
    if($time <= 0)
    {
        unset($_SESSION['adminemail']);
        session_destroy();
        header("location: index.php");
        exit();
    }
}
else
{
  $_SESSION['started'] = time();
}

// Role-based access control helpers
if (!function_exists('get_admin_role')) {
    function get_admin_role() {
        return $_SESSION['admin_role'] ?? 'SUPER_ADMIN';
    }
}

if (!function_exists('get_admin_name')) {
    function get_admin_name() {
        return $_SESSION['admin_name'] ?? 'Admin';
    }
}

if (!function_exists('get_role_label')) {
    function get_role_label($role = null) {
        $r = $role ?: get_admin_role();
        switch ($r) {
            case 'SUPER_ADMIN': return 'Super Admin';
            case 'HR':          return 'HR Manager';
            case 'CS':          return 'Company Secretary (CS)';
            case 'ACCOUNTS':    return 'Accounts & Finance';
            default:            return htmlspecialchars($r);
        }
    }
}

if (!function_exists('has_access')) {
    function has_access($allowed_roles = []) {
        $current_role = get_admin_role();
        if ($current_role === 'SUPER_ADMIN') {
            return true;
        }
        if (is_array($allowed_roles)) {
            return in_array($current_role, $allowed_roles, true);
        }
        return $current_role === $allowed_roles;
    }
}

if (!function_exists('check_page_access')) {
    function check_page_access($allowed_roles = []) {
        if (!has_access($allowed_roles)) {
            header("location: dashboard?error=unauthorized");
            exit();
        }
    }
}
?>