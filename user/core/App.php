<?php
class App{
    protected $controller="Home";
    protected $action="Login";
    protected $params=[];

    function __construct(){

        $arr= $this->UrlProcess();

        //xu li Controller
        if(file_exists("./user/controllers/" . $arr[0] . ".php")){
            if (isset($arr[0])) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "./user/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        
        //xu li Action
        if(isset($arr[1])){
            if (method_exists($this->controller, $arr[1])) {//kiểm tra sự tồn tại của phương thức trong Home
                $this->action = $arr[1];
                
            }
            unset($arr[1]);
        }

        //xu li params
        $this->params = $arr?array_values($arr):[];
        //nếu arr tồn tại thì gán giá trị của mạng đó cho params, ngược lại thì gán rỗng

        call_user_func_array([$this->controller, $this->action], $this->params);
        
    }

    function UrlProcess(){
        if (isset($_GET["url"])) {
          //trim(chuỗi,"/") : cắt bỏ kí tự "/" ở đầu "và" cuối
          //trim() cắt bỏ kí tự khoảng trắng.
          //filter_var(...): Kiểm tra xem chuỗi URL đã được loại bỏ dấu gạch chéo có đúng định dạng URL hay không.
          //explode(): tạch mảng dựa trên dấu "/"
          return explode("/",filter_var(trim($_GET["url"],"/")));
        }        
    }
}
?>