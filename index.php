<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 22:23
 */

session_start();
define('APP_ROOT', dirname(__FILE__));

require_once 'inc/account.php';

if(!isset($_GET['page']) || (!isLoggedIn() && $_GET['page'] != "login")) {
    header("Location: index.php?page=login");
    exit();
} else if (isLoggedIn() && $_GET["page"] == "login") {
	header("Location: index.php?page=overview");
    exit();
}

require_once 'inc/template.php';