<?php

/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 1.3.2017
 * Time: 14:21
 */
class Users
{

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->db = new Database;
    }


    /**
     * Store Twitter's user
     * Note: This function needs security update and validations
     *
     * @param $data
     * @return bool
     */
    public function insert($data)
    {

        /*
         * If user is already existing, stop operation and return false
         */
        if($this->isExisting($data->id)){
            return false;
        }

        /*
         * Insertion in DB
         */
        $this->db->query('INSERT INTO users (user_id, name, screen_name, url, profile_image_url)
                                        VALUES (:user_id, :name, :screen_name, :url, :profile_image_url)');
        $this->db->bind(':user_id', $data->id);
        $this->db->bind(':name', $data->name);
        $this->db->bind(':screen_name', $data->screen_name);
        $this->db->bind(':url', $data->url);
        $this->db->bind(':profile_image_url', $data->profile_image_url);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }


    /**
     * Check for user by Twitter's User ID
     *
     * @param $user_id
     * @return mixed
     */
    public function isExisting($user_id)
    {

        /*
         * Check it in DB
         */
        $this->db->query('SELECT COUNT(*) AS total FROM users WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        $result = $this->db->single();

        return $result->total;
    }

}