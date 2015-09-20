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
    if (isset($username) && isset($passwordhash)) {
        $res = dbQuery("select * from USERS where USERNAME = '%s' and PASSWORD = '%s' limit 1", $username, $passwordhash);
        return $res->num_rows == 1;
    } else {
        return false;
    }
}
function isLoggedIn() {
    return isValid($_SESSION["username"], $_SESSION["passwordHash"]);
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
