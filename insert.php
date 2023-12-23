<?php

//1. POSTデータ取得
$name   = $_POST['name'];
$url  = $_POST['url'];
$content = $_POST['content'];

//2. DB接続します
//*** function化する！  *****************

require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO
                        gs_an_table(
                            name, url, content, indate
                            )
                        VALUES (
                            :name, :url, :content, sysdate()
                            );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('index.php');
}
