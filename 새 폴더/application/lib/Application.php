<?php
// class인경우 파일명 앞글자 대문자로 카멜기법을 사용합니다.
// class명은 파일명을 같이 합니다. 네임스페이스로 어디에있는 클래스인지 알기쉽게 합니다.

namespace application\lib;

use application\util\UrlUtil;

class Application{
    

    // 생성자
    public function __construct(){
        // $path = isset($_GET["url"]) ? $_GET["url"] : "" ; // 원래는 객체안에 적지만 이번은 그냥 생성자 안에 적음
        // $arr_path = $path !== "" ? explode( "/" , $path ) : "";
        
        $arrPath = UrlUtil::getUrlArrPath(); // 접속 URL을 배열로 획득
        $identityName = empty($arrPath[0]) ? "User" : ucfirst($arrPath[0]);
        $action = (empty($arrPath[1]) ? "login" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));

        // controller명 작성
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSTION_PHP;

        // 해당 controller 파일 존재 여부 체크
        if(!file_exists($controllerPath)) {
            echo "해당 컨트롤러 파일이 없습니다. : ".$controllerPath; // 에러 페이지로 넘어가는 동작도 만들수있습니다.
            exit();
        }

        // 해당 controller 호출 // 
        $controllerName = UrlUtil::replaceSlashToBackslash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER); // class명이 오는거라서 .php 안붙습니다.
        new $controllerName($identityName,$action);

        // var_dump($controllerName);
        // exit;
    }
}

// new application\lib\Application();
