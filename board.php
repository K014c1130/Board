<<<<<<< HEAD
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
    $dsn = 'mysql:dbname=board;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    $sql = 'INSERT INTO list(item) VALUES (?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_GET['sentence'];
    $stmt-> execute($data);
  }
?>

<form method="get" action="board.php">
=======
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> 掲示板</title>
</head>
<body>

  <?php
  $name = $_POST['name'];
  $time = $_POST['time'];
  $message = $_POST['massage'];

  $sql = "SELECT name,time FROM list
          ORDER BY time DESC"
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
    print $rec['time'];
  ?>
    <input type = "submmit" name="delete" value="delete">
    <?php print "<br />" ?>
    <?php print $rec['message']; ?>
  }

</body>
    </html>
>>>>>>> b79e299a5326e6c1cd002b7efe80b3f099900674
