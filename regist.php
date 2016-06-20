<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>新規会員登録</title>
</head>
<body>
  <form action="resist.php" method="post">
  <dl>
    <dt>ユーザー名</dt>
    <dd>
      <?php echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
      print' <input type ="hidden" name="name" value ='.$_POST['name'].' >';
      print' <input type ="hidden" name="pass" value ='.$_POST['pass'].' >';
       ?>
    </dd>
    <dt>パスワード</dt>
    <dd>
      【表示されません】
    </dd>
  </dl>
  <div><a href="shinki.php?action=rewrite">&laquo;&nbsp;書き直す</a>
  <input type="submit" value="登録する"></div>
  </form>
</body>
</html>
