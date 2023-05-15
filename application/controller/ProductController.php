<?php
namespace application\controller;
// 로그인은 겟방식 포스트방식 모두 이용합니다.

class ProductController extends Controller{
    public function listGet(){
        return "list"._EXTENSTION_PHP;
    }
}