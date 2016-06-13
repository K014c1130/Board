<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>新規会員登録</title>
</head>
<body>
  <p>必要事項をご記入ください</p>
  <form action="regist.php" method="post" enctype="multipart/form-data">
  <dl>
    <dt>ユーザー名<font color="red">　必須</font></dt>
    <dd>
      <input type="text" name="name" size="35" maxlength="255">
    </dd>
    <dt>パスワード<font color="red">　必須</font></dt>
    <dd>
      <input type="password" name="pass" size="10" maxlength="20">
    </dd>
  </dl>
  <div><input type="submit" value="入力内容を確認"></div>
  </form>
</body>
</html>
