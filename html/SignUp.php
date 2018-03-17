<?php
require 'password.php';   // password_hash()はphp 5.5.0以降の関数のため、バージョンが古くて使えない場合に使用
// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "root";  // ユーザー名
$db['pass'] = "root";  // ユーザー名のパスワード
$db['dbname'] = "loginManagement";  // データベース名

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["username"])) {  // 値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } else if (empty($_POST["password2"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
        // 入力したユーザIDとパスワードを格納
        $username = $_POST["username"];
        $password = $_POST["password"];
        // 2. ユーザIDとパスワードが入力されていたら認証する
       $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

       // 3. エラー処理
       try {
           $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

           $stmt = $pdo->prepare("INSERT INTO userData(name, password) VALUES (?, ?)");

           $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
           $userid = $pdo->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる

           $signUpMessage = '登録が完了しました。あなたの登録IDは '. $userid. ' です。パスワードは '. $password. ' です。';  // ログイン時に使用するIDとパスワード
       } catch (PDOException $e) {
           $errorMessage = 'データベースエラー';
           // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
           // echo $e->getMessage();
       }
   } else if($_POST["password"] != $_POST["password2"]) {
       $errorMessage = 'パスワードに誤りがあります。';
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

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
            <a class="navbar-brand" href="javascript:location.reload();"> RyuMap</a>
          </div>
          </form>

      </div>
    </nav>

      <div class="jumbotron">
        <h2>Welcom to RyuMap!</h2>
        <p>This is SignUp page.</p>
    </div>


  <body class="text-center">
    <div>
    <form id="loginForm" name="loginForm" action="" method="POST" class="form-signin">
      <img class="mb-4" src="../img/home_icons/student2.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Create your account</h1>
      <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
      <div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
      <label for="inputEmail" class="sr-only">ID</label>
      <input type="text" id="username" name="username" placeholder="ユーザー名を入力" class="form-control" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" value="" placeholder="パスワードを入力" class="form-control" required autofocus>
      <label for="password2"class="sr-only">password2(For double check)</label>
      <input type="password" id="password2" name="password2" value="" placeholder="パスワードを再入力"class="form-control" required autofocus>
      <br>
      <button id="signUp" class="btn btn-lg btn-primary btn-block" name="signUp" type="submit" value="SignUp">Create Account</button>
    </form>

    <form action="Login.php"class="form-signin">
      <button class="btn btn-lg btn-primary btn-block" action="Login.php" type="submit" value="back">Sign In</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </div>
</body>
</body>
</html>
