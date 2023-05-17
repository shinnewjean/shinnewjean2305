<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="/application/view/css/common.css">
	<!-- Bootstrap CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<h1>shinnewjeanLogin</h1>
	<h3 style="color: red;"><?PHP echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
	<form action="/user/login" method="post">
		<label for="id">ID</label>
		<input type="text" name="id" id="id">
		<label for="pw">PW</label>
		<input type="text" name="pw" id="pw">
		<button type="submit">Login</button>
	</form>
	<a href="/user/main">list</a>
	<a href="/user/regist">회원가입</a>


	<!-- Bootstrap JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>