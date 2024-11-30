
<head>
    <title>danh sách công việc</title>
    <link rel="stylesheet" href="<?php echo Helper::get_url('./user/public/css/job.css') ?>">

    <style>
    a{
    text-decoration: none;
     
    }
    </style>
</head>
<body class="bg-secondary">
    <div class="container ">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-light text-center"><h3>Danh Sách các bài đăng nổi bật !</h3></div>
            <div class="col-3"><h5><a class="text-warning" href="<?php echo Helper::get_url("Home/action/see-more-job") ?>">Xem thêm <i class="bi bi-arrow-right text-light"></i></a> </h5></div>
        </div>
    </div>
    
    <div id="danh_sach_cong_viec">
        <?php
        $job = new Job();
        $jobdb = new JobDatabase();
        $spedb = new SpecializedDatabase();
        $appdb = new ApplicantDatabase();
        $listJob = $jobdb->GET_CVLimit(0,4);
     
        foreach ($listJob as $job) {
            $speName = $spedb->getNameById($job->getMaChuyenNganh());
            $appCount = $appdb->countForJob($job->getMaCongViec());
            $salary = number_format($job->getMucLuong(), 0, ',', ',');
        ?>
        <div class="container">
            <div class="row" id="thongTinSn">
                <div class="col-8 left">
                    
                    <a href="#tenNganh" class="yellow"><?php echo $speName->getSpeName() ?></a>
                    
                    <br>
                    <a href="#TieuDe" class="tieuDe yellow"><?php echo $job->getTieuDeCongViec() ?></a><br>
                    <span class=" bi bi-pin-angle-fill chaoGia white">
                    <?php echo $appCount ?> Chào giá
                    </span> |
                    <span class=" bi bi-stopwatch thoiGianDangBai white">
                    <?php echo $job->getNgayTao() ?>
                    </span>
                    <p class="moTa grey">
                    <?php echo $job->getMoTaCongViec() ?>
                    </p> 
                    
                    
                </div>
                <div class="col-4 right">
                    <span style="color: white">Trạng thái: <?php echo $job->getTrangThai() ?></span>
                    <div class="Gia"><?php echo $salary ?> VNĐ</div>
                    <a href="http://localhost/DACS2/Home/jobDetail/<?php echo $job->getMaCongViec() ?>" id="changeContent" class="chaoGia">Chào giá cho dự án</a>
                </div>
            </div>
        </div>
        <?php
           
           }
        ?>
    </div>
    
    <div id="soTrang" style="display:none"><?php echo $sotrang ?></div>

<script src="../mvc/views/resource/js/job.js"></script>