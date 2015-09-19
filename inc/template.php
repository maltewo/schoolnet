<?php
//include "force-ssl.php";
include "inc/session.php";

// class Template {
// 	public $page;

// 	public function test() {
// 		return $this->page;
// 	}
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SchoolNet</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
		<?php if($_GET['page'] != "login") {
			echo '<link href="css/navi.css" rel="stylesheet">';
		} ?>

	<link href="css/style.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
	<?php
		if($_GET['page'] == "login") {
			echo '<body background = "img/background.jpg" style = "background-size: cover">';
		} else {
			echo '<body>';
		}
	?>
	<body>

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
	?> <nav id="header">
		<div id="logo">
			<a href="#"><img style="padding: 10px; vertical-align: middle;" src="img/logo.png" alt="" /></a>
		</div>
		<!--<a href="logout">logout</a>-->
		<div id="username">
			<p style="display: inline"><?php echo $_SESSION["username"]; ?></p>
			<input id="logout" type="submit" value="Logout"/>
		</div>
	</nav>
	<?php
	}
	?>

<div id="content">
<?php include 'inc/sites/' . $_GET['page'] . '.php'; ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
