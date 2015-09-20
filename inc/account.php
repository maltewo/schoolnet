<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 11:00
 */

require_once APP_ROOT . '/inc/db.php';

//region Functions
function isValid($username, $passwordhash) {
    if ((isset($username) && is_string($username)) && (isset($passwordhash) && is_string($passwordhash))) {
        $res = dbQuery("select * from USERS where USERNAME = '%s' and PASSWORD = '%s' limit 1", $username, $passwordhash);
        return $res->num_rows == 1;
    } else {
        return false;
    }
}
function isLoggedIn() {
	$username = isset($_SESSION["username"]) ? $_SESSION['username'] : false;
	$password = isset($_SESSION["passwordHash"]) ? $_SESSION['passwordHash'] : false;
    return isValid($username, $password);
}
function login($username, $passwordHash) {
    if (isValid($username, $passwordHash)) {
        $userData = dbQuery("SELECT * FROM USERS WHERE USERNAME = '%s'", $username)->fetch_assoc();

       
        $_SESSION["username"] = $username;
        $_SESSION["passwordHash"] = $passwordHash;
        $_SESSION["group"] = $userData["GROUP"];
        $_SESSION["role"] = $userData["ROLE"];
        
        return true;
    } else {
        return false;
    }
}
function logout() {
    session_destroy();
}
//endregion
