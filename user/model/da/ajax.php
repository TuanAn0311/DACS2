<?php
$limit =4;
if (isset($_POST['page'])) {
    $start = ($_POST['page']-1) * $limit;
}
       
        $job = new Job();
        $jobdb = new JobDatabase();
        $spedb = new SpecializedDatabase();
        $appdb = new ApplicantDatabase();
        $listJob = $jobdb->GET_CVLimit($start,$limit);
     
        foreach ($listJob as $job) {
            $speName = $spedb->getNameById($job->getMaChuyenNganh());
            $appCount = $appdb->countForJob($job->getMaCongViec());
            $salary = number_format($job->getMucLuong(), 0, ',', '.');
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
                    <div class="Gia"><?php echo $salary ?>.000 VNĐ</div>
                    <a href="http://localhost/DACS2/Home/jobDetail/<?php echo $job->getMaCongViec() ?>" id="changeContent" class="chaoGia">Chào giá cho dự án</a>
                </div>
            </div>
        </div>
        <?php
           
           }
        ?>