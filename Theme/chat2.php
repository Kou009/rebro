<?php
session_start();
	require('../dbconnect.php');
	
	$_SESSION['id']=3;
	$_SESSION['book_id']=1;  //session変数に本のID入れてもらって、一覧ページから飛ばしてもらう
	//$_SESSION['time']=time();


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

		//チャットメッセージを記録
		if(!empty($_POST)){
			//出品者かどうか判別　出品者だった場合、レシーバーフラグ立てます
	if($_SESSION['id'] == $books['users_id']) {
		$sql=sprintf('INSERT INTO chat SET sender_id=%d,reciever_id=1,book_id=%d,message="%s",created=NOW()',
				mysqli_real_escape_string($db,$member['id']),
				mysqli_real_escape_string($db,$_SESSION['book_id']),
				mysqli_real_escape_string($db,$_POST['message']));
				mysqli_query($db,$sql) or die(mysqli_error($db));
			
			header('Location: chat.php');
			exit();
			}//出品者じゃなかった場合
			elseif($_POST['message']!=''){
				$sql=sprintf('INSERT INTO chat SET sender_id=%d,book_id=%d,message="%s",created=NOW()',
				mysqli_real_escape_string($db,$member['id']),
				mysqli_real_escape_string($db,$_SESSION['book_id']),
				mysqli_real_escape_string($db,$_POST['message']));
				mysqli_query($db,$sql) or die(mysqli_error($db));
			
			header('Location: chat.php');
			exit();
			}

		}


?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="assets/css/chat.css">
		<link rel="stylesheet" type="text/css" href="assets/css/common.css">
		<title>出品者さまのページ</title>
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
				<!-- ここで使われている画像(出品者とお客さんの青いマルとオレンジのマル)は、ネットにつながってないと表示されません -->
				<div class="row">
		        <div class="col-md-5">
		            <div class="panel panel-primary">
		                <div class="panel-heading">
		                    <span class="glyphicon glyphicon-comment"></span>
		                   
		                </div>

		              
		                <div class="panel-body">
		                	<div class="panel-button">
		                		<?php
		                			$sql=sprintf('SELECT id,user_name FROM user_profiles WHERE id!=%s',
		                				mysqli_real_escape_string($db,$_SESSION['id'])
		                				);
		                			$record7=mysqli_query($db,$sql) or die(mysqli_error($db));

		                			while($sender_name=mysqli_fetch_assoc($record7)):
		                		?>
		                		<form style="display:inline;" method="post" action="" >
		                			<input type="submit" value="<?php  echo $sender_name['user_name']; ?>"
		                		 	type="hidden"  id="<?php echo $sender_name['id']; ?>"/>	
		                		</form>
		                	<?php 
		                	endwhile;?>
		                	</div>

		                	 <?php 
		                	 if (isset($_POST['id'])) {
		                	 	
		                	 	var_dump($_POST['id']);
		                	 }
		                	
		                	$sql=sprintf('SELECT chat.* ,up.user_name FROM chat , user_profiles up 
		                				WHERE book_id=%d AND up.id=chat.sender_id AND chat.sender_id=%d',
		                	mysqli_real_escape_string($db,$_SESSION['book_id']),
		                	mysqli_real_escape_string($db,$_POST['id'])
		                	);

		               		 $record6=mysqli_query($db,$sql) or die(mysqli_error($db));
		                	?>
		                
		        
		                    <ul class="chat">
		                    	<?php while($chat_comment=mysqli_fetch_assoc($record6)): 
		                    		if ($chat_comment['sell_flag']==0) {
		                    		?>
		                        <li class="left clearfix"><span class="chat-img pull-left">
		                            <img src="http://placehold.it/50/55C1E7/fff&text=Q" alt="User Avatar" class="img-circle" />
		                        </span>
		                            <div class="chat-body clearfix">
		                                <div class="header">
		                                    <strong class="primary-font"><?php echo $chat_comment['user_name']; ?></strong><small class="pull-right text-muted">
		                                        <span class="glyphicon glyphicon-time"></span><?php echo $chat_comment['created']; ?></small>
		                                </div>
		                                <p>
		                                    <?php echo $chat_comment['message']; ?>
		                                </p>
		                            </div>
		                        </li>
		                        	<?php } ?>

		                        <?php if($chat_comment['sell_flag'] == 1){ ?>
		                        <li class="right clearfix"><span class="chat-img pull-right">
		                            <img src="http://placehold.it/50/FA6F57/fff&text=A" alt="User Avatar" class="img-circle" />
		                        </span>
		                            <div class="chat-body clearfix">
		                                <div class="header">
		                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $chat_comment['created']; ?></small>
		                                    <strong class="pull-right primary-font"><?php echo $sell_user['user_name']; ?></strong>
		                                </div>
		                                <p>
		                                    <?php echo $chat_comment['message']; ?>
		                                </p>
		                            </div>
		                        </li>
		                        <?php } ?>
		                    
		                         <?php 
		                    		endwhile;
		                    	
		                    		?>
		                    </ul>
		                </div>


			                <div class="panel-footer">
			                    <div class="input-group">
			                    	<form method="post" action="">
				                        <textarea id="btn-input" name="message" cols="100" rows="7" class="form-control input-sm" placeholder="Type your message here...">
				                        </textarea>
				                        <span class="input-group-btn">
				                            <button class="btn btn-warning btn-sm" id="btn-chat">
				                                Send</button>
				                        </span>
			                    	</form>
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