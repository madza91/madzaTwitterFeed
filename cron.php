<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 27.2.2017
 * Time: 20:21
 */


/*
 * Require initialization file
 */
require "config/init.php";

global $config;
use Abraham\TwitterOAuth\TwitterOAuth;


/*
 * Instances
 */
$tweets = new Tweets();


/*
 * Config
 */
$confTwitter = $config['twitter'];
$lastStoredTweetId = $tweets->getLastTweetId();


/*
 * Twitter Api Options
 */
if ( $lastStoredTweetId ) {
    $options = [
        'since_id' => $lastStoredTweetId,
        'screen_name' => $confTwitter['screen_name']
    ];
} else {
    $options = [
        'count' => 100,
        'screen_name' => $confTwitter['screen_name']
    ];
}




$connection = new TwitterOAuth($confTwitter['consumer_key'], $confTwitter['consumer_secret'], $confTwitter['access_token'], $confTwitter['access_secret']);

$content = $connection->get("statuses/user_timeline", $options);


/*
 * Store whole response
 */
$totalStored = $tweets->storeTweets($content);

if ($totalStored > 0) {
    echo "Stored {$totalStored} new tweets in DB!";
} else {
    echo "It's already updated!";
}