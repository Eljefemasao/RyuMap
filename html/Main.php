<?php
session_start();

//ログイン状態チェック
if (!isset($_SESSION["NAME"])){
  header("Location: Logout.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href='#' <input onclick="location.href='https://www.google.co.jp/maps/place/%E5%9B%BD%E7%AB%8B%E7%90%89%E7%90%83%E5%A4%A7%E5%AD%A6/@26.2492546,127.7644446,17.1z/data=!4m5!3m4!1s0x0:0x7fe14ca3ed543577!8m2!3d26.247582!4d127.7651435'">
            <img alt="Brand" src="../img/home_icons/earth.png" style="height: 20px;">
          </a>
          <a class="navbar-brand" href="button"  >
				<img alt="Brand" src="../img/home_icons/button.png" style="height: 20px;" "left: 1000px;">
			</a>
            <a class="navbar-brand" href="javascript:location.reload();"> RyuMap</a>
      </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" >
            <div class="form-group">
              <input type="text" placeholder="いきたい教室を検索" class="form-control">
            </div>
                       <a type="submit" class="btn btn-success" href='#' <input onclick="location.href='room.html' ">Search</a>
            </div>

      </form>

      </div>
    </nav>
    <div>
     <img src="../img/home_icons/Top.jpg">
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h2>Hi <u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?> !</u></h2>
        <h1>Welcome to University of the Ryukyus</h1>
        <p>Are you really enjoying campus life ?</p>
        <p>This is an amaizing web application for University of the Ryukyus students which allows user to grab some usefull information. Find your classroom's location and syllabus, and...so on.
          I belive that including a bunch of helpful infomation for a freshperson, espaceally. Just enjoy !
          </p>

        <p>
        <!--
        新しいタブでリンク先が開く 検索窓にて
        <input type="btn btn-primary btn-lg" value="リンク" onClick="window.open('http://www.u-ryukyu.ac.jp/univ_info/campus_map.html')">
        ボタンにて
        <input type="button" onclick="location.href='http://www.apple.com/'"value="リンク文字">
        -->
      </a>
      <a class="btn btn-primary btn-lg" href="Logout.php" role="button" <input onclick="location.href='map.html' ">
      Log out
      </a>
        <a class="btn btn-primary btn-lg" href="#" role="button" <input onclick="location.href='map.html' ">
        Check Map
        </a>
        </p>
      </div>
    </div>

     <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>入学希望者</h2>
          <img src="../img/home_icons/student.png" style="height: 100px;">
           <p><a class="btn btn-default" href="http://www.u-ryukyu.ac.jp/tmp/kousiki_target/henter.html" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>在学生</h2>
          <img src="../img/home_icons/student2.png"style="height: 100px;">
          <p><a class="btn btn-default" href="http://rais.std.u-ryukyu.ac.jp/dc/">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>図書館</h2>
         <img src="../img/home_icons/library.png"style="height: 100px;">
          <p><a class="btn btn-default" href="http://www.lib.u-ryukyu.ac.jp/?page_id=922" role="button">View details &raquo;</a></p>
        </div>
      <div class="col-md-4">
          <h2>学生生協</h2>
         <img src="../img/home_icons/food.png"style="height: 100px;">
          <p><a class="btn btn-default" href="http://kyushu.seikyou.ne.jp/ryudai-coop/service/ontime17_spring.html" role="button">View details &raquo;</a></p>
        </div>
      <div class="col-md-4">
          <h2>ATM</h2>
         <img src="../img/home_icons/ATM.png"style="height: 100px;">
          <p><a class="btn btn-default" href="ATM_map.png" role="button">View details &raquo;</a></p>
        </div>
      <div class="col-md-4">
          <h2>LAWSON</h2>
         <img src="../img/home_icons/lawson.png"style="height: 100px;">
          <p><a class="btn btn-default" href="./Lawson_map.png" role="button">View details &raquo;</a></p>
        </div>



      </div>

      <hr>


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">

   </div>

    <hr>

      <footer>
        <p>&copy; 2018 RyuMap, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
