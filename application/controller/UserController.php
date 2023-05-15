<?php
namespace application\controller;
// 로그인은 겟방식 포스트방식 모두 이용합니다.

// Controller class를 상속받음
class UserController extends Controller{
    // + GET 방식으로 로그인 페이지를 요청할 때 실행되는 메서드
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    // + POST 방식으로 로그인 정보를 전달할 때 실행되는 메서드
    public function loginPost() {
        $result = $this->model->getUser($_POST);
        // 유저 유무 체크
        // + 입력된 로그인 정보가 DB에 있는지 확인하고, 정보가 없으면 에러 메시지를 출력한 후 로그인 페이지를 다시 로드
        if(count($result) === 0) {
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSION_PHP;
        }
        // + 정보가 있다면, 로그인 성공 처리, 세션에 유저 ID를 저장하고, 리스트 페이지로 이동
        // session에 User ID 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        // 리스트 페이지 리턴
        return _BASE_REDIRECT."/product/list";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();
        // 로그인 페이지 리턴
        return "login"._EXTENSION_PHP;
    }
}
?>