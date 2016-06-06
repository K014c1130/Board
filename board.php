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
