
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/public/css/register.css">
    <script src="<?php echo Helper::get_url('user/public/js/register.js') ?>"></script>
    <title>Document</title>
</head>
<body id="background-image-div">
    <div class="container text-center p-3" id="register">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="" method="post"  id="registerForm">
                    <div class="row wel">
                        <b>Chào mừng đến với</b>
                        <a href=""><img src="<?php echo Helper::get_url('user/public/img/logo.jpg') ?>" alt="Logo" class="logo"></a>
                    </div>
                    <div class="row text-lift fs-5 mb-4"><h5>Vui lòng đăng ký để tiếp tục</h5></div>
                    <div class="row mb-1">
                        <div class="input-group d-flex align-items-center justify-content-center">
                            <input type="text" id="ten" placeholder="Nhập họ tên đầy đủ của bạn" onblur="hoTen()" name="fullName" value="<?php echo $_SESSION['form_data']['fullName'] ?? ''; ?>">
                            &#160<div class="icon"><i class="bi bi-person-circle">&ensp;</i></div>
                        </div>
                        <div id="name" class="tb">Vui lòng không để trống</div>
                    </div>
                    <div class="row mb-1">
                        <div class="input-group d-flex align-items-center justify-content-center">
                            <input type="text" id="mail" placeholder="Nhập địa chỉ Email" onblur="kiemTraEmail()" name="email" value="<?php echo $_SESSION['form_data']['email'] ?? ''; ?>">
                            &#160<div class="icon"><i class="bi bi-envelope-at">&ensp;</i></div>
                        </div>
                        <div id="email" class="tb">Email không hợp lệ</div>
                    </div>
                    <div class="row mb-1">
                        <div class="input-group d-flex align-items-center justify-content-center">
                            <input type="text" id="tendn" placeholder="Nhập họ tên đăng nhập của bạn" onblur="tenDangNhap()" name="userName" value="<?php echo $_SESSION['form_data']['userName'] ?? ''; ?>">
                            &#160<div class="icon"><i class="bi bi-people-fill">&ensp;</i></div>
                        </div>
                        <div id="username" class="tb">Vui lòng không để trống</div>
                    </div>
                    <div class="row mb-4">
                        <div class="input-group d-flex align-items-center justify-content-center">
                            <input type="password" id="matkhau" placeholder="Nhập mật khẩu" onblur="matKhau()" name="pass" value="<?php echo $_SESSION['form_data']['pass'] ?? ''; ?>">
                            &#160<div class="icon"><i class="bi bi-lock-fill">&ensp;</i></div>
                        </div>
                        <div id="pass" class="tb">Mật khẩu ít nhất 6 kí tự</div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3"></div>
                        <div class="col-3">
                            <label class="d-inline-block bor" id="borFree">
                                <input type="radio" name="choose" id="freelancer" value="nha_tuyen_dung" onchange="baoLoiVaiTro()" 
                                <?php echo (isset($_SESSION['form_data']['choose']) 
                                && $_SESSION['form_data']['choose'] == 'nha_tuyen_dung') ? 'checked' : ''; ?>> 
                                <br>Tôi là nhà tuyển dụng
                            </label>
                        </div>
                        <div class="col-3">
                            <label class="d-inline-block bor" id="borEmploy">
                                <input type="radio" name="choose" id="employer" value="nguoi_tim_viec" onchange="baoLoiVaiTro()" 
                                <?php echo (isset($_SESSION['form_data']['choose']) 
                                && $_SESSION['form_data']['choose'] == 'nguoi_tim_viec') ? 'checked' : ''; ?>> 
                                <br>Tôi là freelancer, muốn tìm việc
                            </label>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" style="color:black" class="btn btn-success" onclick="baoLoiVaiTro(); hoTen(); kiemTraEmail(); tenDangNhap(); matKhau()">
                                Tạo tài khoản
                            </button>
                        </div>
                        <input type="hidden" name="action" value="regis">
                    </div>
                    <span>Bạn đã có tài khoản?</span>
                    <a href="<?php echo Helper::get_url('Home/Login')?>">Đăng nhập</a>
                    <div class="row mb-3">
                    </div>
                    <div class="row"></div>
                </form>
            </div>
            <div class="col-4"></div>     
        </div>
    </div>
</body>
</html>



