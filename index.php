<?php
// + index.php : 웹 어플리케이션의 진입점(entry point) 역할
// + 웹 브라우저에서 요청한 URL에 따라 적절한 컨트롤러(Controller)를 호출하고
// + 컨트롤러는 모델(Model)과 뷰(View)를 조합하여 HTML 문서를 생성하고, 웹 브라우저에 응답으로 반환함


// config 파일
// require : 해당 파일을 불러오지 못하면 페이탈 에러, 프로그램이 즉시 멈춤
require_once("application/lib/config.php");
require_once("application/lib/autoload.php");

new application\lib\Application(); // Application 호출

?>