<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();


//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM gs_an_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);


//画像の設定
try{
  if(is_uploaded_file($_FILES['file']['tmp_name'])){
          move_uploaded_file($_FILES['file']['tmp_name'], './img/'.$_FILES['file']['name']);
  }
}catch(Exception $e) {
  echo 'エラー:', $e->getMessage().PHP_EOL;
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link href="css/reset.css" rel="stylesheet">
<link href="css/select.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <?=$_SESSION["name"]?>さん、ようこそ！
        <div class="header-item">      <a class="navbar-brand" href="index.php">登録する</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a></div>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->


<div class="wrapper">

      <?php foreach($values as $v){ ?>

        <div class="flexItem">
        <div class="image"><img src="<?= 'img/' . h($v["filename"]) ?>"></div>
          <h2 class="namme-item"><?=$v["name"]?></a></h2>
          <div class="itemWrapper">
          <p class="item">築年数：<?=$v["age"]?>年</p>
          <p class="item">説明：<?=$v["naiyou"]?></p>
          <p class="item">問い合わせ先：<?=$v["email"]?></p></div>


          <?php if($_SESSION ["kanri_flg"]=="1"){?>
            <div class="btnWrapper">            
              <div class="btn"><a href="detail.php?id=<?=$v["id"]?>">編集</a></div>
          <div class="btn"><a href="delete.php?id=<?=$v["id"]?>">削除</a></div>
        </div>
          <?php } ?>
        </div>
      <?php } ?>
      </div>


<!-- Main[End] -->


<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
