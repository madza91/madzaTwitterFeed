<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 27.2.2017
 * Time: 18:32
 */

require "config/init.php";


use Abraham\TwitterOAuth\TwitterOAuth;


$options = [
    'count' => 1,
    'screen_name' => 'b92vesti'
];



$connection = new TwitterOAuth($config['twitter']['consumer_key'], $config['twitter']['consumer_secret'], $config['twitter']['access_token'], $config['twitter']['access_secret']);


$content = $connection->get("statuses/user_timeline", $options);


//print_r($content); die;

foreach ($content as $tweet) {

    $json = json_encode($tweet);

    echo $json;

    echo $tweet->text . '<br>';

}
