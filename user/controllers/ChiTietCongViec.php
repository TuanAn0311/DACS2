<?php
    class ChiTietCongViec extends Controller {

        function chiTietCV($maCV){ //maCV la so lieu params
             $CV = $this->model("congViec");
            
            $this->view("joinJob",["chiTietCV"=>$CV->GET_chiTietCV($maCV)]);
        }
       
    }
?>