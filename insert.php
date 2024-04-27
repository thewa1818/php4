<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$naiyou = $_POST["naiyou"];
$age    = $_POST["age"]; //追加されています



//2. DB接続します
include("funcs.php");
$pdo = db_conn();

$tempfile = $_FILES['fname']['tmp_name'];
$filename = $_FILES['fname']['name'];

if (is_uploaded_file($tempfile)) {

    if ( move_uploaded_file($tempfile , $filename )) {
        echo $filename."をアップロードしました。";
        echo '<img src="';
        echo $filename;
        echo '">';
    } else {
        echo "ファイルをアップロードできません。";
    }
} else {
    echo "ファイルが選択されていません。";
} 

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,filename,naiyou,indate)VALUES(:name,:email,:age,:filename,:naiyou,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':filename', $filename, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
?>
