<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Description: This controller gets data from Twitter Api
 *
 * Date: 1.3.2017
 * Time: 12:25
 */


global $config;
use Abraham\TwitterOAuth\TwitterOAuth;

/*
 * Config
 */
$defaultTotalResults = 10;
$defaultScreenName  = 'b92vesti';


/*
 * Instances
 */
$tweets = new Tweets();
$users  = new Users();


/*
 * Create view from `templates/default`
 */
$template = new Template('tweets');



/*
 * Twitter Api Options
 */
$options = [
    'count' => $defaultTotalResults,
    'screen_name' => $defaultScreenName
];

$connection = new TwitterOAuth($config['twitter']['consumer_key'], $config['twitter']['consumer_secret'], $config['twitter']['access_token'], $config['twitter']['access_secret']);

$content = $connection->get("statuses/user_timeline", $options);





/*
 * Send variables
 */
$template->title        = $defaultScreenName . ' - Twitter feed';
$template->total        = $defaultTotalResults;
$template->content      = $content;
$template->count        = count($content);
$template->active       = 'online';