<?php
//xoá tất cả các biến 
session_unset();
session_destroy();
// Xóa cookie liên quan đến session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
$_SESSION['message_logout'] = 'Đăng xuất thành công!';
header("location: http://localhost/DACS2/Home/Login");
exit();
?>