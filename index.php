
<?php




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
        <meta charset="UTF-8">
        <title>データ登録</title>
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <style>div{padding: 10px;font-size:16px;}</style>
    </head>
    <body>

        <!-- Head[Start] -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"><a class="navbar-brand" href="select.php">登録する</a></div>
                </div>
            </nav>
        </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <div class="jumbotron">

                    <label>名前：<input type="text" name="name"></label><br>
                    <label>Email：<input type="text" name="email"></label><br>
                    <label>築年数：<input type="text" name="age"></label><br>
                    <label>画像：<input type="file" name="fname"></label><br>
                    <label><textArea name="naiyou" rows="4" cols="40" placeholder="簡単な説明を記入してください"></textArea></label><br>
                    <input type="submit" value="登録" class="sbmitButton">
                    <p class="toroku"><a href="select.php">登録画面はこちら</a></p>
            </div>
        </form>
        <!-- Main[End] -->


    </body>
</html>
