<DOCTYPE html>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
  <title>login</title>
</head>
<body>
  <h1>掲示板(工事中)</h1>
こんにちは、
  <?php
print htmlspecialchars($_GET['name'],ENT_QUOTES, 'UTF-8');
  ?>
さん！
この掲示板はまだできてないです。
  <form action="login.php" method="get">
<input type="submit"  value="戻る">
</form>

</body>
</html>
