<?php
session_start();
	require('C:\xampp\htdocs\teamLibro/dbconnect.php');
	
	$_SESSION['id']=1;
	$_SESSION['book_id']=1;  //session変数に本のID入れてもらって、一覧ページから飛ばしてもらう

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



?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="assets/css/chat.css">
		<link rel="stylesheet" type="text/css" href="assets/css/common.css">
		<title>個別チャット</title>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/common.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
        <script type="text/javascript" src="headfoot.js">
        </script>
    
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
		                    <a href="">About us</a> 
		                    <a href="">Logout</a>
		                </nav>
		            </div>
		        </header><!-- /header -->
			</div>
		</div>
		<div id="main">
			<!-- <h3><font face="MSゴシック">１：１のチャット</font></h3> -->
			
		
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

			<div class="chat-container"> <!-- ここからチャット-->
				<div class="row">
		        <div class="col-md-5">
		            <div class="panel panel-primary">
		                <div class="panel-heading">
		                    <span class="glyphicon glyphicon-comment"></span>
		                   
		                </div>

		                <?php 
		               		$sql=sprintf('SELECT chat.*,up.user_name FROM chat,user_profiles up
		               			WHERE book_id=%d AND sender_id=%d || reciever_id=%d',
							mysqli_real_escape_string($db,$_SESSION['book_id']),
							mysqli_real_escape_string($db,$_SESSION['id']),
							mysqli_real_escape_string($db,$_SESSION['id'])
							);
							$record6=mysqli_query($db,$sql) or die(mysqli_error($db));
							

							while ($chat_comment=mysqli_fetch_assoc($record6)) {
								echo $chat_comment['user_name'];
								//echo $chat_comment['reciever_id'];
								echo $chat_comment['message'];
							}
		                ?>


		                <div class="panel-body">
		                    <ul class="chat">
		                        <li class="left clearfix"><span class="chat-img pull-left">
		                            <img src="http://placehold.it/50/55C1E7/fff&text=Q" alt="User Avatar" class="img-circle" />
		                        </span>
		                            <div class="chat-body clearfix">
		                                <div class="header">
		                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
		                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
		                                </div>
		                                <p>
		                                    サバンナ
		                                </p>
		                            </div>
		                        </li>
		                        <li class="right clearfix"><span class="chat-img pull-right">
		                            <img src="http://placehold.it/50/FA6F57/fff&text=A" alt="User Avatar" class="img-circle" />
		                        </span>
		                            <div class="chat-body clearfix">
		                                <div class="header">
		                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
		                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
		                                </div>
		                                <p>
		                                    アマゾン
		                                </p>
		                            </div>
		                        </li>
		                        <li class="left clearfix"><span class="chat-img pull-left">
		                            <img src="http://placehold.it/50/55C1E7/fff&text=Q" alt="User Avatar" class="img-circle" />
		                        </span>
		                            <div class="chat-body clearfix">
		                                <div class="header">
		                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
		                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
		                                </div>
		                                <p>
		                                    かいます
		                                </p>
		                            </div>
		                        </li>
		                        <li class="right clearfix"><span class="chat-img pull-right">
		                            <img src="http://placehold.it/50/FA6F57/fff&text=A" alt="User Avatar" class="img-circle" />
		                        </span>
		                            <div class="chat-body clearfix">
		                                <div class="header">
		                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
		                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
		                                </div>
		                                <p>
		                                    うります
		                                </p>
		                            </div>
		                        </li>
		                    </ul>
		                </div>
			                <div class="panel-footer">
			                    <div class="input-group">
			                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
			                        <span class="input-group-btn">
			                            <button class="btn btn-warning btn-sm" id="btn-chat">
			                                Send</button>
			                        </span>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
					   
			</div>
		

		
		<div class="footer">
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
		    </div>



        </div><!-- /#wrapper -->
    </body>
</html>