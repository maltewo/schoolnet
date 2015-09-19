<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 11:58
 */

if(!isset($_GET['page'])){
    header("Location: index.php?page=login");
    exit();
}

include 'inc/template.php';

?>