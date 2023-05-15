<?php
namespace application\util;
// 파일명+폴더명.php 로 이름 규정을 지켜주세요.

class UrlUtil {

    // $_GET["url"]을 분석해서 리턴
    public static function getUrl() {
        // + $_GET["url"]에 값이 있으면 그 값을, 없으면 빈 문자열을 리턴
        // + ex) localhost/user/login 이라면 user/login을 리턴
        return $path = isset($_GET["url"]) ? $_GET["url"] : "";
    }

    // URL을 "/"로 구분해서 배열을 만들고 리턴
    public static function getUrlArrPath() {
        // static으로 선언 되어 있기 때문에, 인스턴트화 하지 않고, ::로 사용 가능
        // $obj = new UrlUtill();
        // $obj->getUrl();

        // + UrlUtil::getUrl() 메소드를 호출하여 $url 변수에 할당
        $url = UrlUtil::getUrl();
        // + $url이 빈 문자열("")이 아니면 "/"를 구분자로 사용하여 문자열을 분할한 배열을, 빈 문자열이면 그대로 리턴
        return $url !== "" ? explode("/", $url) : "";
    }

	// "/"를 "\"로 치환해주는 메소드
	public static function replaceSlashToBackslash($str) {
		return str_replace("/", "\\", $str);
	}
}