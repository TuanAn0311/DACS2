<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "dacs2");

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra định dạng form nhập không có khoảng trắng
    if (strpos($username, ' ') !== false || strpos($password, ' ') !== false) {
        // Nếu có khoảng trắng, báo lỗi
        $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không được chứa khoảng trắng.';
        header("Location: http://localhost/DACS2/Home/Login");
        exit();
    } else { 
        // Truy vấn kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
        $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username); // Bind username vào câu truy vấn
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($user = mysqli_fetch_array($result)) {
            // Kiểm tra mật khẩu đã mã hóa
            if (password_verify($password, $user['mat_khau'])) {
                // Nếu mật khẩu đúng, lưu thông tin người dùng vào session
                $_SESSION['message'] = 'Đăng nhập thành công';
                $_SESSION['ma_nguoi_dung'] = $user['ma_nguoi_dung'];
                $_SESSION['ten_dang_nhap'] = $user['ten_dang_nhap'];  // Lưu tên đăng nhập
                $_SESSION['vai_tro'] = $user['vai_tro'];  // Lưu tên đăng nhập
                
                header("Location: http://localhost/DACS2/Home/action/home");
                exit();
            } else {  
                // Nếu mật khẩu không đúng
                $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
                header("Location: http://localhost/DACS2/Home/Login");
                exit();
            }
        } else {
            // Nếu không tìm thấy người dùng
            $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
            header("Location: http://localhost/DACS2/Home/Login");
            exit();
        }
    }
}
?>