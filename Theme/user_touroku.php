<?php
require('../dbconnect.php');
session_start();


// 変数が入力されてない(POST送信されていない)エラーが出た時、session_start後に以下3行を入れると回避できる。
$email = ''; 
$password = ''; 
$error = array('email'=>'','password'=>'');

$action = '';

if (!empty($_POST)) {
 // エラー項目の確認 !をつけることで逆の意味になり、正常に入力された時にデータが渡されるようにしている。

	if ($_POST['email'] == ''){
		$error['email'] = 'blank';
	}
	if (strlen($_POST['password']) < 4) {
		$error['password'] = 'length';
		//strlen・・・文字列の長さ
	}
	if ($_POST['password'] == ''){
		$error['password'] = 'blank';
	}

	//重複アカウントのチェック
	if (empty($error)){
		$sql = sprintf('SELECT COUNT(*) AS cnt FROM users WHERE email ="%s"',
			mysqli_real_escape_string($db,$_POST['email']));
		//mysqli~はmysql専用 PDOと異なり、専用であるが、すっきりした構文をかけるのとmysqlを使っているのがすぐわかる
		//AS~は別名をつける WHERE emailは入力したメール %sはフォーマット文字列 %は置き換え 数字に置き換えたい時は %d
		//countで列数を数えているので、(*)の中身をidなどに置き換えてもあまり意味ない

		$record=mysqli_query($db,$sql) or die(mysqli_error($db));
		$table = mysqli_fetch_assoc($record);
		if ($table['cnt'] > 0){
			$error['email'] = 'duplicate';
		}
	}
		

		$_SESSION['join'] = $_POST;
		//画面遷移　checl.phpに移動する
		header('Location: user_check.php');
		exit();
}
//書き直し
// if ($_REQEST['action'] == 'rewrite') {
// 	$_POST = $_SESSION['join'];
// 	$error['rewrite'] = true;
// }
	


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

    <title>Libro</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/common.css" rel="stylesheet">

    <!--ヘッダーフッターファイルより-->
    <link rel="stylesheet" type="text/css" href="headfoot.css">

    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

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

	<!-- Menu -->
<!-- 	<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a href="index.html#home">LINK</a></h1>
			<i class="fa fa-arrow-right menu-close"></i>
			<a href="index.html">Home</a>
			<a href="services.html">Services</a>
			<a href="portfolio.html">Portfolio</a>
			<a href="about.html">About</a>
			<a href="#contact">Contact</a>
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-dribbble"></i></a>
			<a href="#"><i class="fa fa-envelope"></i></a>
		</div> -->
		
		<!-- Menu button -->
	<!-- 	<div id="menuToggle"><i class="fa fa-bars"></i></div>
	</nav>-->	
	<div id="wrapper">

	    <header>
	        <div class="container clearfix">
	            <h1 id="logo">
	                REBRO
	            </h1>
	            <i class="fa fa-book fa-4x"></i>     
	            <nav>
	                <!-- <a href="">Lorem</a> -->
	                <!-- 消えたnavタグ大事件... -->
	                <a href="">ユーザー名</a> 
	                <a href="logout.php">Log Out</a>
	            </nav>
	        </div>
	    </header><!-- /header -->


	    <div id="main">
			<!-- MAIN IMAGE SECTION -->
			<div id="aboutwrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<h2>Live smart<br/>
								さぁ、本を探しに行こう
							</h2>
						</div>
					</div><!-- row -->
				</div><!-- /container -->
			</div><!-- /aboutwrap -->

			<!-- CHART IMAGE SECTION -->
		    <div id="chartwrap">
			    <div class="container">
			    	<div class="col-lg-4"> 
			      	 	<div class="main"> 
			      	 		<h3>Please Log In, or <a href="#">Sign Up</a></h3>
							<div class="row"> 
								<a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a> 
								<a href="#" class="btn btn-lg btn-info btn-block">Google</a>
							</div><!-- row -->   	 
			      	 	</div><!-- main -->
			    	</div><!-- col-lg-4 -->

			    	<form class="login" action="" method="post" enctype="multipart/form-data">
			      		<div class="col-lg-8">
			          		<p class="form-title">
			                <font color="#000"> Sign In</font></p>
			                <!-- <form class="login"> -->
				                <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES,'UTF-8'); ?>"/>
				                <input type="password" name="password" placeholder="Password" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES,'UTF-8'); ?>" />
				                <div>
				                	<input type="submit" value="Sign In" class="btn btn-success btn-sm" />
				                </div>
				                <!-- <div class="remember-forgot"> -->
				                    <!-- <div class="row"> -->
										<!-- <div class="checkbox"> -->
											<!-- <label><input type="checkbox" />Remember Me</label> -->
										<!-- </div>checkbox -->
				                    <!-- </div> row --> 
				                <!-- </div>remember-forgot -->
			           		<!-- </form> --><!-- login -->
			            </div><!-- col-lg-8 -->
			        </form><!-- ここを消すと表示が変わる-cssチェック-class=login -->
		    	</div><!-- container -->
			</div><!-- chartwrap -->
		 

			<p class="pull-right"><br><button type="button" class="btn btn-green"><a href="kensaku.html">ログインする</a></button></p>

			<!-- SERVICES SECTION -->
			<div id="services">
				<div class="container">
					<div class="row mt">
						<!-- Srvice 1 -->
						<!-- <div class="col-lg-1 centered">
							<i class="fa fa-certificate"></i>
						</div>
						<div class="col-lg-3">
							<h3>Quality Design</h3>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div> -->

						<!-- Srvice 2 -->
						<!-- <div class="col-lg-1 centered">
							<i class="fa fa-question-circle"></i>
						</div>
						<div class="col-lg-3">
							<h3>Awesome Support</h3>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div> -->

						<!-- Srvice 3 -->
						<!-- <div class="col-lg-1 centered">
							<i class="fa fa-globe"></i>
						</div>
						<div class="col-lg-3">
							<h3>Global Services</h3>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div> -->
						
						<!-- Srvice 4 -->
						<!-- <div class="col-lg-1 centered">
							<i class="fa fa-desktop"></i>
						</div>
						<div class="col-lg-3">
							<h3>Responsive Design</h3>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div>
		 -->
						<!-- Srvice 5 -->
						<!-- <div class="col-lg-1 centered">
							<i class="fa fa-cog"></i>
						</div>
						<div class="col-lg-3">
							<h3>Easy Configuration</h3>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div> -->
					
						<!-- Srvice 6 -->
					<!-- 	<div class="col-lg-1 centered">
							<i class="fa fa-heart"></i>
						</div>
						<div class="col-lg-3">
							<h3>Crafted With Love</h3>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div> -->

					</div><!-- row -->
				</div><!-- container -->
			</div><!-- services section -->
			
			
			<!-- TEAM INTRODUCTION -->
			<div class="container">
				<div class="row mt">
					<div class="col-lg-8">
						<h1>特徴とか使い方アゲイン</h1>
					</div>
					使い回し可
					<div class="col-lg-4"></div>
				</div><!-- row mt-->
				<div class="row">
				<!-- 	<div class="col-lg-8">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
					</div> -->
					<div class="col-lg-3 col-lg-offset-1">
						<p><b>CORPORATE BRIEF</b></p>
						<p class="tm">Download the last information about our agency, our notable works, our team members, next projects & more.</p>
						<p class="tm"><a href="#"><i class="fa fa-link"></i> <b>Download PDF</b></a></p>	
					</div>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- #main -->

		
		
		ここいかはふったーにかわります
		<footer>
	        <div id="info-bar">
	            <div class="container clearfix">
	                <div class="col-md-3">
	                    <span class="all-tutorials"><a href="">← TOP</a></span>
	                </div>


	                <div class="col-md-3">
	                    <ul>
	                        <h2>REBROについて</h2>
	                        <p>プライバシーポリシー</p>
	                        <p>環境保護活動</p>
	                    </ul>
	                </div>
	               
	               <div class="col-md-3">
	                    <ul>
	                        <h2>REBROを使う</h2>
	                        <p>都道府県検索</p>
	                        <p>大学検索</p>
	                        <p>出品一覧</p>
	                    </ul>
	                </div>

	                <div class="col-md-3">
	                    <span class="footer-logo"><a href="">Created by <i class="fa fa-heart"></i> Team REBRO</a></span>
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
