<?php
// include_once , require_once를 사용하지 않아도 자동으로 처리해주는

// + spl_autoload_register 함수는 클래스가 호출되어 생성될 때 PHP 엔진에서 실행되는 콜백 함수를 등록함
// + (해당 클래스명을 가진 파일을 자동으로 include/require 해줌)
spl_autoload_register(function($path) {
    $path = str_replace("\\", "/", $path); // php는 "/"가 기본, "\"를 "/"로 변환

    // $arr_path = explode( "/" , $path ); // "/"를 기준으로 배열로 변환

    // 해당 파일 require
    require_once($path._EXTENSION_PHP);
});

?>