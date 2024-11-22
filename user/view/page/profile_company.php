<?php
$id = $data['id_profile'];
echo $id;
$companydb = new CompanyDatabase();
$company = $companydb->getById('11');
$jobdb = new JobDatabase();
$listJob = $jobdb->GET_CVLimitByCompanyId($id);

if($company->getImg()==''){
    $img = "https://via.placeholder.com/150";
} else{
    $img = Helper::get_url('user/public/img/') . $company->getImg();
} 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
</head>
<body>
<div class="container my-4">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 border border-muted p-5">
            <div class="text-center mb-4">
                <img src="<?php echo $img ?>" alt="Company Logo" class="rounded-circle mb-3" height="150px;" width="150px;">
                <h1 class="fw-bold"><?php echo $company->getName() ?></h1>
            </div>
            <hr>
            <div>
                <p class="mb-4 fs-5">
                    <strong>Mô tả công ty:</strong> <?php echo $company->getDes() ?>
                </p> <hr>
                <h2 class="h5 mb-3">Danh sách các dự án:</h2>
                <?php
                if (!empty($listJob)) {
                    foreach ($listJob as $job){
                ?>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?php echo $job->getTieuDeCongViec() ?></h5>
                                    <p class="card-text">
                                        <?php echo $job->getMoTaCongViec() ?>
                                    </p>
                                    <h6 class="card-subtitle mb-3 text-success">Mức lương: <?php echo $job->getMucLuong() . " VND" ?></h6>
                                    <a href="#" class="btn btn-success">Xem chi tiết</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php
                    }
                ?>
                <?php
                }else {
                    echo "<h1>Bạn chưa có dự án nào!</h1>";
                }
                ?>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
</body>
