<?
	if ($_SERVER["HTTP_X_FORWARDED_PROTO"] != "https") {
		//header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit;
	}
?>
