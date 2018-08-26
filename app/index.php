<?php
try {
  // DBに接続する
  $dbh = new PDO('mysql:host=mysql;dbname=test', 'root', 'password');

  // ここでクエリ実行する
  // queryメソッド(SELECT)
  $query_result = $dbh->query('SELECT * FROM test_comments');
  // prepareメソッド(INSERT)
  $sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');
  // prepareメソッド(SELECT)
  $sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
  // 接続にエラーが発生した場合ここに入る
  print "DB ERROR: " . $e->getMessage() . "<br/>";
  die();
}
?>

======== queryメソッドを使用したSELECTの例 ========<br/>
<?php
  foreach($query_result as $row) {
    print $row["name"] . ": " . $row["text"] . "<br/>";
  }
?>
<br/>

======== prepareメソッドを使用したINSERTの例 ========<br/>
<?php
  $name = "John";
  $text = "All You Need Is Love!";
  print "name:" . $name . ", text:" . $text . "で登録<br/>";
  $sth->execute(array($name, $text));
?>
<br/>

======== prepareメソッドを使用したSELECTの例 ========<br/>
<?php
  print $name . "の投稿を絞り込んで表示！<br/>";
  $sth_select->execute(array($name));
  $prepare_result = $sth_select->fetchAll();
  foreach($prepare_result as $row) {
    print $row["name"] . ": " . $row["text"] . "<br/>";
  }
?>
<br/>
