<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.09.2015
 * Time: 17:48
 */

function notNull($v) {
    return isset($v) && $v != "";
}