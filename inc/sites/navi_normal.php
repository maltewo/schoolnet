<nav id="header" style="z-index: 1000;">
		<div id="logo">
			<a href="index.php"><img style="padding: 10px; vertical-align: middle;" src="img/logo.png" alt="" /></a>
		</div>
		<!--<a href="logout">logout</a>-->

		<div id="username">
			<p style="display: inline"><?php echo $_SESSION["username"]; ?></p>
			<a href="index.php?page=stundenplan" class="btn btn-primary">Vertretungsplan</a>
			<a href="index.php?page=login&logout=true" class="btn btn-primary">Abmelden</a>
		</div>
	</nav>
