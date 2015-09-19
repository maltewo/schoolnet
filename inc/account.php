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
    return isValid($_SESSION["username"], $_SESSION["passwordHash"]);
}
function isValid($username, $passwordhash) {
    if (isset($username) && isset($passwordhash)) {
        $res = dbQuery("select * from USERS where USERNAME = '%s' and PASSWORD = '%s' limit 1", $username, $passwordhash);
        return $res->num_rows == 1;
    } else {
        return false;
    }
}
function login($username, $passwordHash) {
    if (isValid($username, $passwordHash)) {
        session_reset();
        session_regenerate_id(true);
        $userData = dbQuery("SELECT * FROM USERS WHERE USERNAME = '%s'", $_SESSION["username"])->fetch_assoc();

        var_dump($userData);
        
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
