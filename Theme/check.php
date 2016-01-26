<?php

date_default_timezone_set('Asia/Tokyo');
session_start();
require('../dbconnect.php');


if(!isset($_SESSION['join'])){
	header('Location: sell.php');
	exit();
}
if (!empty($_POST)){
	//事後処理をする
	$sql = sprintf('INSERT INTO books SET title="%s", picture="%s", description="%s",price="%s",created="%s"',
		mysqli_real_escape_string($db, $_SESSION['join']['name']),
		mysqli_real_escape_string($db, $_SESSION['join']['image']),
		mysqli_real_escape_string($db, $_SESSION['join']['description']),
		mysqli_real_escape_string($db, $_SESSION['join']['price']),
		date('Y-m-d H:i:s')
		);
	mysqli_query($db, $sql) or die(mysqli_error($db));
	unset($_SESSION['join']);

	header('Location: thanks.php');
	exit();
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">



    <title>Rebro</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/common.css" rel="stylesheet">

    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.custom.js"></script>
    <script src="assets/js/login.js"></script>

     <script>
            function init() {
                window.addEventListener('scroll', function(e){
                    var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                        shrinkOn = 300,
                        header = document.querySelector("header");
                    if (distanceY > shrinkOn) {
                        classie.add(header,"smaller");
                    } else {
                        if (classie.has(header,"smaller")) {
                            classie.remove(header,"smaller");
                        }
                    }
                });
            }
            window.onload = init();
        </script>
    
  </head>

  <body>

  	<header>
            <div class="container clearfix">
                <h1 id="logo">
                    Rebro
                </h1>
                <i class="fa fa-book fa-4x"></i>     
                <nav>
                    <!-- <a href="">Lorem</a> -->
                    <!-- 消えたnavタグ大事件... -->
                   
                    <a href="">Logout</a>
                </nav>
            </div>
        </header><!-- /header -->


	
 <!-- MAIN IMAGE SECTION -->
	<div id="aboutwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<h2>Live smart<br/>
						出品してみよう
					</h2>
				</div>
			</div><!-- row -->
		</div><!-- /container -->
	</div><!-- /aboutwrap -->

	<!-- CHART IMAGE SECTION -->

	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>


<div id="content">
<p>記入した内容を確認して、「出品する」ボタンをクリックしてください</p>
<form action="check.php" method="post">
	<input type="hidden" name="action" value="submit" />
	<dl>
		<dt>タイトル</dt>
		<dd>
			<?php echo htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES, 'UTF-8');?>
		</dd>
		<dt>価格</dt>
		<dd>
			<?php echo htmlspecialchars($_SESSION['join']['price'],ENT_QUOTES, 'UTF-8');?>
		</dd>
		<dt>詳細</dt>
		<dd>
			<?php echo htmlspecialchars($_SESSION['join']['description'],ENT_QUOTES, 'UTF-8');?>
		</dd>
		<dt>写真など</dt>
		<dd>
		<img src="../textbook_picture/<?php echo htmlspecialchars($_SESSION['join']['image'], ENT_QUOTES, 'UTF-8'); ?>"
		 width="100" height="100" alt="" />
		</dd>
		</dl>
		<div><a href="sell.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="出品する" /></div>
</form>
</div>
 <footer>
        <div id="info-bar">
            <div class="container">
            	<div class="row">
                <div class="col-lg-3">
                    <span class="all-tutorials"><a href="">← TOP</a></span>
                </div>


                <div class="col-lg-3">
                    <ul>
                        <h2>REBROについて</h2>
                        <p>プライバシーポリシー</p>
                        <p>環境保護活動</p>
                    </ul>
                </div>
               
               <div class="col-lg-3">
                    <ul>
                        <h2>REBROを使う</h2>
                        <p>都道府県検索</p>
                        <p>大学検索</p>
                        <p>出品一覧</p>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <span class="footer-logo"><a href="">Created by <i class="fa fa-heart"></i> Team REBRO</a></span>
                </div>
            </div>
            </div>
        </div><!-- /#top-bar -->
        </footer><!-- /footer -->


	<!--これ以下は消さないこと!

     Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/classie.js"></script>
  </body>
</html>

