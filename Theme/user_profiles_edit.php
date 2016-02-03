<?php
	date_default_timezone_set('Asia/Tokyo');
	session_start();
	require('../dbconnect.php');
  // echo htmlspecialchars($_POST["users_name"]);
	$sql = 'SELECT * FROM `user_profiles` WHERE user_id = 1';

	$result = mysqli_query($db, $sql) or die(mysqli_error($db));

	$rec = mysqli_fetch_assoc($result);


	//POST送信されたら、check画面に移動
	// $user_name = htmlspecialchars($_POST['user_name']);
	// $hurigana = htmlspecialchars($_POST['hurigana']);
	// $age = htmlspecialchars($_POST['age']);
	// $college_id = htmlspecialchars($_POST['college_id']);
	// $pref_id = htmlspecialchars($_POST['pref_id']);
	// $city_id = htmlspecialchars($_POST['city_id']);
	// $major_id = htmlspecialchars($_POST['major_id']);
	// $address = htmlspecialchars($_POST['address']);
	// $pr = htmlspecialchars($_POST['pr']);
	// $picture = htmlspecialchars($_POST['picture']);


	// header('Location: user_check.php'); //入力し終えたらuser_check.phpに進みます

	// echo $_POST;
	if (!empty($_POST)){

		$_SESSION['join'] = $_POST;
		
		header('Location: user_check.php'); //入力し終えたらuser_check.phpに進みます
 		exit();
	}

	// if (!empty($_POST)) {

	// 	if($_POST['user_name'] == ''){
	// 		$error['user_name'] = 'blank';
	// 	}

	// 	if($_POST['hurigana'] == ''){
	// 		$error['hurigana'] = 'blank';
	// 	}

	// 	if($_POST['age'] == ''){
	// 		$error['age'] = 'blank';
	// 	}

	// 	if($_POST['college_id'] == ''){
	// 		$error['college_id'] = 'blank';
	// 	}
		
	// 	if($_POST['pref_id'] == ''){
	// 		$error['pref_id'] = 'blank';
	// 	}

	// 	if($_POST['city_id'] == ''){
	// 		$error['city_id'] = 'blank';
	// 	}

	// 	if($_POST['major_id'] == ''){
	// 		$error['major_id'] = 'blank';
	// 	}

	// 	if($_POST['address'] == ''){
	// 		$error['address'] = 'blank';
	// 	}

	// 	if($_POST['pr'] == ''){
	// 		$error['pr'] = 'blank';
	// 	}
	// 	$fileName = $_FILES['picture']['user_name'];
	// 	if(!empty($fileName)){
	// 		$ext = substr($fileName, -3);
	// 		if($ext != 'jpg' && $ext != 'git' && $ext != 'png'){
	// 			$error['picture'] = 'type';
	// 		}
	// 	}

	// 	if($error['user_name']=='' && $error['hurigana']=='' && $error['age']=='' && $error['college_id']=='' && $error['pref_id']=='' && $error['city']=='' && $error['major_id']=='' && $error['address']=='' && $error['pr']=='' ){
	// 		$user_name = ($_POST['user_name']);
	// 		$hurigana = ($_POST['hurigana']);
	// 		$age = ($_POST['age']);
	// 		$college_id = ($_POST['college_id']);
	// 		$pref_id = ($_POST['pref_id']);
	// 		$city_id = ($_POST['city_id']);
	// 		$major_id = ($_POST['major_id']);
	// 		$address = ($_POST['address']);
	// 		$pr = ($_POST['pr']);
	// 		$picture = ($_POST['picture']);

	// 		$image = date.time('YmdHis') . $FILES['picture']['user_name'];
	// 		move_uploaded_file($_FILES,['picture']['tmp_name'], '../textbook_picture/' . $image);

	// 		$_SESSION['join'] = $_POST;
	// 		$_SESSION['join']['picture'] = $picture;
	// 		header('Location: user_check.php'); //入力し終えたらuser_check.phpに進みます
	// 		exit();
	// 	}	
	// }
	// //書き直し
	// if(isset($_REQEST['action'])){
	// 	$action = $_REQUEST['action'];
	// }
	// if ($action == 'rewrite'){
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

    <title>Lebro</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/user_profiles.css" rel="stylesheet">

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
    <!-- <div class="container">
      <div class="row mt">
      	<div class="col-lg-8">
	        <h1>We build websites & apps that people love!</h1>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      	</div>
      	<div class="col-lg-4">
      		<p class="pull-right"><br><button type="button" class="btn btn-green">Start Your Project Now</button></p>
      	</div>
      </div><!-- /row -->
    <!-- </div> --><!-- /.container -->
    
    <!-- PROFILE SECTION -->
    <!-- 参照 http://bootsnipp.com/snippets/featured/float-label-pattern-forms -->
  <div id="profile">
    	<div class="container"
	    	<div class="row pro">
				<ul class="grid effect-2" id="grid">

						<dd class="avatar-upload-container clearfix">
							<img class="avatar_left" width="250" height="250"  alt="写真を入力して下さい">
							<div class="avatar_upload">
							<a class="btn button-change-profile-picture" href="#">
								<!-- <label for="upload-profile-picture">
								Upload new picture
								<input id="upload-profile-picture" class="manual-file-chooser js-manual-file-chooser js-avatar-field" type="file">
								</label> -->
							</a>
							<!-- <div class="upload-state default">
							<p>You can also drag and drop a picture from your computer.</p>
							</div> -->
							<!-- <div class="upload-state loading">
								<div class="upload-state text-danger file-empty"> This file is empty. </div>
								<div class="upload-state text-danger too-big"> Please upload a picture smaller than 1 MB. </div>
								<div class="upload-state text-danger bad-dimensions"> Please upload a picture smaller than 10,000x10,000. </div>
								<div class="upload-state text-danger bad-file"> Unfortunately, we only support PNG, GIF, or JPG pictures. </div>
								<div class="upload-state text-danger bad-browser"> This browser doesn’t support uploading pictures. </div>
								<div class="upload-state text-danger failed-request"> Something went really wrong and we can’t process that picture. </div>
							</div> -->
						</dd>
					
					<div class="col-sm-4">


						

		                <h3 class="page-header">Profile</h3>
		                <form role="form"　action ="" method ="post">
		                    <div class="form-group float-label-control">
		                        <label for="">名前（※必須）</label>
		                        <input type="text" name ="user_name" class="form-control" placeholder="Username" value ="<?php echo $rec['user_name']?>">
		                    </div>
		                    <!-- <div class="profile-edit-1">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <div class="form-group float-label-control">
		                        <label for="">ふりがな</label>
		                        <input type="text" name ="hurigana" class="form-control" placeholder="Username" value ="<?php echo $rec['hurigana']?>">
		                    </div>
		                    <!-- <div class="profile-edit-2">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <!-- <div class="form-group float-label-control">
		                        <label for="">アカウント名</label>
		                        <input type="text" class="form-control" placeholder="Username">
		                    </div> -->
		                    <!-- <div class="profile-edit-3">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div>
 -->
		                    <div class="form-group float-label-control">
		                        <label for="">年齢</label>
		                        <input type="text" name ="age" class="form-control" placeholder="Username" value ="<?php echo $rec['age']?>">
		                    </div>
		                   <!--  <div class="profile-edit-4">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <div class="form-group float-label-control">
		                        <label for="">大学名</label>
		                        <input type="text" name ="college_id" class="form-control" placeholder="Username" value ="<?php echo $rec['college_id']?>">
		                    </div>
		                   <!--  <div class="profile-edit-5">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <div class="form-group float-label-control">
		                        <label for="">都道府県</label>
		                        <input type="text" name ="pref_id" class="form-control" placeholder="Username" value ="<?php echo $rec['pref_id']?>">
		                    </div>
		                  <!--   <div class="profile-edit-6">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div>

 -->
		                    <div class="form-group float-label-control">
		                        <label for="">市町村</label>
		                        <input type="text" name ="city_id" class="form-control" placeholder="Username" value ="<?php echo $rec['city_id']?>">
		                    </div>
		                   <!--  <div class="profile-edit-7">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <div class="form-group float-label-control">
		                        <label for="">学部名</label>
		                        <input type="text" name ="major_id" class="form-control" placeholder="Username" value ="<?php echo $rec['major_id']?>">
		                    </div>
		                   <!--  <div class="profile-edit-8">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

 							<!-- <div class="form-group float-label-control">
		                        <label for="">E-mail</label>
		                        <input type="email" class="form-control" placeholder="Username">
		                    </div> -->
		                    <!-- <div class="profile-edit-9">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <!-- <div class="form-group float-label-control">
		                        <label for="">電話番号</label>
		                        <input type="text" class="form-control" placeholder="Username">
		                    </div> -->
		                    <!-- <div class="profile-edit-9">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <div class="form-group float-label-control">
		                        <label for="">住所</label>
		                        <input type="text" name ="address" class="form-control" placeholder="Username"value ="<?php echo $rec['address']?>">
		                    </div>
		                    <!-- <div class="profile-edit-10">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->

		                    <!-- <div class="form-group float-label-control">
		                        <label for="">Username</label>
		                        <input type="email" class="form-control" placeholder="Username">
		                    </div> -->

		                    <!-- <div class="form-group float-label-control">
		                        <label for="">Password</label>
		                        <input type="password" class="form-control" placeholder="Password">
		                    </div> -->
		                    <div class="form-group float-label-control">
		                        <label for="">自己PR（※必須）</label>
		                        <textarea class="form-control"  name ="pr" placeholder="Textarea" rows="5"><?php echo $rec['pr']?></textarea>
		                    </div>
		                    <p class ="comform">
		                    	<a><input type ="submit" value ="確認画面へ進む"></a>
		                    </p> 
		                    <!-- <div class="profile-edit-11">
								<div class="row">
							    	<button href="#"  class="btn btn-xlarge" /><i class="fa fa-chevron-right fa-5x" ></i></button>
							    </div>
							</div> -->
						</form>
		                


		                <!-- <h4 class="page-header">Bottom Labels</h4>
		                <form role="form">
		                    <div class="form-group float-label-control label-bottom">
		                        <label for="">Username</label>
		                        <input type="email" class="form-control" placeholder="Username">
		                    </div>
		                </form>


		                <h4 class="page-header">Placeholder Overrides</h4>
		                <form role="form">
		                    <div class="form-group float-label-control">
		                        <label for="">Email Address</label>
		                        <input type="email" class="form-control" placeholder="What's your email address?">
		                    </div>
		                </form>

		            </div>
					<!-- <li><a href="singleproject.html"><img src="assets/img/portfolio/14.jpg"></a></li> -->
				</ul>
	    	</div><!-- row -->
	    </div><!-- container -->
    </div><!-- portfolio -->
	
	
	
	
	<!-- CALL TO ACTION -->
	<div id="call">
		<div class="container">
			<div class="row">
				<!-- <h3>THIS IS A CALL TO ACTION AREA</h3>
				<div class="col-lg-8 col-lg-offset-2">
					<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
					<p><button type="button" class="btn btn-green btn-lg">Call To Action Button</button></p>
				</div> -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Call to action -->
	
	<div class="container">
		<div class="row mt">
			<div class="col-lg-12">
				<h1>Stay Connected</h1>
				<p>Join us on our social networks for all the latest updates, product/service announcements and more.</p>
				<br>
			</div><!-- col-lg-12 -->
		</div><!-- row -->
	</div><!-- container -->
	
	

    <!-- Bootstrap core JavaScript
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
