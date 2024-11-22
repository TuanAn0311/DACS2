<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo Helper::get_url('/user/public/css/headerstyle.css') ?>">
    <title>Document</title>
</head>
<body>
<header>
    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <a href="<?php echo Helper::get_url('Home/action/home') ?>">
                    <img src="/DACS2/user/public/img/logo.jpg" alt="Logo" style=" width:110px; height:auto;">
                </a>
            </div>
            <div class="col-md-3">
                <form onsubmit="searchRedirect(event)">
                    <div class="input-group">
                        <input type="text" id="textt" style="width:80%;" placeholder="Tìm Kiếm!">
                        <button type="submit" id="search" >
                            <i class="bi bi-search" style="font-size: 18px;"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <div class="dropdown">
                    <span class="dropdown-toggle w-100" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Khám phá dịch vụ
                    </span>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dịch vụ từ Freelancer</a></li>
                        <li><a class="dropdown-item" href="#">Dự án tìm Freelancer</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 log">
                <a href="<?php echo "?lay=intro" ?>">Trở thành Freelancer</a>
            </div>
            <div class="col-md-1 mt-1">
                <a href=""><i class="bi bi-bell-fill"></i> </a>&ensp; &ensp;
                <a href=""><i class="bi bi-briefcase"></i></a>
            </div>
            
            <div class="col-md-2 log">
                <?php
                if (!empty($_SESSION['ma_nguoi_dung'])) {
                    $id = $_SESSION['ma_nguoi_dung'];
                    if ($_SESSION['vai_tro'] === 'nha_tuyen_dung') {
                        $com = new Company();
                        $comdb = new CompanyDatabase();
                        $com = $comdb->getByIdUser($id);
                        $_SESSION['id_profile'] = $com->getComId();
                        $_SESSION['ma_nha_tuyen_dung'] = $_SESSION['id_profile'];
                        $anh = $com->getImg();
                    } else {
                        $free = new Freelancer();
                        $freedb = new FreelancerDatabase();
                        $free = $freedb->getByIdUser($id);
                        $_SESSION['id_profile'] = $free->getFreeId();
                        $anh = $free->getImg();
                    }
                    ?>
                    
                    <a href="<?php echo Helper::get_url('Home/Profile/'.$_SESSION['id_profile']) ?>" class="d-flex justify-content-center align-items-center position-absolute top-0">
                        <img id="avatar" width="20%" src="<?php echo Helper::get_url('user/public/img/'.$anh) ?>" alt="">&#160
                        <span><?php echo $_SESSION['ten_dang_nhap'] ?></span>
                    </a>
                    <a href=""></a>
                    
                <?php 
                }
                else{ 
                    ?>
                    <a href="<?php echo Helper::get_url('Home/Login') ?>">Đăng nhập</a>
                    <div class="line"></div>
                    <a href="<?php echo Helper::get_url('Home/action/register') ?>">Đăng kí</a>
                <?php }
                ?>
            </div>
        </div>
    </div>
</header>
<script>
    function searchRedirect(event) {
        event.preventDefault();
        const searchValue = document.getElementById("textt").value;
        const newUrl = window.location.origin + window.location.pathname + "?lay=post&condition=" + encodeURIComponent(searchValue);
        window.location.href = newUrl;
    }
</script>

</body>
</html>
