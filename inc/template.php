<?php
	//include "force-ssl.php";

	include APP_ROOT . "/inc/utils.php";
	include APP_ROOT . "/inc/account.php";

	Class Template {
		public $page;

		public function loadNavigation() {
			$page = $this->page;

			if($page != "login") {
				return '<link href="css/navi.css" rel="stylesheet">';
			}
		}

		public function loadPage() {
			return true;
		}

		public function setBody() {
			$page = $this->page;

			if($page == "login" || $page == "stundenplan") {
				return '<body background = "img/background.jpg" style = "background-size: cover">';
			} else {
				return '<body>';
			}
		}
	}

	$template = new Template();
	$template->page = $_GET["page"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SchoolNet</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon">
	<script src="/js/jquery.js" type="text/javascript"></script>	

	<!--Navigation laden-->
	<?php echo $template->loadNavigation() ?>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

	<?php $template->setBody(); ?>


	<?php if($_GET['page'] == "login") {
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SchoolNet</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="#">Services</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<?php
	} else {
	?> <nav id="header" style="z-index: 1000;">
		<div id="logo">
			<a href="#"><img style="padding: 10px; vertical-align: middle;" src="img/logo.png" alt="" /></a>
		</div>
		<!--<a href="logout">logout</a>-->
		<div id="username">
			<p style="display: inline"><?php echo $_SESSION["username"]; ?></p>
			<input id="logout" type="submit" value="Logout" onclick="<?php redirectToInline('index.php?page=login&logout=true'); ?>"/>
		</div>
	</nav>
	<?php
	}
	?>

<div id="content">
<?php 
	$template = APP_ROOT . "/inc/sites/" . $_GET['page'] . ".php";
	if(file_exists($template)) {
		require_once $template;
	} else {
		echo "<h1>Seite nicht gefunden!</h1>";
	}
 ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
