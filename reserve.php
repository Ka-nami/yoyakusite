<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>粧</title>
    <link rel="stylesheet" href="css/yoyaku.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
</head>
<body>
    <h1>ご予約ありがとうございます。</h1>
    <h1>翌日メールさせていただきます。</h1>

    <a href="./index.html"><h1>戻る</h1></a>

<?php 
function h ($val){
    return htmlspecialchars($val,ENT_QUOTES);
}

// POSTで入力フォームのデータ取得
$name = $_POST["name"];
$kname = $_POST["kname"];
$mail = $_POST["mail"];
$hiduke = $_POST["hiduke"];
if (isset($_POST["item"]) && is_array($_POST['item'])) 
    {
        $pref = implode("と", $_POST["item"]);
    }

// DB接続
    try {
        //Password:MAMP='root',XAMPP=''
        $pdo = new PDO('mysql:dbname=ka-nami_unit01;charset=utf8;host=mysql57.ka-nami.sakura.ne.jp','ka-nami','I151768k');
        } catch (PDOException $e) {
        exit('DB_CONECTION:'.$e->getMessage());
        }

// データ登録
$sql = "INSERT INTO gs_ssdb_table(name,kname,mail,naiyou,hiduke)VALUES(:name,:kname,:mail,:naiyou,:hiduke);
";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kname',  $kname,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mail',   $mail,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $pref, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':hiduke', $hiduke, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

// データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL Error:".$error[2]);
    }



?>
</body>
</html>