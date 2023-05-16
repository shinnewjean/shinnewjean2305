<?php
namespace application\controller;
// 로그인은 겟방식 포스트방식 모두 이용합니다.

// Controller class를 상속받음
class UserController extends Controller{
    // + GET 방식으로 로그인 페이지를 요청할 때 실행되는 메서드
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function mainGet() {
        return "main"._EXTENSION_PHP;
    }

    // + POST 방식으로 로그인 정보를 전달할 때 실행되는 메서드
    public function loginPost() {
        $result = $this->model->getUser($_POST); // 230516_add DB에서 유저 정보 습득
        $this->model->close(); // 230516_add DB파기

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
        // return _BASE_REDIRECT."/product/list";
        return _BASE_REDIRECT."/user/main"; //로그인후 메인페이지로 리턴

    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();
        // 로그인 페이지 리턴
        // return "login"._EXTENSION_PHP;
        // 리스트페이지로 리턴
        return "main"._EXTENSION_PHP;
    }

    // 회원가입
    // 회원가입 버튼은 프론트엔드에서 글자수제한 등을 하게되면 사용자가 바꾸기 쉽기때문에 백엔드 폴더에서도 검사를 해야합니다.
    public function registGet(){
        return "regist"._EXTENSION_PHP;
    }

    public function registPost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성체크
        // ID글자수 체크---------------------------------------------------
        if ( mb_strlen($arrPost["id"]) > 12 ) {
            $arrChkErr["id"] = "ID는 12글자 이하로 입력해주세요.";
        }
        elseif ( mb_strlen($arrPost["id"]) === 0 ) {
            $arrChkErr["id"] = "ID를 입력해주세요.";
        }
        // ID 영문 숫자 체크
// ************************************************

        // PW 글자수 체크---------------------------------------------------
        if ( mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20 ) {
            $arrChkErr["pw"] = "PW는 8~20글자로 입력해주세요.";
        }
        // PW 영문, 숫자, 특수문자 체크
// ************************************************

        // 비밀번호와 비밀번호 체크 확인-------------------------------------
        if ($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "비밀번호와 확인이 일치하지 않습니다.";
        }

        // NAME글자수 체크----------------------------------------------------
        if ( mb_strlen($arrPost["name"]) > 30 ) {
            $arrChkErr["name"] = "이름는 30글자 이하로 입력해주세요.";
        }
        elseif ( mb_strlen($arrPost["name"]) === 0 ) {
            $arrChkErr["name"] = "이름을 입력해주세요.";
        }

        // 유효성 체크가 에러일 경우
        if (!empty($arrChkErr)) {
            // 에러메세지 셋팅
            $this -> addDynamicProperty('arrError',$arrChkErr);
            return "regist"._EXTENSION_PHP;
        }

        // 230516_add 기존의 ID select로 가져옴_____________________
        $result = $this->model->getUser($arrPost, false);
        //__________________________________________________________
        
        // 230516_add ID 중복체크___________________________________
        // + 입력된 로그인 ID정보가 DB에 있는지 확인하고, 정보가 없으면 에러 메시지를 출력한 후 회원가입 페이지를 다시 로드
        if(count($result) !== 0) {
            $errMsg = "입력하신 ID가 사용중입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 회원가입페이지로 페이지 리턴
            return "regist"._EXTENSION_PHP;
        }
        //__________________________________________________________
        // Transaction start
        $this->model->beginTransaction();

        // User Insert
        if (!$this->model->insertUser($arrPost)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User Regist ERROR";
            exit();
        }

        $this->model->commit(); //정상처리 커밋
        // *** Transaction End
        
        // 로그인페이지로 이동
        return _BASE_REDIRECT."/user/main";


    }
}
?>