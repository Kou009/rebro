<?php
session_start();
require('../dbconnect.php');

// var_dump($_SESSION['join']);

//session変数に何もデータがない場合、これ以上処理する意味がないので、入力画面に戻る。
//URL入力で直接このページに飛んだ時など、データは何もない状態になる
if (!isset($_SESSION['join'])) {
	header('Location: login.php');
	exit();
}

//ボタンが押されてPOST送信でデータが送られてきた時
if (!empty($_POST)) {
	//登録処理する
	$sql = sprintf('INSERT INTO users SET email="%s",password="%s",created="%s"',
		mysqli_real_escape_string($db,$_SESSION['join']['email']),		
		mysqli_real_escape_string($db,sha1($_SESSION['join']['password'])),
		//パスワード暗号化の　sha1　の　最後は数字の1、間違えないように
		date('Y-m-d H:i:s')
	);

	mysqli_query($db,$sql) or die(mysqli_error($db));

	//直近で実行された Insert 文を対象にAUTO_INCREMENT値を返す（user_id）
	// printf ("New Record ID=%d\n", mysqli_insert_id($db));
	$user_id = mysqli_insert_id($db);
	// var_dump($user_id);
	//返されたuser_idをuser_profilesテーブルに登録
	$sql = sprintf('INSERT INTO user_profiles SET user_id='."$user_id".'',
		mysqli_real_escape_string($db,$user_id)
	);
	mysqli_query($db,$sql) or die(mysqli_error($db));

	$user_profile_id = mysqli_insert_id($db);

	//ログイン処理(登録完了後にログイン状態にする)
	$sql = sprintf('SELECT * FROM users WHERE email="%s" AND password="%s"',
			mysqli_real_escape_string($db,$_SESSION['join']['email']),
			mysqli_real_escape_string($db,sha1($_SESSION['join']['password']))
			);
		// echo '<br />';
		// var_dump($sql);
		// != で'~'の中が~じゃなかったらとなる(!==にしない)
		$record = mysqli_query($db,$sql) or die(mysqli_error($db));

		if ($table = mysqli_fetch_assoc($record)){
			//ログイン成功
			$_SESSION['id'] = $table['id'];
			$_SESSION['time'] = time();

			//ログイン情報を記録する(２週間)(単位[s])
			setcookie('email',$_SESSION['join']['email'], time()+60*60*24*14);
			setcookie('password',$_SESSION['join']['password'], time()+60*60*24*14);

			unset($_SESSION['join']);
			//thanksページへの送信テスト
		 	// $_SESSION['join'] = $_POST;
		 	// $_POST['thanks']='';
			header('Location: user_thanks.php');
			exit();
		}
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
			<form action="" method="post">
				<input type="hidden" name="action" value="submit" />
					<dl>
						<h2>以下の内容で登録</h2><br />
						<dt>メールアドレス</dt>
						<dd>
						<?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES,'UTF-8'); ?>
						</dd>
						<br />
						<dt>パスワード</dt>
						<dd>
						<!-- 【表示されません】 -->
						<?php echo htmlspecialchars($_SESSION['join']['password'],ENT_QUOTES,'UTF-8'); ?>
						</dd>
					</dl><br />
				<div><a href="user_touroku.php?action=rewrite" class="btn-reset btn-sm">&laquo;&nbsp;Reset</a>  <input type="submit" value="Register" class="btn-success btn-sm"/></div>
			</form>

		</div><!-- #check_space -->

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
