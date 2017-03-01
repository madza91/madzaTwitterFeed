<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 27.2.2017
 * Time: 18:32
 */


/*
 * Require initialization file
 */
require "config/init.php";


/*
 * Include Controller from `controllers` folder
 */
$getPage = getGetValue('page', 'tweets');


if ($getPage === 'online') {
    includeController('tweets');
} else {
    includeController('tweets_stored');
}