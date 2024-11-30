
<head>
    <title>danh sách công việc</title>
    <link rel="stylesheet" href="<?php echo Helper::get_url("user/public/css/job.css") ?>">
</head>
<body>
    
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
    <div class="vs-pagination" style="align-items:center">
        <a href="#" class="bagi-btn-prev bagi-btn">prev</a>
        <ul>
            <?php
                $count = $jobdb->countRow();
                $limit = 4;
                $sotrang = ceil($count / $limit);

                $current_page = isset($_POST['page']) ? (int)$_POST['page'] : 1;

                // Xác định trang bắt đầu và kết thúc để hiển thị tối đa 5 số
                $start_page = max(1, $current_page - 2);
                $end_page = min($sotrang, $current_page + 2);

                for ($i = $start_page; $i <= $end_page; $i++) {
                    $activeClass = ($i === $current_page) ? "active-page" : "";
                    echo "<li><span class='sotrang $activeClass' data-page='" . $i . "'>" . $i . "</span></li>";
                }
            ?>
        </ul>
<?php //echo Helper::get_url("Home/action/see-more-job") ?>
        <a href="#" class="bagi-btn-next bagi-btn">next</a>
    </div>
    <div id="soTrang" style="display:none"><?php echo $sotrang ?></div>

<script src="<?php echo Helper::get_url("user/public/js/job.js") ?>">
</script>