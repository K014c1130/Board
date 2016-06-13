<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> 掲示板</title>
</head>
<body>

<?php
try{
  $dsn = 'mysql:dbname=board;host=localhost;charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');
?>
  <div align="right">
    <a href="login.php">ログアウト</a>
  </div>
  <br>
  <?php
    $username = htmlspecialchars($_GET['name']);
    print $username;
  ?>
  さん<br>

  <form method="get" action="board.php">
    <input type="text" name="sentence">
    <input type="hidden" name="name" value="<?php print $username ?>">
    <input type="submit" value="add">
  </form>

  <?php
    if(isset($_GET['sentence'])) {

      $sql = 'INSERT INTO list(massage) VALUES (?)';
      $stmt = $dbh->prepare($sql);
      $data[] = $_GET['sentence'];
      $stmt-> execute($data);
    }


  $sql = "SELECT name,ts,td,massage FROM list
          ORDER BY td DESC,ts DESC";
  $stmt = $dbh->prepare($sql);
  $stmt -> execute();

  while(true){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false){
      $dbh = null;
      break;
    }
    print $rec['name'];
    print "  ";
    print $rec['td'];
    print " ";
    print $rec['ts'];

    print '<input type = "submmit" name="delete" value="delete">';
    print '<br />';
    print $rec['massage'];
  }
}catch(Exception $e){
  print 'ただいまデータベースに接続できません';
  exit();
}
?>
</body>
    </html>
