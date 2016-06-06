<DOCTYPE html>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
  <title>login</title>
</head>
<body>
  <h1>ログイン画面</h1>

  <form action="board.php" method="get">
<input type="text" name="name">
<input type="submit"  value="ログイン">
</form>

  <?php
  if(isset($_GET['name'])){
  $_val = $_GET['name'];
  echo $_val;
  }

 ?>






</body>
</html>
