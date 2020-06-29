<?php
$dsn = 'pgsql:dbname=TEST;host=skillup-php-step1_pgsql_1;port=5432';
$user = 'postgres';
$pass = 'example';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する
  // prepareメソッド(SELECT)
  $sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');

  // prepareメソッド(INSERT)
  $sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>

<?php
  $name = "John";
  $sth_select->execute(array($name));
  $prepare_result = $sth_select->fetchAll();
  foreach($prepare_result as $row) {
    print $row["name"] . ": " . $row["text"] . "<br/>";
  }
  $sth_select->execute(array($name));
?>

<?php
  $name = "John";
  $text = "Power to the People";
  $sth->execute(array($name, $text));
?>
