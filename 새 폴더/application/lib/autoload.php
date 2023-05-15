<?php
// include_once , require_once를 사용하지 않아도 자동으로 처리해주는

spl_autoload_register( function($path) {
    $path = str_replace( "\\","/",$path ); // "\"를 "/"로 변환
    $arr_path = explode( "/" , $path ); // "/"를 기준으로 배열로 변환

    // 해당 파일 require_once
    require_once($path._EXTENSTION_PHP);

});