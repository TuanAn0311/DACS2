<?php
require_once "./user/core/App.php";
require_once "./user/core/Controller.php";
require_once "./user/model/da/database.php";
require_once "./user/core/boostrap.php";

include_once './user/model/da/database.php';
include_once './user/model/da/helper.php';
// include_once './user/model/da/ajax.php';

include_once './user/model/bl/freelancer.php';
include_once './user/model/bl/freelancerdb.php';
include_once './user/model/bl/post.php';
include_once './user/model/bl/postdb.php';
include_once './user/model/bl/user.php';
include_once './user/model/bl/userdb.php';
include_once './user/model/bl/specialized.php';
include_once './user/model/bl/specializeddb.php';
include_once './user/model/bl/applicant.php';
include_once './user/model/bl/applicantdb.php';
include_once './user/model/bl/ratefreelancer.php';
include_once './user/model/bl/ratefreelancerdb.php';
include_once './user/model/bl/company.php';
include_once './user/model/bl/companydb.php';
include_once './user/model/bl/job.php';
include_once './user/model/bl/jobdb.php';


$db = new Database();

?>
<style>
    .container{
        margin:10px 0 10px 0;
    }
    a{
        text-decoration: none;
    }
</style>