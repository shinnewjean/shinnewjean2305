<?
// CONFIG 가져오는 쿼리는?
include_once( URL_DB ); // DATABASE가져옴 _lib/config에 상수 설정 되어있음

$result_product_info_all = product_info_all(); //product_info를 가져오는 변수
// var_dump($result_product_info_all);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
	<!-- Bootstrap CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="mainHeader">
    <? 
    include_once ( URL_HEADER ); // HEADER가져옴 _lib/config에 상수 설정 되어있음
    ?>
</div>

<!-- 전체 사이즈 조절 -->
<div class="mainCon">
<div class="container">
    <div class="row g-4">
    <?php
        foreach ( $result_product_info_all as $val ) {        // $result_product_info_all = product_info_all() 의 배열값을 $val로 가져와서 배열값만큼 돌림
    ?>
        <div class="col">
            <div class="card h-100" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?
                            if ($val['Pdt_name'] === '0' ) {
                                echo 'null';
                            } else {
                                echo $val['Pdt_name'];
                            }
                        ?>
                    </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    <? } ?>
</div>
</div> <!-- mainCon End -->

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>