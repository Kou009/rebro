<?php
require('../dbconnect.php');
session_start();
$name = '';
$error = array();
$price = '';
$description = '';
$error['name'] = '';
$error['price'] = '';
$error['description'] = '';
$error['image'] = '';
$action = '';

if (!empty($_POST))	{ //中身があった場合！は逆の意味になる→空じゃなかったら入力チェック
	//$_POSTが空ではない
	//エラー項目の確認
	if($_POST['name'] == ''){ //nameが空のときは$error変数の中に値(BLANK)を入れる。以下同様。
		$error['name'] = 'blank';
	}

	if($_POST['price'] == ''){
		$error['price'] = 'blank';
	}

	if($_POST['description'] == ''){
		$error['description'] = 'blank';
	}
	$fileName = $_FILES['image']['name'];
	if (!empty($fileName)){ //からじゃなかったら
		$ext = substr($fileName, -3); //拡張子を取り出す。-3は後ろから３文字取り出すそして$extにいれる
		if ($ext != 'jpg' && $ext != 'git' && $ext != 'png'){
			$error['image'] = 'type';//jpgでもgitでもない場合はチェック
		}
	}

	//重複アカウントのチェック
	// if(empty($error)){
	// 	$sql = sprintf('SELECT COUNT(*) AS cnt FROM members WHERE email="%s"',
	// 		mysqli_real_escape_string($db, $_POST['email'])
	// 		);
	// 	$record = mysqli_query($db, $sql) or die(mysqli_error($db));
	// 	$table = mysqli_fetch_assoc($record);
	// 	if($table['cnt'] > 0){
	// 		$error['email'] = 'duplicate';
	// 	}
	// }

	

	if ($error['name']=='' && $error['price']=='' && $error['description']=='') { 
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$image = $_POST['image'];
			//$errorが空のとき=今まで入力したやつがちゃんとなってるとき
		//画像をアップロードする。うえの処理が問題ないとき↓
		$image = date.time('YmdHis') . $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], '../textbook_picture/' . $image);

		$_SESSION['join'] = $_POST; //$_SESSION
		$_SESSION['join']['image'] = $image;// セッションにも保存
		header('Location: check.php'); //入力し終えたらcheck.phpに戻る
		exit();
	}
}
//書き直し
	if(isset($_REQEST['action'])){
		$action = $_REQUEST['action'];
	}
	if ($action == 'rewrite'){
		$_POST = $_SESSION['join'];
		$error['rewrite'] = true;
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

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<div class="container">
	<div class="row">
		<div class="col-lg-2">
			広告がはいります
		</div>
		<div class="col-lg-2">
			
		</div>

        <div class="col-lg-8">
		<form role="form" id="contact-form" class="contact-form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                		<!-- <div class="col-md-6"> -->
                  		<div class="form-group">
                            <input type="text" class="form-control" 
                            name="name" autocomplete="off"
                            placeholder="Title" 
                            value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); //一回入力して戻ったら書いたものが消えるから消えないような処理	?>"/>
                            <?php if ($error['name'] == 'blank'): //nameが入力されてなかったら異常を知らせる?> 
							<p class="error">* 本のタイトルを入力してください</p>
							<?php endif; ?>
                  		</div>
                  		<!-- </div> -->
                  <!--   	<div class="col-md-6"> -->
                  		<div class="form-group">
                            ¥<input type="text" 
                            style="ime-mode:disabled;width:95%;float:right;"
                            onkeypress='if(event.keyCode<"0".charCodeAt(0) ||"9".charCodeAt(0)<event.keyCode)return false;' 
                            class="form-control" name="price" autocomplete="off" 
                        	 placeholder="price(半角英数)"
                            value="<?php echo htmlspecialchars($price, ENT_QUOTES, 'UTF-8'); ?>">
                            <?php if ($error['price'] == 'blank'): ?>
							<p class="error">* 価格を入力してください</p>
							<?php endif; ?>
                  	<!-- 	</div> -->
                  		</div>

                  		<div class="form-group">
                            <input class="form-control textarea" rows="3" name="description" placeholder="Detail"
                            value="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>"/>
                            <?php if ($error['description'] == 'blank'): ?>
							<p class="error">* 詳細を入力してください</p>
							<?php endif; ?>
                        	</input>
                  		</div>

                  		<input type="file" name="image" size="35" />
						<?php if ($error['image'] == 'type'): ?>
						<p class="error">* 写真などは「.git」または「.jpg」の画像を指定してください</p>
						<?php endif; ?>
						<?php if(!empty($error)): ?>
						<p class="error">*恐れ入りますが、画像を改めて指定してください</p>
						<?php endif; ?>
                  	<!-- 	</div> -->
                    </div>
	                    <div class="row">
	                    <div class="col-md-12">
	                 		 <div><input type="submit" value="入力内容を確認する" /></div>
	                  	</div>
	                  	</div>
        </form>

   		</div>
   	</div>

        <button type="button"><a href="ichiran.html">商品一覧に戻る</a></button>
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
