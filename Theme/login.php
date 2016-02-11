<?php
require('../dbconnect.php');
session_start();

//クッキーの存在確認
if(isset($_COOKIE['email'])){
	//クッキーが空でない場合に次のコードと合わせてichiranページに飛ぶ
	if ($_COOKIE['email'] !='') {
		$_POST['email'] = $_COOKIE['email'];
		$_POST['password'] = $_COOKIE['password'];
		$_POST['save'] = 'on';
	}
}
//$_COOKIEが空じゃなかったら

if (!empty($_POST)) {
	//ログイン処理
	if ($_POST['email'] != '' && $_POST['password'] !='') {

		//sprintf( フォーマット [, 引数１] [, 引数２]･・・):指定したフォーマットにしたがって整形した文字列を返す。
		// mysqli_real_escape_string：PHPからMySQLにデータを登録するときに、MySQLで使用する特殊文字をエスケープする方法
		$sql = sprintf('SELECT * FROM users WHERE email="%s" AND password="%s"',
			mysqli_real_escape_string($db,$_POST['email']),
			mysqli_real_escape_string($db,sha1($_POST['password']))
			);
		
		// != で'~'の中が~じゃなかったらとなる(!==にしない)
		$record = mysqli_query($db,$sql) or die(mysqli_error($db));
		if ($table = mysqli_fetch_assoc($record)){
			//ログイン成功
			$_SESSION['id'] = $table['id'];
			$_SESSION['time'] = time();

			// var_dump($_POST['save']);
			//ログイン情報を記録する(２週間)(単位[s])
			if ($_POST['save'] == 'on') {
				setcookie('email',$_POST['email'], time()+60*60*24*14);
				setcookie('password',$_POST['password'], time()+60*60*24*14);
			}
			// header('Location: user_profiles.html');
			// ログイン、ログアウトテスト用
			// header('Location: test_user_profiles.php');
			// 本番移行先
			header('Location: ichiran.php');
			exit();
		} else {
			$error['login'] = 'failed';
		}
	} else {
		$error['login'] = 'blank';
	}
}
else{
//最初に入力欄に何かしらの文字が入っていた場合に、中を空にする。(brankではない。)
//最初に入力欄にエラー構文が入る問題の解消のため
$_POST['email'] = '';
$_POST['password'] ='';
// 初期値として、エラーの中身を空にする
$error = array('login'=> '' );
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
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/common.css" rel="stylesheet">

    <!--ヘッダーフッターファイルより-->
    <link rel="stylesheet" type="text/css" href="headfoot.css">

    <!-- ログイン・登録画面ページ専用css -->
    <link href="assets/css/user_touroku.css" rel="stylesheet">

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
                     <span style="font-family: 'Rock Salt', cursive;">Rebro</span>
                	<!-- <i class="fa fa-book fa-1x"></i> -->
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


	    <div id="main">
			<!-- MAIN IMAGE SECTION -->
			<div id="aboutwrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<h2>Live smart<br/><br/>
								さぁ、本を探しに行こう
							</h2>
						</div>
					</div><!-- row -->
				</div><!-- /container -->
			</div><!-- /aboutwrap -->

			<!-- CHART IMAGE SECTION -->
		    <div id="chartwrap">
			    <div class="container">
			      	<div class="another_account">
			      		<div class="row"> 
			      			<h3>Sign In by another account? </h3><br/>
							<a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a> 
							<a href="#" class="btn btn-lg btn-info btn-block">Google</a>
						</div><!-- row -->
			    	</div><!-- another_account -->

			    	<form class="login" action="" method="post" enctype="multipart/form-data">
			      		<div class="sign_in">
			          		<h3>Please Sign In, or <a class href="user_touroku.php">Sign Up</a></h3>
			                <p class="form-title">　　　　Sign In</font></p>
			                <!-- <form class="login"> -->
				                <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($_POST['email']); ?>"/>
				                <input type="password" name="password" placeholder="Password" value="<?php echo htmlspecialchars($_POST['password']); ?>" />
				                <?php if($error['login'] == 'blank'): ?>
								<p class="error">*  メールアドレスとパスワードをご記入ください</p>
								<?php endif; ?>
				                <?php if($error['login'] == 'failed'): ?>
								<p class="error">*  ログインに失敗しました。正しくご記入ください。</p>
								<?php endif; ?>

				                <div>
				                	<input type="submit" value="Sign In" class="btn btn-success btn-sm" />
				                </div>
				                <div class="remember-forgot">
				                    <div class="row">
										<div class="checkbox">
											<input id="save" type="checkbox" name="save" value="on"/><label for="save">Remember Me</label>
										</div><!-- checkbox -->
				                    </div><!--  row -->
				                </div><!-- remember-forgot -->
				                <div class="password_reset">
				                	<a class href="user_pass_reset.php">Can't remember pass ?</a>
				                </div><!-- password_reset -->
			           		<!-- </form> --><!-- login -->
			            </div><!-- sign_in -->
			        </form><!-- ここを消すと表示が変わる-cssチェック-class=login -->
		    	</div><!-- container -->
			</div><!-- chartwrap -->
		 

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
