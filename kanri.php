<?php
session_start();

// DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=ka-nami_unit01;charset=utf8;host=mysql57.ka-nami.sakura.ne.jp','ka-nami','I151768k');
    } catch (PDOException $e) {
    exit('DB_CONECTION:'.$e->getMessage());
    }

// データ登録SQL作成
$sql = "SELECT * FROM gs_ssdb_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ表示
$values = "";
if($status==false) {
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/kanri.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <title>予約一覧</title>
</head>
<body>

<div>
    <div>
        <h1>予約一覧</h1>
    </div>
</div>

<div>
    <div class="container jumbotron">
        <table style="border: 1px solid #bfbfbf;">
            <?php foreach($values as $v){ ?>
            <tr>
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
            <td><?=$v["id"]?></td>
            <td><?=$v["kname"]?><br><?=$v["name"]?></td>
            <td><?=$v["mail"]?><br><?=$v["naiyou"]?></td>
            <td><a href="detail.php?id=<?=$v["id"]?>"></a></td>
            <td><?=$v["hiduke"]?></td>
            <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<div>
    <div>
        <a href="./logout.php">ログアウト</a>
    </div>
</div>

</body>
</html>