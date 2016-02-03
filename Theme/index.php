<?date_default_timezone_set('Asia/Tokyo');
session_start();
require('../dbconnect.php');

// 投稿を取得する
$page='';
if (isset($_REQUEST['page'])){
$page = $_REQUEST['page'];

}
if ($page ==''){
    $page =1;
}
$page = max($page, 1);




$sql =  sprintf('SELECT * FROM `books` WHERE `picture` AND delete_flag=0 ORDER BY `created`');
$posts = mysqli_query($db, $sql) or die(mysqli_error($db));

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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script type="text/javascript">
$(function(){
    $('#loopslider').each(function(){
        var loopsliderWidth = $(this).width();
        var loopsliderHeight = $(this).height();
        $(this).children('ul').wrapAll('<div id="loopslider_wrap"></div>');
 
        var listWidth = $('#loopslider_wrap').children('ul').children('li').width();
        var listCount = $('#loopslider_wrap').children('ul').children('li').length;
 
        var loopWidth = (listWidth)*(listCount);
 
        $('#loopslider_wrap').css({
            top: '0',
            left: '0',
            width: ((loopWidth) * 2),
            height: (loopsliderHeight),
            overflow: 'hidden',
            position: 'absolute'
        });
 
        $('#loopslider_wrap ul').css({
            width: (loopWidth)
        });
        loopsliderPosition();
 
        function loopsliderPosition(){
            $('#loopslider_wrap').css({left:'0'});
            $('#loopslider_wrap').stop().animate({left:'-' + (loopWidth) + 'px'},25000,'linear');
            setTimeout(function(){
                loopsliderPosition();
            },25000);
        };
 
        $('#loopslider_wrap ul').clone().appendTo('#loopslider_wrap');
    });
});</script>

    
  </head>

  <body>
  	 	<header>
            <div class="container clearfix">
                <h1 id="logo">
                    Rebro
                </h1>
                <!-- <i class="fa fa-book fa-4x"></i>      -->
                <nav>
                    <!-- <a href="">Lorem</a> -->
                    <!-- 消えたnavタグ大事件... -->
                   
                    <a href="">Logout</a>
                </nav>
            </div>
        </header><!-- /header -->

	<!-- Menu -->
	<!--メニュー上の黒い塊-　<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a href="index.html#home">LIBLO</a></h1>
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
		<!-- <div id="menuToggle"><i class="fa fa-bars"></i></div>
	</nav> -->
	
	<!-- MAIN IMAGE SECTION -->
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<h1>Rebro</h1>
					<h2>Live Smart</h2>
					<div class="spacer"></div>
					<!-- <i class="fa fa-angle-down"></i> -->
				</div>
			</div><!-- row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->

	<!-- WELCOME SECTION -->
	<div class="container">
      <div class="row mt">
      	<div class="col-lg-8">
	        <h1>Rebroは簡単に教科書が売り買いできるフリマサイトです</h1>
	        <p>Rebroには、文系教科書から理系教科書に至るまで大学生活で必要な教科書がたくさん。
	        	<br/>賢く教科書を手にいれて大学生活をEnjoyしよう。</p>
      	</div>
      	<div class="col-lg-4">

      		<p class="pull-right"><br><button type="button" class="btn btn-green"><a href="login.html">すぐに教科書を探す</a></button></p>
      	</div>
      </div><!-- /row -->
	</div>

    


    	<!-- SERVICES SECTION -->
	<div id="services">
		<div class="container">
			<div class="row mt">
				<div class="col-lg-1 centered">
					<i class="fa fa-certificate"></i>
				</div>
				<div class="col-lg-3">
					<h3>①簡単に検索できる</h3>
					<p>大学ごとに必要な教科書がわかるから見つけたい教科書がすぐに見つかります。</p>
				</div>

				<div class="col-lg-1 centered">
					<i class="fa fa-question-circle"></i>
				</div>
				<div class="col-lg-3">
					<h3>②すぐに購入できる</h3>
					<p>ボタン一つで即購入。
						あとは、出品者とやりとりを行うだけです。</p>
				</div>
			
			
				<div class="col-lg-1 centered">
					<i class="fa fa-globe"></i>
				</div>
				<div class="col-lg-3">
					<h3>③すぐに出品できる</h3>
					<p>写真を撮って特徴を入力するだけで、簡単に出品できます。</p>
				</div>
			
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- services section -->
    
    <!-- PORTFOLIO SECTION -->
   <!--  <div id="portfolio">
    	<div class="container"
	    	<div class="row mt">
				<ul class="grid effect-2" id="grid">
					<li><a href="show.html"><img src="assets/img/portfolio/14.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/15.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/16.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/17.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/18.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/19.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/20.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/21.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/22.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/23.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/24.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/25.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/26.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/27.jpg"></a></li>
					<li><a href="show.html"><img src="assets/img/portfolio/28.png"></a></li>
				</ul> -->
	    	<!-- </div><! row --> 
	    <!-- </div>container -->
    <!-- </div>portfolio -->
   


      

       
<div class="row">
	<div claass="col-lg-12">
		
			<div id="loopslider">
			<ul>

				<?php

				   while(1)
                    {
                        // $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                        $rec = mysqli_fetch_assoc($posts);

                        if($rec==false)
                        {
                            break;
                        }

 						echo '<div style="float:left;">';
 						echo '<a class="thumbnail fancybox" rel="ligthbox" >';
                        echo '<li><img class="img-responsive" alt="" src="../textbook_picture/'.$rec['picture'].'"　
                            style="width:200px;height:200px;"></li>';
                        echo '</a></div>';


                    }

                    $dbh = null;



				?>

<!-- 
				<li><a href="#"><img src="assets/img/portfolio/24.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/15.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/16.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/25.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/18.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/19.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/20.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/21.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/22.jpg" width="100" height="150" alt="" /></a></li>
				<li><a href="#"><img src="assets/img/portfolio/23.jpg" width="100" height="150" alt="" /></a></li> -->
			</ul>	
			</div><!--/.loopslider-->
		
	</div>
</div>		
</div>  
<br /><br />







	<!-- <!-- CLIENTS LOGOS -->
	Libroの特徴を記述６つほど
	<div id="lg">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-2 col-lg-offset-1">
					<img src="assets/img/clients/c01.gif" alt="">
				</div>
				<div class="col-lg-2">
					<img src="assets/img/clients/c02.gif" alt="">
				</div>
				<div class="col-lg-2">
					<img src="assets/img/clients/c03.gif" alt="">
				</div>
				<div class="col-lg-2">
					<img src="assets/img/clients/c04.gif" alt="">
				</div>
				<div class="col-lg-2">
					<img src="assets/img/clients/c05.gif" alt="">
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- dg -->
	 
	
	
	
	
	
	
	<!-- CALL TO ACTION -->
	<div id="call">
		<div class="container">
			<div class="row">
				<h3>さぁ教科書を探しにいこう</h3>
				<div class="col-lg-8 col-lg-offset-2">
					<p>ここにログイン画面に進む内容を記述</p>
					<p><button type="button" class="btn btn-green btn-lg">Call To ログイン Button</button></p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Call to action -->


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
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/classie.js"></script>
	<script src="assets/js/AnimOnScroll.js"></script>
	<script>
		new AnimOnScroll( document.getElementById( 'grid' ), {
			minDuration : 0.4,
			maxDuration : 0.7,
			viewportFactor : 0.2
		} );
	</script>
  </body>
</html>
