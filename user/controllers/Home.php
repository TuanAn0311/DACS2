<?php
class Home extends Controller{
 
    function Login(){
        $login = $this->view("login",['']);
    }

    function ajax(){
        require_once "./user/model/da/ajax.php";
    }

    function jobDetail($macv) {
        if (!empty($_SESSION['ma_nguoi_dung'])) {

            include_once('./user/layout/header.php');
            $jobDetail = $this->view("jobDetail",['macv'=>$macv]);
            include_once('./user/layout/footer.php');
        
        } else {
            $login = $this->view("login",['']);
        }
    }

    function Profile($id) {
        if (!empty($_SESSION['ma_nguoi_dung'])) {

            include_once('./user/layout/header.php');
            if ($_SESSION['vai_tro']==='nguoi_tim_viec') {
                $profile = $this->view("profile_freelancer",['id_profile'=>$id]);
            } elseif($_SESSION['vai_tro']==='nha_tuyen_dung') {
                $profile = $this->view("profile_company",['id_profile'=>$id]);
            }
        
            include_once('./user/layout/footer.php');
        } else {
            $login = $this->view("login",['']);

        }
    }

    function Delete($id_job){
        $jobdb = new JobDatabase();
        $jobdb->delete($id_job);
        header("Location: http://localhost/DACS2/Home/Profile/".$_SESSION['ma_nguoi_dung']);
        // $this->Profile($_SESSION['ma_nguoi_dung']);
    }

    function Register(){
        $login = $this->view("register",[]);
    }

    function action($content){
        include_once('./user/layout/header.php');
        if(!empty($content))
        {
            switch($content)
            {
                case "intro":
                    include_once './user/view/page/intro.php';
                    break;
                case "jobDetail":
                    include_once './user/view/page/jobDetail.php';
                    break;
                case "post":
                    include_once './user/view/page/postview.php';
                    break;
                case "postdetail":
                    include_once './user/view/page/postdetail.php';
                    break;
                case "profile":
                    include_once './user/view/page/profile.php';
                    break;
                case "addpost":
                    include_once './user/view/page/addpost.php';
                    break;
                case "see-more-job":
                    echo "<hr>";
                    echo "<h2 class='text-light text-center'>Tìm kiếm công việc phù hợp với bạn ở đây !</h2>";
                    include_once './user/view/page/seeMoreJob.php';
                    break;
                default:
                    include_once './user/view/page/first.php';
                    include_once './user/view/page/listjob.php';                    
            }
        }
        else{
            include_once './user/view/page/postview.php';
        }
            include_once('./user/layout/footer.php');
        }
    }
?>  