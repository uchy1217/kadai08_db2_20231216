<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function db_conn(){
    try {
            $db_name = 'gs_db3_book'; //データベース名
            $db_id   = 'root'; //アカウント名
            $db_pw   = ''; //パスワード：MAMPは'root'
            $db_host = 'localhost'; //DBホスト
            return $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        } catch (PDOException $e) {
            exit('DB Connection Error:' . $e->getMessage());
        }
}

function redirect($file_name)
{   
    header("Location: $file_name");
    exit();
}


//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。


//SQLエラー関数：sql_error($stmt)


//リダイレクト関数: redirect($file_name)
