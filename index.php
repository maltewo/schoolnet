<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 22:23
 */

session_start();
define('APP_ROOT', dirname(__FILE__));

if(!isset($_GET['page']) || (!isset($_SESSION['username']) && $_GET['page'] != "login")) {
    header("Location: index.php?page=login");
    exit();
} else if (isset($_SESSION["username"]) && $_GET["page"] == "login") {
	header("Location: index.php?page=overview");
}

require_once 'inc/template.php';