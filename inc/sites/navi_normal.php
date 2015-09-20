<nav id="header" style="z-index: 1000;">
		<div id="logo">
			<a href="index.php"><img style="padding: 10px; vertical-align: middle;" src="img/logo.png" alt="" /></a>
		</div>
		<!--<a href="logout">logout</a>-->
		<div id="username">
			<p style="display: inline"><?php echo $_SESSION["username"]; ?></p>
			<input id="logout" type="submit" value="Logout" onclick="<?php redirectToInline('index.php?page=login&logout=true'); ?>"/>
		</div>
	</nav>