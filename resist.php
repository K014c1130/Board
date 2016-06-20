<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
</head>
<body>

<?php

try{

   $username = htmlspecialchars($_POST['name']);
   $password = htmlspecialchars($_POST['pass']);
   echo "user:" . $username;
   echo "pass:" . $password;

  $dsn = 'mysql:dbname=board;host=localhost;charset=utf8';
  $user = 'root';
  $pass = '';
  $dbh = new PDO($dsn, $user, $pass);
  $dbh->query('SET NAMES utf8');

  $sql = 'INSERT INTO list(name,pass) VALUES(?,?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $username;
  $data[] = $password;
  $stmt-> execute($data);
  $dbh = null;

  print '登録完了しました。';
  ?>

  <a href="login.php">戻る</a>
  <?php

}catch(Exception $e){
  print 'ただいまデータベースに接続できません';
  exit();
}
?>

</body>
    </html>
