<?php

/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 1.3.2017
 * Time: 13:19
 */
class Tweets
{

    /**
     * Tweets constructor.
     */
    public function __construct()
    {
        $this->db = new Database;
    }


    /**
     * Send Twitter Api Response, and store all tweets and users in DB
     *
     * @param $response
     * @return bool|int
     */
    public function storeTweets($response)
    {

        $stored = 0;

        foreach ($response as $tweet) {
            $stored += $this->insert($tweet);
        }

        return $stored;
    }


    /**
     * Store tweet in DB, and create User (if needed)
     *
     * @param $data
     * @return bool
     */
    public function insert($data)
    {

        /*
         * If tweet is already existing, stop operation and return false
         */
        if($this->isExisting($data->id)){
            return false;
        }

        $createdAt = date('Y-m-d H:i:s', strtotime($data->created_at));


        /*
         * Insertion in DB
         */
        $this->db->query('INSERT INTO tweets (tweet_id, text, retweet_count, favorite_count, user_id, created_at)
                                        VALUES (:tweet_id, :text, :retweet_count, :favorite_count, :user_id, :created_at)');
        $this->db->bind(':tweet_id', $data->id);
        $this->db->bind(':text', $data->text);
        $this->db->bind(':retweet_count', $data->retweet_count);
        $this->db->bind(':favorite_count', $data->favorite_count);
        $this->db->bind(':user_id', $data->user->id);
        $this->db->bind(':created_at', $createdAt);

        if($this->db->execute()){

            (new Users)->insert($data->user);

            return true;
        } else {
            return false;
        }

    }


    /**
     * Check for tweet by Twitter's Tweet ID
     *
     * @param $tweet_id
     * @return mixed
     */
    public function isExisting($tweet_id)
    {

        /*
         * Check it in DB
         */
        $this->db->query('SELECT COUNT(*) AS total FROM tweets WHERE tweet_id = :tweet_id');
        $this->db->bind(':tweet_id', $tweet_id);

        $result = $this->db->single();

        return $result->total;
    }




    /**
     * Get all tweets from DB
     *
     * @param int $limit
     * @return mixed
     */
    public function getAll($limit = 25)
    {

        $this->db->query('SELECT t.id, t.tweet_id, t.text, t.retweet_count, t.favorite_count, t.user_id, t.created_at, stored_at, u.user_id, u.name, u.screen_name, u.url, u.profile_image_url FROM tweets t
                            LEFT JOIN users u ON u.user_id = t.user_id
                            LIMIT :limit');
        $this->db->bind(':limit', $limit);
        $results = $this->db->resultset();



        /*
         * Assign user's info / The same data structure as Twitter response
         * Note: This is because we want use the same view file for both modes (DB tweets and Online tweets)
         */
        if($results){

            foreach ($results as $result) {

                $tmpUser = new stdClass();
                $tmpUser->name = $result->name;
                $tmpUser->screen_name = $result->screen_name;
                $tmpUser->url = $result->url;
                $tmpUser->profile_image_url = $result->profile_image_url;

                unset($result->name);
                unset($result->screen_name);
                unset($result->url);
                unset($result->profile_image_url);

                // Set new obj
                $result->user = $tmpUser;
            }

        }

        return $results;
    }


    public function getLastTweetId()
    {

        $this->db->query('SELECT tweet_id FROM tweets ORDER BY tweet_id DESC');

        $result = $this->db->single();

        if ($result) {
            return $result->tweet_id;
        }

        return false;
    }

}