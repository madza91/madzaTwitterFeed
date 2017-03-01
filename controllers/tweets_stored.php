<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 1.3.2017
 * Time: 13:19
 */

/*
 * Instances
 */
$template = new Template('tweets');
$tweets = new Tweets();
$users  = new Users();

/*
 * Config
 */
$defaultTotalResults = 10;
$defaultScreenName  = 'b92vesti';


$content = $tweets->getAll();

//$content = [];




/*
 * Send variables
 */
$template->title        = 'Database Tweets';
$template->total        = $defaultTotalResults;
$template->content      = $content;
$template->active       = 'stored';