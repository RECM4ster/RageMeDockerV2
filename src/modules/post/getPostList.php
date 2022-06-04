<?php

class getPostList
{
    public function getAllPost()
    {
        $querry = "Select pos_id, pos_topic, pos_body, us_name, us_picture, us_email from post p left join users on pos_user_id  = us_id where pos_is_deleted is null or pos_is_deleted = 0";
        $getPost = new querry($querry);
        $data = $getPost->executeQuerry();
        return $data;
    }
}

