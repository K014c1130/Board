<DOCTYPE html>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
  <title>login</title>
</head>
<body>
  
<?php
try{
  if(isset($_GET['login'])){
  $dsn = 'mysql:dbname=board;host=localhost';
  $user = 'root';
  $password ='';

  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');

  $sql = 'SELECT name FROM list WHERE name=? AND pass=?';
  $stmt = $dbh->prepare($sql);
  $data[] = htmlspecialchars($_GET['name']);
  $data[] = htmlspecialchars($_GET['pass']);
  $stmt -> execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  $dbh = null;

}

?>

<form action="login.php" method="get">
<?php print '　 　名前：'; ?>
<input type="text" name="name"><br>
<br>
<?php print 'パスワード：'; ?>
<input type="text" name="pass">
<input type="submit" name="login" value="ログイン">
<br>
  <?php if(isset($_GET['login'])){
if($_GET['name']=="" OR $_GET['pass']==""){
  print '名前もしくはパスワードが入力されていません。';
}else if($rec==false){
  print '名前かパスワードが間違っています。';
}
}
?>

</form>

<?php
if(isset($_GET['login'])){
 if($rec==true){
  header("Location:board.php?name=".$_GET['name'].'"');
}
}
?>
<?php }catch(Exception $e){
  print 'エラー';
  exit();
}
?>
</body>
</html>
