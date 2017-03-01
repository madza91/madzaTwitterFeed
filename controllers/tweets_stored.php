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

/*
 * Config
 */
$defaultTotalResults = 10;
$defaultScreenName  = 'b92vesti';


$content = $tweets->getAll();





/*
 * Send variables
 */
$template->title        = 'Database Tweets';
$template->total        = $defaultTotalResults;
$template->content      = $content;
$template->count        = count($content);
$template->active       = 'stored';