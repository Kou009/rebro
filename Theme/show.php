<?php
	session_start();
	require('../dbconnect.php');
	
	$_SESSION['id']=3;
	$_GET['id']='';  //session変数に本のID入れてもらって、一覧ページから飛ばしてもらう !本のIDはゲット送信で送りました

	if (isset($_GET['id'])) {
		$_SESSION['book_id']=$_GET['id'];   //本のIDをセッションにいれる
	}
	var_dump($_SESSION['book_id']);

	if(isset($_SESSION['id'])){
		$sql=sprintf('SELECT * FROM users WHERE id=%d',
			mysqli_real_escape_string($db,$_SESSION['id']));  
		$record=mysqli_query($db,$sql) or die(mysqli_error($db));
		$member=mysqli_fetch_assoc($record);
	}

	//本の情報を取得
	if(isset($_SESSION['book_id'])){
		//$book_id=$_SESSION['book_id'];
		$sql=sprintf('SELECT * FROM books WHERE id=%d',
			mysqli_real_escape_string($db,$_SESSION['book_id']));
		$record2=mysqli_query($db,$sql) or die(mysqli_error($db));
		$books=mysqli_fetch_assoc($record2);
	}

	//出品者かどうか判別
	if ($_SESSION['id'] == $books['users_id']) {
		
	}
	
		//出品者情報を取得
		$sql=sprintf('SELECT * FROM user_profiles WHERE user_id=%d',
			mysqli_real_escape_string($db,$books['users_id'])
			);
		$record3=mysqli_query($db,$sql) or die(mysqli_error($db));
		$sell_user=mysqli_fetch_assoc($record3);


		//出品者の大学名取得
		$sql=sprintf('SELECT * FROM colleges WHERE id=%d',
			mysqli_real_escape_string($db,$sell_user['college_id'])
			);
		$record4=mysqli_query($db,$sql) or die(mysqli_error($db));
		$college_name=mysqli_fetch_assoc($record4);

		//出品者の学部名取得
		$sql=sprintf('SELECT * FROM majors WHERE id=%d',
			mysqli_real_escape_string($db,$sell_user['major_id'])
			);
		$record5=mysqli_query($db,$sql) or die(mysqli_error($db));
		$major_name=mysqli_fetch_assoc($record5);


	//投稿を記録する
	
		if(!empty($_POST)){
			//出品者かどうか判別　出品者だった場合、レシーバーフラグ立てます
	if($_SESSION['id'] == $books['users_id']) {
		$sql=sprintf('INSERT INTO comments SET sender_id=%d,reciever_id=1,book_id=%d,message="%s",created=NOW()',
			mysqli_real_escape_string($db,$member['id']),
				mysqli_real_escape_string($db,$_SESSION['book_id']),
				mysqli_real_escape_string($db,$_POST['message']));
			mysqli_query($db,$sql) or die(mysqli_error($db));
			
			header('Location: show.php');
			exit();
			}//出品者じゃなかった場合
			elseif($_POST['message']!=''){
				$sql=sprintf('INSERT INTO comments SET sender_id=%d,book_id=%d,message="%s",created=NOW()',
				mysqli_real_escape_string($db,$member['id']),
				mysqli_real_escape_string($db,$_SESSION['book_id']),
				mysqli_real_escape_string($db,$_POST['message']));
			mysqli_query($db,$sql) or die(mysqli_error($db));
			
			header('Location: show.php');
			exit();
			}

		}
	

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="assets/css/show.css">
		<link rel="stylesheet" type="text/css" href="assets/css/common.css">
		<title>商品詳細ページ</title>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/common.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
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
		<div class="header">
			<!-- <h1><font face="MSゴシック">テキスト</font></h1> -->
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
		                    <a href="">About us</a> 
		                    <a href="">Logout</a>
		                </nav>
		            </div>
		        </header><!-- /header -->
			</div>
		</div>

		<div id="main">
			<div class="sidebar" style="height:800px" >
				<h1>出品者情報</h1>
					<img class="sell-user" src="assets/img/default2.png" width="128" height="128" alt="出品者画像">
					<br>
					<br>
					<div class="sell-user">
						<dl>
							<h2><dt><?php echo $sell_user['user_name']; ?></dt></h2>
							<br>
							<dt>大学：<p><?php echo $college_name['college_name']; ?></p></dt>
							<br>
							<dt>学部：<p><?php echo $major_name['major_name']; ?></p></dt>
							<br>
							<dt>個人PR</dt><p><?php echo $sell_user['pr']; ?></p>

						</dl>
					</div>			
			</div> <!-- sidebar -->

			<div class="contents" style="height:450px" >
				<span><img class="book" src="assets/img/portfolio/<?php echo $books['picture']; ?>" width="210" height="298" alt="商品イメージ"></span>
				<span><div class="description">
					<dl>
						<h2><dt>タイトル</dt></h2>
						<h1><dt><?php echo $books['title']; ?></dt></h1>
						<br>
						<dt>価格<p>￥<?php echo $books['price']; ?></p></dt>
						<br>
						<dt>状態<p style='width:400px'><?php echo $books['description']; ?></p></dt>
					</dl>
				</div></span>

			</div> <!-- contents -->


<!--- -ここからパブリックコメント-->
			<?php 
		        $sql=sprintf('SELECT c.*,up.user_name FROM comments c,user_profiles up WHERE c.sender_id=up.user_id AND book_id=%d		       
		        	ORDER BY c.created DESC',
		        	mysqli_real_escape_string($db,$_SESSION['book_id']));
				$record=mysqli_query($db,$sql) or die(mysqli_error($db));
			?>

							<div class="chat-container">
						    <div class="row">

						        <div class="message-wrap col-lg-8">
						            <div class="msg-wrap" style="width:500px height:100px">

						            		<?php 
						            		while($table=mysqli_fetch_assoc($record)):  //fetchがここで終わらないようにセミコロンじゃなくて、ころん！
						            		?> 
								            <div class="media-msg">
								                    <a class="pull-left" href="#">
								                        <img class="media-object" alt="64x64" style="width: 32px; height: 32px;" src="assets/img/portfolio/15.jpg">
								                    </a>
								                <div class="media-body">
								                        <small class="pull-right time"> <?php echo $table['created'] ?></small>
								                        <h5 class="media-heading"><?php echo $table['user_name']; ?></h5>
									                        <?php if($table['reciever_id'] == 1) { ?>
									                        	<span class="media-heading">出品者より</span>
									                        <?php } ?>
								                        <small class="col-lg-10"><?php echo $table['message'];?></small>
								                    </div>
								                </div> <!-- while文用の閉じタグ -->
							                   
							            <?php endwhile; ?>
							            		</div>					
						           			</div> <!-- この2つの閉じタグ消さないでください　レイアウト崩れます -->  
						        	</div>
						    	</div> <!-- message-wrap-->

						        <form method="post" action="">
					            <div class="send-wrap">
					                <textarea name="message"class="form-control send-message" rows="3" placeholder="Write a reply...">
					                </textarea>
					             <p><input type="submit" value="送信" /></p>
					        </form>
					        <a href="chat.php">個別チャットする</a>
					        </div> <!-- send-wrap -->
					      
					      </div> <!--row -->
					  </div> <!-- chat-container -->
					</div> <!-- main -->

			 <footer>
		        <div id="info-bar">
		            <div class="container clearfix">
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
		        </div><!-- /#top-bar -->
		        </footer><!-- /footer -->
	



        </div><!-- /#wrapper -->
    </body>
</html>