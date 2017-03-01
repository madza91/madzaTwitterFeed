<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 27.2.2017
 * Time: 19:32
 */


$config = [
    /*
     * Project title
     */
    'title' => 'Madza Twitter Feed',

    /*
     * Debugging page, and showing errors
     */
    'debugging' => true,

    /*
     * Maintenance
     */
    'maintenance' => false,

    /*
     * View templates
     */
    'templates' => 'default',

    /*
     * Base DIR
     */
    'base_dir' => 'E:/www/madzaTwitterFeed/',

    /*
     * Base URL
     */
    'base_url' => 'http://localhost/madzaTwitterFeed/',

    /*
     * Database connection info
     */
    'db' => [
        'type' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'madza_twitter_feed'
    ],

    /*
     * Twitter App Tokens
     */
    'twitter' => [
        'screen_name' => 'b92vesti',
        'consumer_key' => '411TIzlXbKenxMgq0mZWvL0Fk',
        'consumer_secret' => 'K7MVq4cplmEeprSQZGdMdbPoN17jXlqHe0aIG3WuYYGY6gquF4',
        'access_token' => '3035723662-geXoDlWZTeprexMNYHsWY4N3W2OsGvXWpVUNsZ4',
        'access_secret' => '09mfCBef9BwrlCHvEj5topw8FHagyoSsy5JHhoBmGzPYw'
    ]
];