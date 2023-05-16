<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regist</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
	<!-- Bootstrap CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h1>회원가입</h1>
    <br>
    <br>

    <!-- if 로 작성 -->
    <? if(isset($this->errMsg)) { // 230516_add ?>
        <div><span><? echo $this->errMsg ?></span></div>
    <? } ?>
    
    <!-- 삼항연산자로 작성 -->
    <!-- <div></div> -->

    <form action="/user/regist" method="POST">
        <label for="id">ID</label>
		<input type="text" name="id" id="id">
        <button type="button" onclick="chkDuplicationID();">중복체크</button>
        <span id="errMsgId">
        <? if (isset($this -> arrError["id"])){echo $this -> arrError["id"];} ?>
        </span>
        <br>
		<label for="pw">PW</label>
        <input type="text" name="pw" id="pw">
        <span>
        <? if (isset($this -> arrError["pw"])) { echo $this -> arrError["pw"];  } ?>
        </span>
        <br>
        <label for="pwChk">PW Check</label>
        <input type="text" name="pwChk" id="pwChk">
        <span>
        <? if (isset($this -> arrError["pwChk"])) {echo $this -> arrError["pwChk"];} ?>
        </span>
        <br>
		<label for="name">name</label>
		<input type="text" name="name" id="name">
        <span>
        <? if (isset($this -> arrError["name"])) { echo $this -> arrError["name"]; } ?>
        </span>
        <br>
		<button type="submit">regist</button>
        <a href="/user/main">취소</a> <!-- 메인으로 돌아가기 -->
    </form>
    <script src = "/application/view/js/common.js"></script>
</body>
</html>