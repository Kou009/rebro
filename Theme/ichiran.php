<?date_default_timezone_set('Asia/Tokyo');
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

    <title>Rebro </title>

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
    
  </head>

  <body>
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


	

	<!-- Menu -->
	<!-- <nav class="menu" id="theMenu">
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
	</nav> -->
	
	<!-- MAIN IMAGE SECTION -->
<div id="portwrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<h2>気になる教科書見つけよう</h2>
			</div>
		</div><!-- row -->
	</div><!-- /container -->
</div><!-- /portrwrap -->

	<!-- WELCOME SECTION -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
	        <h1>女優写真集</h1>
	        <p></p>
            </div>
            <div class="col-lg-4">
      		<a href="sell_index.php">
      		<p class="pull-right"><br>
                <button type="button" class="btn btn-green">出品する
      		    </button>
            </p>
            </a>
            </div>
        </div>
   

    <!-- 左カラム-->
        <div class="row">
            <div class="col-lg-3">
    		<div id="left" class="span3">
                <ul id="menu-group-1" class="nav menu">  
                    <li class="item-1 deeper parent active">
                        <a class="" href="#">
                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign"><i class="icon-plus icon-white"></i></span>
                            <span class="lbl">福岡県</span>                      
                        </a>
                        <ul class="children nav-child unstyled small collapse" id="sub-item-1">
                            <li class="item-2 deeper parent active">
                                <a class="" href="#">
                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2" class="sign"><i class="icon-plus icon-white"></i></span>
                                    <span class="lbl">福岡市</span> 
                                </a>
                                <ul class="children nav-child unstyled small collapse" id="sub-item-2">
                                    <li class="item-3 current active">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">福岡大学</span> (current menu)
                                        </a>
                                    </li>
                                    <li class="item-4">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">西南大学</span> 
                                        </a>
                                    </li>                                
                                </ul>
                            </li>
                            <li class="item-5 deeper parent">
                                <a class="" href="#">
                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-5" class="sign"><i class="icon-plus icon-white"></i></span>
                                    <span class="lbl">北九州市</span> 
                                </a>
                                <ul class="children nav-child unstyled small collapse" id="sub-item-5">
                                    <li class="item-6">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">九州工業大学</span>                                    
                                        </a>
                                    </li>
                                    <li class="item-7">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">九州国際大学</span>                                    
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="item-8 deeper parent">
                        <a class="" href="#">
                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-8" class="sign"><i class="icon-plus icon-white"></i></span>
                            <span class="lbl">佐賀県</span>                      
                        </a>
                        <ul class="children nav-child unstyled small collapse" id="sub-item-8">
                            <li class="item-9 deeper parent">
                                <a class="" href="#">
                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-9" class="sign"><i class="icon-plus icon-white"></i></span>
                                    <span class="lbl">佐賀市</span> 
                                </a>
                                <ul class="children nav-child unstyled small collapse" id="sub-item-9">
                                    <li class="item-10">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">佐賀大学</span>
                                        </a>
                                    </li>
                                    <li class="item-11">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">田舎大学</span> 
                                        </a>
                                    </li>                                
                                </ul>
                            </li>
                            <li class="item-12 deeper parent">
                                <a class="" href="#">
                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-12" class="sign"><i class="icon-plus icon-white"></i></span>
                                    <span class="lbl">ほかにない</span> 
                                </a>
                                <ul class="children nav-child unstyled small collapse" id="sub-item-12">
                                    <li class="item-13">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">そうだよ田舎だよ</span>                                    
                                        </a>
                                    </li>
                                    <li class="item-14">
                                        <a class="" href="#">
                                            <span class="sign"><i class="icon-play"></i></span>
                                            <span class="lbl">思いつかねえよ</span>                                    
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>    			
                </ul>          
            </div>
            </div>  
        
   


<!-- References: https://github.com/fancyapps/fancyBox -->


    <link rel="stylesheet" href="//frontend.reklamor.com/fancybox/jquery.fancybox.css" media="screen">
    <script src="//frontend.reklamor.com/fancybox/jquery.fancybox.js"></script>

        
	       <div class="col-lg-9">
                <div class='list-group gallery'>
    					<?php
    				$dsn = 'mysql:dbname=rebro;host=localhost';
    				$user = 'root';
    				$password = '';
    				$dbh = new PDO($dsn,$user,$password);
    				$dbh->query('SET NAMES utf8');

    				$sql = 'SELECT * FROM `books` WHERE 1';
    				$stmt = $dbh->prepare($sql);
    				//INSERT文を実行
    				$stmt->execute();

    				while(1)
    				{
    					$rec = $stmt->fetch(PDO::FETCH_ASSOC);
    					if($rec==false)
    					{
    						break;
    					}
    					// //'' ""　どちらでも可能&nbspは空白を表示
    					// echo'</br>';
    					// //echo $rec['id'];
    					// echo '&nbsp;';
    					// //echo "Title";
    					// echo '&nbsp;';
    					// //echo $rec['title'];
    					
    					// echo'</br>';
    					
    					// //echo $rec['price'];

    					// // echo'</br>';
    					// // echo $rec['picture'];
    					// echo'</br>';
    					// //echo '<img src="../textbook_picture/'.$rec['picture'].'">';	
    				
    					echo '<div style="float:left;">';
    					echo '<a class="thumbnail fancybox" rel="ligthbox" >';
    					echo '<img class="img-responsive" alt="" src="../textbook_picture/'.$rec['picture'].'"　
                            style="width:200px;height:200px;">';
    					echo '<div class="text-right">';
    					echo '<small class="text-muted">';
    					echo $rec['title'];
    					echo'</br>';
    					echo '¥';
    					echo $rec['price'];
    					echo '</small></div></a></div>';
                        echo '  ';



    				}

    				$dbh = null;
    				?>
    			


            <!-- <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'> -->
                <!-- <a class="thumbnail fancybox" rel="ligthbox" > -->
                    <!-- <img class="img-responsive" alt="" src="http://placehold.it/320x320" /> -->
                    <!-- <div class='text-right'> -->
                        <!-- <small class='text-muted'>Image Title</small> -->
                    <!-- </div> text-right / end -->
                <!-- </a> -->
            <!-- </div> col-6 / end -->
           

        
                </div> <!-- list-group / end -->
            </div> <!-- col-lg / end -->
	    </div> <!-- low / end -->
     </div> <!-- container / end -->




  
	  
	
	
	
	
	

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
