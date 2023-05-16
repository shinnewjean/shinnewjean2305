<?php
namespace application\controller;

class ApiController extends Controller {
    public function userGet() {
        $arrGet = $_GET;
        $arrData = [ "flg" => "0" ];

        // model 호출
        $this->model = $this->getModel("user");
        
        $result = $this->model->getUser($arrGet, false);

        // 유저 유무 체크
        if(count($result) !== 0) {
            $arrData["flg"] = "1";
            $arrData["msg"] = "입력하신 ID가 사용중입니다.";
        } 

        // 배열을 JSON으로 변경
        $json = json_encode($arrData);
        // http_response_code(400);
        header('Content-type: application/json');
        echo $json;
        exit();

    }
}

?>