<?php
require 'password.php';   // password_verfy()はphp 5.5.0以降の関数のため、バージョンが古くて使えない場合に使用
// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "root";  // ユーザー名
$db['pass'] = "root";  // ユーザー名のパスワード
$db['dbname'] = "loginManagement";  // データベース名

// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["userid"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
        // 入力したユーザIDを格納
        $userid = $_POST["userid"];

        // 2. ユーザIDとパスワードが入力されていたら認証する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 3. エラー処理
        try {
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare('SELECT * FROM userData WHERE id = ?');
            $stmt->execute(array($userid));

            $password = $_POST["password"];

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true);

                    // 入力したIDのユーザー名を取得
                    $id = $row['id'];
                    $sql = "SELECT * FROM userData WHERE id = $id";  //入力したIDからユーザー名を取得
                    $stmt = $pdo->query($sql);
                    foreach ($stmt as $row) {
                        $row['name'];  // ユーザー名
                    }
                    $_SESSION["NAME"] = $row['name'];
                    header("Location: Main.php");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                // 該当データなし
                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            //$errorMessage = $sql;
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div>
    <form id="loginForm" name="loginForm" action="" method="POST" class="form-signin">
      <img class="mb-4" src="../img/home_icons/student2.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
      <label for="inputEmail" class="sr-only">ID</label>
      <input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" class="form-control" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" value="" placeholder="パスワードを入力" class="form-control" required autofocus>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button id="login" name="login" value="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <p>If you don't have an acount yet, Create here.</p>
    <form action="SignUp.php"class="form-signin">
      <button class="btn btn-lg btn-primary btn-block" action="SignUp.php" type="submit" value="sign up">Sign up</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </div>
  </body>
</html>
