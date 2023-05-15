<?php

namespace application\controller;

use application\util\UrlUtil;

// Controller class를 상속받음
class ShopController extends Controller {

    public function mainGet() {
        return "main"._EXTENSION_PHP;
    }

}

?>