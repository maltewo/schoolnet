<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 11:58
 */

include "inc/session.php";

if(!isset($_GET['page'])){
    header("Location: index.php?page=login");
    exit();
}

include 'inc/template.php';

// $template = new Template();
// $Template->page = "login";
// Echo $Template->test;

?>