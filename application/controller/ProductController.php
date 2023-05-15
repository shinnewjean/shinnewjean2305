<?php
// 로그인은 겟방식 포스트방식 모두 이용합니다.
namespace application\controller;

use application\util\UrlUtil;

// Controller class를 상속받음
class ProductController extends Controller {

    public function listGet() {
        return "list"._EXTENSION_PHP;
    }
}
?>