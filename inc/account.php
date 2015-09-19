<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 11:00
 */

include_once 'db.php';

//region Functions
function isLoggedIn() {
    return isValid($_SESSION["username"], $_SESSION["passwordhash"]);
}
function isValid($username, $passwordhash) {
    if (isset($username) && isset($passwordhash)) {
        $res = dbQuery("select * from SCHOOLNET_USERS where USERNAME = '%s' and PASSWORD = '%s' limit 1", $username, $passwordhash);
        return $res->num_rows == 1;
    } else {
        return false;
    }
}
function login($pUsername, $pPasswordhash) {
    if (isValid($pUsername, $pPasswordhash)) {
        session_reset();
        session_regenerate_id(true);
        $_SESSION["username"] = $pUsername;
        $_SESSION["passwordhash"] = $pPasswordhash;
        $_SESSION["accountType"] = $lAccountType;

        
        $lResponse = dbQuery("SELECT GROUP FROM SCHOOLNET_USERS WHERE USERNAME = '%s'", $_SESSION["username"]);

        $lFetch = $lResponse->fetch_assoc();
        $lClass = $lFetch[0];
        		
        $_SESSION["class"] = $lClass;

        return true;
    } else {
        return false;
    }
}
function logout() {
    session_destroy();
}
//endregion
