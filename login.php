<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="./css/login.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<div class="wrapper">
<header>
  <nav class="navbar navbar-default">ログイン</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<div class="flexWrapper">
<form name="form1" action="login_act.php" method="post">
ID<input type="text" name="lid">
パスワード<input type="password" name="lpw">
<input type="submit" value="ログイン" class="logonBtn">
</form>
</div>

</div>



</body>
</html>