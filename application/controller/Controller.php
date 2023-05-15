<?php
namespace application\controller;
// 로그인은 겟방식 포스트방식 모두 이용합니다.

use application\util\UrlUtil;
use \AllowDynamicProperties;

#[AllowDynamicProperties]
class Controller{
    protected $model;
    private static $modelList = [];
    private static $arrNeedAuth = ["product/list"];

    // 생성자
    public function __construct($identityName,$action){
        //session start
        if (!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // model 호출
        $this->model = $this->getModel($identityName);

        // controller 메소드 호출
        $view = $this->$action();

        if (empty($view)) {
            echo "해당 controller에 메소드가 없습니다.".$action;
            exit();
        }

        // view 호출
        require_once $this->getView($view);
    }

    // model 호출하고 결과를 리턴
    protected function getModel ($identityName){
        // model 생성 체크
        if (!in_array($identityName, self::$modelList)) { // 셋팅이 되어있는지 확인
            $modelName = UrlUtil::replaceSlashToBackslash(_PATH_MODEL.$identityName._BASE_FILENAME_MODEL); // class명이 오는거라서 .php 안붙습니다.
            self::$modelList[$identityName] = new $modelName(); // model class 호출
        }
        return self::$modelList[$identityName];
    }

    // 파라미터를 확인해서 해당하는 view를 리턴하거나, redirect
    protected function getView($view) {
        // view를 체크
        if (strpos($view,_BASE_REDIRECT) === 0 ) {
            header($view);
            exit();
        }

        return _PATH_VIEW.$view;
    }

    // 동적 속성(Dynamic Property)를 셋팅하는 메소드
    protected function addDynamicProperty($key, $val) {
        $this->$key = $val; // $key인 이유? 파라미터의 값을 가져오는것 key일 경우 변수가 됩니다.
    }

    // 유저 권한 체크 메소드
    protected function chkAuthorization() {
        $urlPath = UrlUtil::getUrl();
        foreach ( self::$arrNeedAuth as $authPath) {
            if (!isset($_SESSION[_STR_LOGIN_ID]) && strpos($urlPath, $authPath) === 0 ) {
                header(_BASE_REDIRECT."/user/login");
                exit;
            }
        }
    }
}
