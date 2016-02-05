<?php
// var_dump($_SESSION['join']);
// var_dump($_POST);


// if (!empty($_POST)) {
// 	// var_dump('if文入ってる？');
// 	// var_dump($_POST['email']);
// 	// var_dump($_POST['password']);
// 	//ログイン処理
// 	if ($_POST['email'] != '' && $_POST['password'] !='') {
// 		// var_dump($_POST['email']);
// 		// var_dump($_POST['password']);
// 		// var_dump('naka入ってる？');
// 		//sprintf( フォーマット [, 引数１] [, 引数２]･・・):指定したフォーマットにしたがって整形した文字列を返す。
// 		// mysqli_real_escape_string：PHPからMySQLにデータを登録するときに、MySQLで使用する特殊文字をエスケープする方法
// 		$sql = sprintf('SELECT * FROM users WHERE email="%s" AND password="%s"',
// 			mysqli_real_escape_string($db,$_POST['email']),
// 			mysqli_real_escape_string($db,sha1($_POST['password']))
// 			);
// 		// var_dump($sql);
// 		// != で'~'の中が~じゃなかったらとなる(!==にしない)
// 		$record = mysqli_query($db,$sql) or die(mysqli_error($db));
// 		if ($table = mysqli_fetch_assoc($record)){
// 			//ログイン成功
// 			$_SESSION['id'] = $table['id'];
// 			$_SESSION['time'] = time();


// 			//ログイン情報を記録する(２週間)(単位[s])
// 			if ($_POST['save'] == 'on') {
// 				setcookie('email',$_POST['email'], time()+60*60*24*14);
// 				setcookie('password',$_POST['password'], time()+60*60*24*14);
// 			}
// 			// header('Location: user_profiles.html');
// 			// ログイン、ログアウトテスト用
// 			header('Location: test_user_profiles.php');
// 			exit();
// 		} else {
// 			$error['login'] = 'failed';
// 		}
// 	} else {
// 		$error['login'] = 'blank';
// 	}
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
			<div id="aboutwrap_thanks">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<h2>Thank you!<br/><br/>
								Live smart<br/>
								さぁ、本を探しに行こう<br /><br />
								<!-- <a href="user_profiles.html">Log IN</a> -->
								<!-- ログイン、ログアウトテスト用 -->
								
				                	<!-- <input type="submit" value="Log IN" class="btn btn-success btn-sm" /> -->
				               
								<a href="test_user_profiles.php">Log IN</a>
							</h2>
							<br />
						</div>
					</div><!-- row -->
				</div><!-- /container -->
			</div><!-- /aboutwrap -->

			<!-- <div id="head">
				<h1>会員登録</h1>
			</div>

			<div id="content">
				<p>ユーザー登録が完了しました</p>
				<p><a href="user_profiles.html">ログインする</a></p>
			</div> -->

		</div><!-- #main -->

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
	
	</body>
</html>