<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

        <!-- nav bar 의 머리부분으로 주류창고의 주인을 나타내는 부분 -->
        <a class="nav-link" href="#">
            <? echo isset($_SESSION[_STR_LOGIN_ID]) ? $_SESSION[_STR_LOGIN_ID]."회원님의" : "(방문자)님의" ?> <!-- view에서 $_SESSION 사용시 보안에 취약함 -->
        </a>
        <a class="navbar-brand" href="#"><img src="/application/view/img/maintitle.png" style="width:100px; height:auto;" /></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- nav부분 -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Business</a></li>
                <!-- Business introduction -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Alcohol
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">소주</a></li>
                        <li><a class="dropdown-item" href="#">맥주</a></li>
                        <li><a class="dropdown-item" href="#">막걸리</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
            </ul>

        <!-- search부분 -->
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        <!-- 로그인 로그아웃 버튼_if 사용 -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <?php echo isset($_SESSION[_STR_LOGIN_ID]) ? "<a class='nav-link' href='/user/logout'>Logout</a>" : "<a class='nav-link' href='/user/login'>Login</a>" ?>
                </li>
                <!-- <li class="nav-item"><a class="nav-link" href="/user/login">Login</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="/user/logout">Logout</a></li> -->
                <!-- <li class="nav-item"><button id="logout" onclick="redirectLogout();">Logout</button></li> -->
            </ul>
        </div>
    </div>  
</nav>