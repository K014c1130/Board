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
  さん<br />

  <form method="get" action="board.php">
    <input type="text" name="sentence">
    <input type="hidden" name="name" value="<?php print $username ?>">
    <input type="submit" value="add">
  </form>

  <?php
    if(isset($_GET['sentence'])) {

      $sql = 'INSERT INTO messagelist(name,massage) VALUES (?,?)';
      $stmt = $dbh->prepare($sql);
      $data[] = $username;
      $data[] = $_GET['sentence'];
      $stmt-> execute($data);
    }

    if(isset($_GET['delete'])) {

      $sql = 'DELETE FROM messagelist WHERE id = ?';
      $stmt = $dbh->prepare($sql);
      $data[] = $_GET['id'];
      $stmt-> execute($data);
    }


  $sql = "SELECT id,name,ts,dt,massage FROM messagelist
          ORDER BY dt DESC,ts DESC";
  $stmt = $dbh->prepare($sql);
  $stmt -> execute();
  $dbh = null;

  while(true){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false){
      break;
    }
    print '<form method = "get" action="board.php">';
    print $rec['name'];
    print "  ";
    print $rec['dt'];
    print " ";
    print $rec['ts'];
    print '<input type = "hidden" name="id" value="'.$rec["id"].'">';
    print '<input type = "hidden" name="name" value="'.$username.'">';
    print '<input type = "submit" name="delete" value="delete">';
    print '<br />';
    print $rec['massage'];
    print '<br /> <br />';
    print '</form>';
  }
}catch(Exception $e){
  print 'ただいまデータベースに接続できません';
  exit();
}
?>
</body>
    </html>
