<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> 掲示板</title>
</head>
  <?php
  $name = $_POST['name'];
  $time = $_POST['name'];

  $sql = "SELECT name,time FROM DB
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
  }

</body>
    </html>
