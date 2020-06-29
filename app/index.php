<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>POSTのサンプル</title>
  </head>
  <body>
    <?php
      //commentがPOSTされているなら
      if(isset($_POST["name"]) && isset($_POST["comment"])){
        //エスケープしてから表示
        $name = htmlspecialchars($_POST["name"]);
        $comment = htmlspecialchars($_POST["comment"]);
        print("あなたの名前は「 ${name} 」で、");
        print("あなたのコメントは「 ${comment} 」です。");
      } else {
    ?>
        <form method="POST" action="index.php">
          <p>名前を入力してください。</p>
          <input name="name"" />
          <br><br>

          <p>コメントしてください。</p>
          <input name="comment" />
          <br><br>

          <input type="submit" value="送信" />
        </form>
    <?php } ?>
  </body>
</html>