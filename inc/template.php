<?php
	//include "force-ssl.php";

	include_once APP_ROOT . "/inc/utils.php";
	include_once APP_ROOT . "/inc/account.php";

	Class Template {
		public $page;
		
		public function loadNavigation() {
			$page = $this->page;

			if($page == "login") {
				return '<link href="css/navi.css" rel="stylesheet">';
			}
		}

		public function setBody() {
			$page = $this->page;

			if($page == "login" || $page == "stundenplan") {
				return '<body background = "img/background.jpg" style = "background-size: cover;">';
			} else {
				return '<body background = "img/background_light.jpg" style = "background-size: cover;">';
			}
		}

		public function setNavi(){
			$page = $this->page;

			if($page == "login") {
				include APP_ROOT . "/inc/sites/navi_login.php";
			} else {
				include APP_ROOT . "/inc/sites/navi_normal.php";
			}
		}

		public function loadContent(){
			$page = $this->page;

			$template = APP_ROOT . "/inc/sites/" . $page . ".php";

			if(file_exists($template)) {
				require $template;
			} else {
					echo "<h1>Seite nicht gefunden!</h1>";
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
	<link href="css/navi.css" rel="stylesheet">
	<link href="css/mobile.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon">
	<script src="/js/jquery.js" type="text/javascript"></script>	

	<!--Navigation laden-->
	<?php 
	echo $template->setNavi(); ?>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

	<!--BodyElement auswaehlen und laden-->
	<?php echo $template->setBody(); ?>

	<!--Richtige Navigation auswaehlen und laden-->
	<?php $template->setNavi(); ?>

<div id="content">
<?php $template->loadContent(); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
