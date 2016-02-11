<?php
session_start();
require('../dbconnect.php');


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

	    <!--ヘッダーフッターファイルより-->
	    <link rel="stylesheet" type="text/css" href="headfoot.css">

	    <!-- ログイン・登録画面ページ専用css -->
 		<link href="assets/css/user_touroku.css" rel="stylesheet">

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
	    
	    <script src="assets/js/modernizr.custom.js"></script>

	    <!--ヘッダーフッターファイルより-->
	    <script type="text/javascript" src="headfoot.js"></script>
	    <script>
	        function init() {
	            window.addEventListener('scroll', function(e){
	                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
	                    shrinkOn = 0,
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
	<div id="wrapper">

	    <header>
	        <div class="container clearfix">
	            <h1 id="logo">
                     <span style="font-family: 'Rock Salt', cursive;">Rebro</span>
                	<i class="fa fa-book fa-1x"></i>
                </h1>
	            <!-- <i class="fa fa-book fa-1x"></i>      -->
	            <nav>
	                <!-- <a href="">Lorem</a> -->
	                <!-- 消えたnavタグ大事件... -->
	                <!-- <a href="">ユーザー名</a> 
	                <a href="logout.php">Log In</a> -->
	                <!-- <span style="font-family: 'Rock Salt', cursive;"><a href="login.php">Logout</a></span> -->
	            </nav>
	        </div>
	    </header><!-- /header -->
	
		<!-- ヘッダー分のスペースを空ける用 -->
	    <div id= "top_space"></div>

		<div id="check_space">
			以下のアドレスにパスワード再設定用ページのリンクを送りました。<br />
			<form action="" method="post">
				<input type="hidden" name="action" value="submit" />
					
					<dl>	
						<dd>
						<?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES,'UTF-8'); ?>
						</dd>
						<br />
					</dl><br />
				<div><input type="submit" value="Back" class="btn-success btn-sm"/></div>
			</form>

		</div><!-- #check_space -->

		<footer>
				<div style="margin-top:70px;">

			<div id="info-bar">
			    <div class="container">
			    	<div class="row">
			        <div class="col-lg-3">
			            <span class="all-tutorials"><a href="">← TOP</a></span>
			        </div>


			        <div class="col-lg-3">
			        	<div style="vertical-align:middle;">
			            <ul>
			                <h3>REBROについて</h3>
			                <p>プライバシーポリシー</p>
			                <p>環境保護活動</p>
			            </ul>
			        	</div>
			        </div>
			       
			       <div class="col-lg-3">
			            <ul>
			                <h3>REBROを使う</h3>
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
	</div><!--wrapper-->

	
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
