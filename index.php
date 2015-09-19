<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 11:58
 */

include 'inc/template.php';
if(!isset($_GET['page'])){
	header("Location: index.php?page=login");
    exit();
}
?>