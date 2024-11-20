<?php
class Home extends Controller{
 
    function Login(){
        $login = $this->view("login",['']);
        $CV = $this->model("postdb");
    }

    function ajax(){
        require_once "./user/model/da/ajax.php";
    }

    function jobDetail($macv) {
        include_once('./user/layout/header.php');
        $jobDetail = $this->view("jobDetail",['macv'=>$macv]);
        include_once('./user/layout/footer.php');

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